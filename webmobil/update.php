<?php
include 'conn.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$jenis_mobil = $_POST['jenis_mobil'];
$tanggal_sewa = $_POST['tanggal_sewa'];
$lama_sewa = $_POST['lama_sewa'];
$nomor_telepon = $_POST['nomor_telepon'];

$query = "UPDATE datasewamobil SET 
    nama='$nama', 
    jenis_mobil='$jenis_mobil', 
    tanggal_sewa='$tanggal_sewa', 
    lama_sewa='$lama_sewa', 
    nomor_telepon='$nomor_telepon' 
    WHERE id=$id";

if ($conn->query($query) === TRUE) {
    header("Location: index.php?status=success");
} else {
    header("Location: index.php?status=error");
}

header("Location: index.php?status=update_success");
exit();

?>
