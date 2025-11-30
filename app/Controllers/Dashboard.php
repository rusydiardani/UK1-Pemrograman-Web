<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $role = session()->get('role');
        
        if ($role == 'admin') {
            return view('admin/dashboard');
        } elseif ($role == 'mahasiswa') {
            return view('mahasiswa/dashboard');
        } elseif ($role == 'dosen') {
            return view('dosen/dashboard');
        }
        
        return redirect()->to('/login');
    }
}
