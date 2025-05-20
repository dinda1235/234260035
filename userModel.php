<?php
// app/Models/UserModel.php
namespace App\Models; // Mendefinisikan namespace untuk model ini
use CodeIgniter\Model; // Mengimpor class Model dari framework CodeIgniter

class UserModel extends Model { // Mendefinisikan class UserModel yang merupakan turunan dari Model
    protected $table = 'users'; // Menentukan nama tabel yang digunakan untuk menyimpan data user
    protected $allowedFields = ['username', 'password']; // Menentukan field yang diizinkan untuk diisi dalam tabel
    protected $useTimestamps = false; // Menentukan apakah menggunakan timestamp untuk mencatat waktu pembuatan atau pembaruan
}


?>
