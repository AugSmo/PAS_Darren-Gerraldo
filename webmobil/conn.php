<?php
$host = "localhost"; // Host database
$user = "root"; // User database
$pass = ""; // Password database
$dbname = "mobil"; // Nama database

// Membuat koneksi
$conn = new mysqli($host, $user, $pass, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>