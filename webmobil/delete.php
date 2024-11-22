<?php
include 'conn.php';

$id = $_GET['id'];

$query = "DELETE FROM datasewamobil WHERE id = $id";

if ($conn->query($query) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
?>