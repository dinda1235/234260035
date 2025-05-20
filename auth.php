<?php

// app/Controllers/Auth.php
namespace App\Controllers; // Mendefinisikan namespace untuk controller ini, agar tidak terjadi konflik dengan class lain
use App\Models\UserModel; // Mengimpor UserModel untuk digunakan dalam controller ini
use CodeIgniter\Controller; // Mengimpor class Controller dari framework CodeIgniter

class Auth extends Controller { // Mendefinisikan class Auth yang merupakan turunan dari Controller
    public function login() { // Mendefinisikan method login untuk menangani proses login
        helper(['form']); // Memanggil helper form untuk memudahkan pengolahan data dari form

        // Memeriksa apakah request yang diterima adalah metode POST
        if ($this->request->getMethod() === 'post') { 
            $model = new UserModel(); // Membuat instance dari UserModel untuk berinteraksi dengan tabel users
            // Mencari user berdasarkan username yang diinputkan
            $user = $model->where('username', $this->request->getPost('username'))->first(); 

            // Memeriksa apakah user ditemukan dan password yang diinputkan cocok dengan yang ada di database
            if ($user && password_verify($this->request->getPost('password'), $user['password'])) { 
                // Menyimpan user_id dan username ke dalam session untuk digunakan di halaman lain
                session()->set(['user_id' => $user['id'], 'username' => $user['username']]); 
                return redirect()->to('/tugas'); // Mengarahkan pengguna ke halaman tugas setelah login berhasil
            }
            // Jika login gagal, mengarahkan kembali ke halaman login dengan pesan error
            return redirect()->back()->with('error', 'Login gagal'); 
        }
        // Jika request bukan POST, menampilkan view login
        return view('auth/login'); 
    }

    public function register() { // Mendefinisikan method register untuk menangani proses registrasi
        helper(['form']); // Memanggil helper form untuk memudahkan pengolahan data dari form

        // Memeriksa apakah request yang diterima adalah metode POST
        if ($this->request->getMethod() === 'post') { 
            $model = new UserModel(); // Membuat instance dari UserModel untuk menyimpan data user baru
            // Menyiapkan data untuk disimpan ke dalam database
            $data = [ 
                'username' => $this->request->getPost('username'), // Mengambil username dari input
                // Menghash password sebelum disimpan untuk keamanan
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT), 
            ];
            $model->insert($data); // Menyimpan data user baru ke dalam tabel users
            return redirect()->to('/login'); // Mengarahkan pengguna ke halaman login setelah registrasi berhasil
        }
        // Jika request bukan POST, menampilkan view registrasi
        return view('auth/register'); 
    }

    public function logout() { // Mendefinisikan method logout untuk menangani proses logout
        session()->destroy(); // Menghancurkan session untuk mengeluarkan pengguna dari aplikasi
        return redirect()->to('/login'); // Mengarahkan pengguna ke halaman login setelah logout
    }
}

?>
