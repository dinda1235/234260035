<?php
// app/Controllers/Tugas.php
namespace App\Controllers; // Mendefinisikan namespace untuk controller ini
use App\Models\TugasModel; // Mengimpor TugasModel untuk digunakan dalam controller ini
use CodeIgniter\Controller; // Mengimpor class Controller dari framework CodeIgniter

class Tugas extends Controller { // Mendefinisikan class Tugas yang merupakan turunan dari Controller
    public function index() { // Mendefinisikan method index untuk menampilkan daftar tugas
        $model = new TugasModel(); // Membuat instance dari TugasModel untuk berinteraksi dengan tabel tugas
        // Mengambil semua tugas yang terkait dengan user_id dari session
        $data['tugas'] = $model->where('user_id', session()->get('user_id'))->findAll(); 
        // Menampilkan view index tugas dengan data tugas yang diambil
        return view('tugas/index', $data); 
    }

    public function tambah() { // Mendefinisikan method tambah untuk menambah tugas baru
        // Memeriksa apakah request yang diterima adalah metode POST
        if ($this->request->getMethod() === 'post') { 
            $model = new TugasModel(); // Membuat instance dari TugasModel untuk menyimpan data tugas baru
            // Menyimpan data tugas baru ke dalam tabel tugas
            $model->save([ 
                'judul' => $this->request->getPost('judul'), // Mengambil judul dari input
                'deskripsi' => $this->request->getPost('deskripsi'), // Mengambil deskripsi dari input
                'deadline' => $this->request->getPost('deadline'), // Mengambil deadline dari input
                'status' => $this->request->getPost('status'), // Mengambil status dari input
                'user_id' => session()->get('user_id'), // Mengambil user_id dari session untuk mengaitkan tugas dengan pengguna
            ]);
            return redirect()->to('/tugas'); // Mengarahkan pengguna ke halaman tugas setelah berhasil menambah tugas
        }
        // Jika request bukan POST, menampilkan view tambah tugas
        return view('tugas/tambah'); 
    }

    public function edit($id) { // Mendefinisikan method edit untuk mengedit tugas berdasarkan id
        $model = new TugasModel(); // Membuat instance dari TugasModel untuk memperbarui data tugas
        // Memeriksa apakah request yang diterima adalah metode POST
        if ($this->request->getMethod() === 'post') { 
            // Memperbarui data tugas berdasarkan id yang diberikan
            $model->update($id, [ 
                'judul' => $this->request->getPost('judul'), // Mengambil judul dari input
                'deskripsi' => $this->request->getPost('deskripsi'), // Mengambil deskripsi dari input
                'deadline' => $this->request->getPost('deadline'), // Mengambil deadline dari input
                'status' => $this->request->getPost('status'), // Mengambil status dari input
            ]);
            return redirect()->to('/tugas'); // Mengarahkan pengguna ke halaman tugas setelah berhasil mengedit tugas
        }
        // Mengambil data tugas berdasarkan id untuk ditampilkan di form edit
        $data['tugas'] = $model->find($id); 
        // Menampilkan view edit tugas dengan data tugas yang diambil
        return view('tugas/edit', $data); 
    }

    public function hapus($id) { // Mendefinisikan method hapus untuk menghapus tugas berdasarkan id
        $model = new TugasModel(); // Membuat instance dari TugasModel untuk menghapus data tugas
        $model->delete($id); // Menghapus tugas berdasarkan id yang diberikan
        return redirect()->to('/tugas'); // Mengarahkan pengguna ke halaman tugas setelah berhasil menghapus tugas
    }
}

?>
