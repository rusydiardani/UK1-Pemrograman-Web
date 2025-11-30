<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\MahasiswaModel;
use App\Models\DosenModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('logged_in')) {
            return redirect()->to('/dashboard');
        }
        return view('auth/login');
    }
    
    public function authenticate()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        
        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->first();
        
        if ($user && password_verify($password, $user['password'])) {
            $sessionData = [
                'id_user' => $user['id_user'],
                'username' => $user['username'],
                'nama_user' => $user['nama_user'],
                'role' => $user['role'],
                'logged_in' => true
            ];
            
            // Get additional info based on role
            if ($user['role'] == 'mahasiswa') {
                $mahasiswaModel = new MahasiswaModel();
                $mahasiswa = $mahasiswaModel->where('nim', $username)->first();
                if ($mahasiswa) {
                    $sessionData['nim'] = $mahasiswa['nim'];
                }
            } elseif ($user['role'] == 'dosen') {
                $dosenModel = new DosenModel();
                $dosen = $dosenModel->where('nidn', $username)->first();
                if ($dosen) {
                    $sessionData['nidn'] = $dosen['nidn'];
                }
            }
            
            session()->set($sessionData);
            return redirect()->to('/dashboard');
        }
        
        return redirect()->back()->with('error', 'Username atau password salah');
    }
    
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
