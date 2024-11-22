<?php
include 'conn.php';
header("Location: index.php?status=add_success");

// Ambil data dari form
$nama = $_POST['nama'];
$jenis_mobil = $_POST['jenis_mobil'];
$tanggal_sewa = $_POST['tanggal_sewa'];
$lama_sewa = $_POST['lama_sewa'];
$nomor_telepon = $_POST['nomor_telepon'];

// Query untuk menambahkan data
$query = "INSERT INTO datasewamobil (nama, jenis_mobil, tanggal_sewa, lama_sewa, nomor_telepon) 
          VALUES ('$nama', '$jenis_mobil', '$tanggal_sewa', '$lama_sewa', '$nomor_telepon')";

if ($conn->query($query) === TRUE) {
    // Redirect dengan parameter sukses
    header("Location: index.php?success=true");
    exit();
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}


$conn->close();
?>
