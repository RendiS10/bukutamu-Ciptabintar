<?php
$host = "localhost";
$user = "root"; // Ganti sesuai user database Anda
$pass = ""; // Ganti sesuai password database Anda
$db   = "bukutamu";

$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
