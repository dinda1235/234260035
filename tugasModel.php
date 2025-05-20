<?php

// app/Models/TugasModel.php
namespace App\Models; // Mendefinisikan namespace untuk model ini
use CodeIgniter\Model; // Menggunakan class Model dari CodeIgniter

class TugasModel extends Model { // Mendefinisikan class TugasModel yang merupakan turunan dari Model
    protected $table = 'tugas'; // Menentukan nama tabel yang digunakan
    protected $allowedFields = ['judul', 'deskripsi', 'deadline', 'status', 'user_id']; // Menentukan field yang diizinkan untuk diisi
    protected $useTimestamps = false; // Menentukan apakah menggunakan timestamp atau tidak
}

?>