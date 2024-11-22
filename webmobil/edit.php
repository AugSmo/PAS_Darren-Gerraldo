<?php
include 'conn.php';

$id = $_GET['id'];
$query = "SELECT * FROM datasewamobil WHERE id = $id";
$result = $conn->query($query);
$data = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="style2.css">
    <style>
        body{
            background-color: #white;
        }

        h1{
            font-family: 'optima', sans-serif;
            color: #3cba71;
        }
    </style>


</head>
<body>
    <center><h1>Pastikan data Anda dengan benar!</h1></center>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?= $data['id']; ?>">
        <label>Nama:</label><br>
        <input type="text" name="nama" value="<?= $data['nama']; ?>" required><br>
        <label>Jenis Mobil:</label><br>
        <select name="jenis_mobil" required><br>
          <option value="Toyota Sedan 2015">Toyota Sedan 2015</option>
          <option value="Toyota Camry 2024">Toyota Camry 2024</option>
          <option value="Toyota SUV 2019">Toyota SUV 2019</option>
          <option value="Toyota Calya 2018">Toyota Calya 2018</option>
          <option value="Toyota Alphard 2020">Toyota Alphard 2020</option>
          <option value="Honda Civic 2016">Honda Civic 2016</option>
        </select><br><br>
        <label>Tanggal Sewa:</label><br>
        <input type="date" name="tanggal_sewa" value="<?= $data['tanggal_sewa']; ?>" required><br>
        <label>Lama Sewa:</label><br>
        <input type="date" name="lama_sewa" value="<?= $data['lama_sewa']; ?>" required><br>
        <label>Nomor Telepon:</label><br>
        <input type="text" name="nomor_telepon" value="<?= $data['nomor_telepon']; ?>" required><br><br>
        <button type="submit">Update Data</button>
    </form>
</body>
</html>