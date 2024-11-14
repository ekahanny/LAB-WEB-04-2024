<?php
session_start();
include 'config.php';

// Cek apakah user adalah admin
if ($_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit;
}

// Validasi apakah ID ada pada URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];
$query = $conn->prepare("SELECT * FROM mahasiswa WHERE id = ?");
$query->bind_param("i", $id);
$query->execute();
$result = $query->get_result();
$mahasiswa = $result->fetch_assoc();

// Cek apakah data mahasiswa ditemukan
if (!$mahasiswa) {
    header("Location: index.php");
    exit;
}

$error = ""; // Variabel untuk menyimpan pesan error

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];

    // Cek apakah NIM sudah ada di database untuk mahasiswa lain
    $checkQuery = $conn->prepare("SELECT id FROM mahasiswa WHERE nim = ? AND id != ?");
    $checkQuery->bind_param("si", $nim, $id);
    $checkQuery->execute();
    $checkResult = $checkQuery->get_result();

    if ($checkResult->num_rows > 0) {
        // Jika ada data lain dengan NIM yang sama, set pesan error
        $error = "NIM sudah digunakan oleh mahasiswa lain. Gunakan NIM yang berbeda.";
    } else {
        // Jika NIM tidak duplikat, lanjutkan proses update
        $updateQuery = $conn->prepare("UPDATE mahasiswa SET nama = ?, nim = ?, prodi = ? WHERE id = ?");
        $updateQuery->bind_param("sssi", $nama, $nim, $prodi, $id);
        $updateQuery->execute();

        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f2c1bd;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2>Edit Data Mahasiswa</h2>
    
   <!-- Tampilkan error sebagai teks biasa -->
   <?php if (!empty($error)) : ?>
        <p class="text-danger"><?= htmlspecialchars($error); ?></p>
    <?php endif; ?>
    
    <form method="POST" action="">
        <!-- Hidden input untuk mengirim ID mahasiswa -->
        <input type="hidden" name="id" value="<?= htmlspecialchars($id); ?>">
        
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" id="nama" value="<?= htmlspecialchars($mahasiswa['nama']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" name="nim" class="form-control" id="nim" value="<?= htmlspecialchars($mahasiswa['nim']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="prodi" class="form-label">Program Studi</label>
            <input type="text" name="prodi" class="form-control" id="prodi" value="<?= htmlspecialchars($mahasiswa['prodi']); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Data</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>
