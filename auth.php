<?php

// app/Controllers/Auth.php
namespace App\Controllers; // Mendefinisikan namespace untuk controller ini
use App\Models\UserModel; // Menggunakan model UserModel
use CodeIgniter\Controller; // Menggunakan class Controller dari CodeIgniter

class Auth extends Controller { // Mendefinisikan class Auth yang merupakan turunan dari Controller
    public function login() { // Mendefinisikan method login
        helper(['form']); // Memanggil helper form untuk memudahkan pengolahan form
        if ($this->request->getMethod() === 'post') { // Memeriksa apakah request adalah POST
            $model = new UserModel(); // Membuat instance dari UserModel
            $user = $model->where('username', $this->request->getPost('username'))->first(); // Mencari user berdasarkan username
            if ($user && password_verify($this->request->getPost('password'), $user['password'])) { // Memeriksa apakah user ditemukan dan password cocok
                session()->set(['user_id' => $user['id'], 'username' => $user['username']]); // Menyimpan user_id dan username ke dalam session
                return redirect()->to('/tugas'); // Mengarahkan ke halaman tugas setelah login berhasil
            }
            return redirect()->back()->with('error', 'Login gagal'); // Mengarahkan kembali dengan pesan error jika login gagal
        }
        return view('auth/login'); // Menampilkan view login jika request bukan POST
    }

    public function register() { // Mendefinisikan method register
        helper(['form']); // Memanggil helper form untuk memudahkan pengolahan form
        if ($this->request->getMethod() === 'post') { // Memeriksa apakah request adalah POST
            $model = new UserModel(); // Membuat instance dari UserModel
            $data = [ // Menyiapkan data untuk disimpan
                'username' => $this->request->getPost('username'), // Mengambil username dari input
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT), // Menghash password sebelum disimpan
            ];
            $model->insert($data); // Menyimpan data user baru ke dalam database
            return redirect()->to('/login'); // Mengarahkan ke halaman login setelah registrasi berhasil
        }
        return view('auth/register'); // Menampilkan view registrasi jika request bukan POST
    }

    public function logout() { // Mendefinisikan method logout
        session()->destroy(); // Menghancurkan session untuk logout
        return redirect()->to('/login'); // Mengarahkan ke halaman login setelah logout
    }
}

?>
