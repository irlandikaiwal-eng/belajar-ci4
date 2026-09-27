<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function proses()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->first();

        if (! $user || ! password_verify($password, $user['password'])) {
            return redirect()->to('login')->with('gagal', 'Username atau password salah');
        }

        session()->set([
            'isLogin'  => true,
            'username' => $user['username'],
        ]);

        return redirect()->to('mahasiswa')->with('pesan', 'Login berhasil, selamat datang ' . $user['username']);
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('login')->with('pesan', 'Anda sudah logout');
    }
}
