<?php

// app/Models/TugasModel.php
namespace App\Models; // Mendefinisikan namespace untuk model ini
use CodeIgniter\Model; // Mengimpor class Model dari framework CodeIgniter

class TugasModel extends Model { // Mendefinisikan class TugasModel yang merupakan turunan dari Model
    protected $table = 'tugas'; // Menentukan nama tabel yang digunakan untuk menyimpan data tugas
    protected $allowedFields = ['judul', 'deskripsi', 'deadline', 'status', 'user_id']; // Menentukan field yang diizinkan untuk diisi dalam tabel
    protected $useTimestamps = false; // Menentukan apakah menggunakan timestamp untuk mencatat waktu pembuatan atau pembaruan
}


?>
