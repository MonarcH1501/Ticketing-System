<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\TicketModel;

class TicketController extends BaseController
{      
    protected $ticketModel;

    public function __construct()
    {
        $this->ticketModel = new TicketModel();
    }

    // menampilkan form untuk pembuatan ticket
    public function createticket()
    {
        return view('createticket');
    }

    // Fungsi untuk mendapatkan nama departemen berdasarkan ID
    private function getDepartmentName($department_id)
    {
        $departments = [
            1 => 'SDM',
            2 => 'Akademik',
            3 => 'TI',
            4 => 'Sarpras',
            5 => 'Keuangan',
            6 => 'Penggembalaan'
        ];
        
        return $departments[$department_id] ?? 'Unknown';
    }

    // menyimpan data ticket yang dibuat
    public function saveticket()
    {
        $data_ticket = [
            'title' => $this->request->getVar('title'),
            'description' => $this->request->getVar('description'),
            'department_id' => $this->request->getVar('department_id'),
            'user_id' => session()->get('id'), 
            'status' => 'open',
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->ticketModel->save($data_ticket);
        return redirect()->to('/dashboard')->with('success', 'Ticket created successfully.');
    }

    // menampilkan data ticket yang sudah dibuat
    public function index()
    {
        $tickets = $this->ticketModel->findAll();

        // Tambahkan nama departemen ke setiap tiket
        foreach ($tickets as &$ticket) {
            $ticket['department_name'] = $this->getDepartmentName($ticket['department_id']);
        }

        return view('dashboard', ['tickets' => $tickets]);
    }

    public function search()
    {
        $query = $this->request->getVar('query');
        $ticketModel = new TicketModel();
    
        // Query pencarian dengan join tabel department
        $tickets = $ticketModel->select('tickets.*, departments.name AS department_name')
                               ->join('departments', 'departments.id = tickets.department_id', 'left')
                               ->groupStart()
                                   ->like('tickets.title', $query)
                                   ->orLike('tickets.description', $query)
                                   ->orLike('departments.name', $query)
                               ->groupEnd()
                               ->findAll();
    
        // Jika request adalah AJAX, kembalikan tampilan tabel partial
        if ($this->request->isAJAX()) {
            return view('tickets/partial_table', ['tickets' => $tickets]);
        }
    
        // Jika bukan AJAX, kembali ke halaman utama dengan seluruh data tiket
        return view('tickets/index', ['tickets' => $tickets]);
    }
    
    
    
    // hapus ticket
    public function delete($id)
    {
        $this->ticketModel->delete($id);
        return redirect()->to('/dashboard')->with('success', 'Ticket deleted successfully.');
    }

    public function edit($id)
    {
        $ticket->$this->ticketModel->find($id);

        if(!$ticket){
            return redirect()->to('/tickets')->with('error','tiket tidak ditemukan ');
        }

        if($this->request->getMethod()==='post'){
            $data=[
                'title'       => $this->request->getPost('title'),
                'description' => $this->request->getPost('description'),
                'status'      => $this->request->getPost('status'),
                'department_id' => $this->request->getPost('department_id')
            ];
        }
    }
}