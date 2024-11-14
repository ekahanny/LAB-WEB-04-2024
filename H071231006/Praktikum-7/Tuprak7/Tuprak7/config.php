<?php
$servername = "localhost";
$username = "root";
$password = ""; // yg blm mengatur password
$dbname = "mahasiswa_db";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname, 3306);

// cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
