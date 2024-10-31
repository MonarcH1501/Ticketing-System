<?php

namespace App\Controllers;
use App\Models\TicketModel;

class HomeController extends BaseController
{
    public function index(): string
    {
        $session = service('session');
        if (!$session->get('logged_in')) {
            return view('login');
        }

        // Ambil data tiket terbaru
        $ticketModel = new TicketModel();
        $recentTickets = $ticketModel->orderBy('created_at', 'DESC')->findAll(6); 

        // Kirim data tiket ke view
        return view('home', [
            'recentTickets' => $recentTickets,
            'userName' => $session->get('name'),
            'userRole' => $session->get('role')
        ]);
    }
}
