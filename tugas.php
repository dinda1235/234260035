<?php
// app/Controllers/Tugas.php
namespace App\Controllers; // Mendefinisikan namespace untuk controller ini
use App\Models\TugasModel; // Menggunakan model TugasModel
use CodeIgniter\Controller; // Menggunakan class Controller dari CodeIgniter

class Tugas extends Controller { // Mendefinisikan class Tugas yang merupakan turunan dari Controller
    public function index() { // Mendefinisikan method index
        $model = new TugasModel(); // Membuat instance dari TugasModel
        $data['tugas'] = $model->where('user_id', session()->get('user_id'))->findAll(); // Mengambil semua tugas yang terkait dengan user_id dari session
        return view('tugas/index', $data); // Menampilkan view index tugas dengan data tugas
    }

    public function tambah() { // Mendefinisikan method tambah
        if ($this->request->getMethod() === 'post') { // Memeriksa apakah request adalah POST
            $model = new TugasModel(); // Membuat instance dari TugasModel
            $model->save([ // Menyimpan data tugas baru
                'judul' => $this->request->getPost('judul'), // Mengambil judul dari input
                'deskripsi' => $this->request->getPost('deskripsi'), // Mengambil deskripsi dari input
                'deadline' => $this->request->getPost('deadline'), // Mengambil deadline dari input
                'status' => $this->request->getPost('status'), // Mengambil status dari input
                'user_id' => session()->get('user_id'), // Mengambil user_id dari session
            ]);
            return redirect()->to('/tugas'); // Mengarahkan ke halaman tugas setelah berhasil menambah tugas
        }
        return view('tugas/tambah'); // Menampilkan view tambah tugas jika request bukan POST
    }

    public function edit($id) { // Mendefinisikan method edit dengan parameter id
        $model = new TugasModel(); // Membuat instance dari TugasModel
        if ($this->request->getMethod() === 'post') { // Memeriksa apakah request adalah POST
            $model->update($id, [ // Memperbarui data tugas berdasarkan id
                'judul' => $this->request->getPost('judul'), // Mengambil judul dari input
                'deskripsi' => $this->request->getPost('deskripsi'), // Mengambil deskripsi dari input
                'deadline' => $this->request->getPost('deadline'), // Mengambil deadline dari input
                'status' => $this->request->getPost('status'), // Mengambil status dari input
            ]);
            return redirect()->to('/tugas'); // Mengarahkan ke halaman tugas setelah berhasil mengedit tugas
        }
        $data['tugas'] = $model->find($id); // Mengambil data tugas berdasarkan id
        return view('tugas/edit', $data); // Menampilkan view edit tugas dengan data tugas
    }

    public function hapus($id) { // Mendefinisikan method hapus dengan parameter id
        $model = new TugasModel(); // Membuat instance dari TugasModel
        $model->delete($id); // Menghapus tugas berdasarkan id
        return redirect()->to('/tugas'); // Mengarahkan ke halaman tugas setelah berhasil menghapus tugas
    }
}

?>
