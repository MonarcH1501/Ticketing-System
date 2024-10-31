<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class LoginController extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url']);
    }

    public function index()
    {
        return view('login');
    }

    public function authenticate()
    {   
        // error_reporting(E_ALL);
        // ini_set('display_errors', '1');

        //set session
        $session = service('session');
        $userModel = new UserModel();
    
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
    
        $user = $userModel->where('username', $username)->first();
    
        if ($user) {
            $isPasswordCorrect = $user['password'] == hash('sha256', $password);
            if ($isPasswordCorrect) {
                $sessionData = [
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'name'=>$user['name'],
                    'role' => $user['role'],
                    'logged_in' => true,
                ];
                $session->set($sessionData);
                return redirect()->to('/home');
            } else {
                $session->setFlashdata('error', 'Invalid password');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('error', 'Username not found');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        error_reporting(E_ALL);
        ini_set('display_errors', '1');
        $session = service('session');
        $session->destroy();
        return redirect()->to('/login');
    }

    // untuk create akun

    public function register()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'You do not have access to this page.');
        }
        
        return view('register');
    }
    
    public function storeUser()
    {
        // Pastikan hanya admin yang dapat menyimpan user baru
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'You do not have access to this action.');
        }
    
        $userModel = new \App\Models\UserModel();
        $data = [
            'username' => $this->request->getVar('username'),
            'password' => hash('sha256', $this->request->getVar('password')),
            'name' => $this->request->getVar('name'),
            'role' => $this->request->getVar('role'),
        ];
    
        $userModel->save($data);
        return redirect()->to('/dashboard')->with('success', 'User created successfully.');
    }
    
}


    



