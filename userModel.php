<?php
// app/Models/UserModel.php
namespace App\Models; // Mendefinisikan namespace untuk model ini
use CodeIgniter\Model; // Menggunakan class Model dari CodeIgniter

class UserModel extends Model { // Mendefinisikan class UserModel yang merupakan turunan dari Model
    protected $table = 'users'; // Menentukan nama tabel yang digunakan
    protected $allowedFields = ['username', 'password']; // Menentukan field yang diizinkan untuk diisi
    protected $useTimestamps = false; // Menentukan apakah menggunakan timestamp atau tidak
}

?>
