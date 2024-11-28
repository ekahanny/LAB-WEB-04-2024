<?php
session_start();
include 'config.php';

if ($_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit;
}

$error = ""; // Variabel untuk menyimpan pesan error

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];

    // Cek apakah NIM sudah ada
    $checkQuery = $conn->prepare("SELECT * FROM mahasiswa WHERE nim = ?");
    $checkQuery->bind_param("s", $nim);
    $checkQuery->execute();
    $result = $checkQuery->get_result();

    if ($result->num_rows > 0) {
        // Jika NIM sudah ada, set pesan error
        $error = "NIM sudah terdaftar. Silakan gunakan NIM lain.";
    } else {
        // Jika tidak ada duplikat, lanjutkan proses tambah data
        $query = $conn->prepare("INSERT INTO mahasiswa (nama, nim, prodi) VALUES (?, ?, ?)");
        $query->bind_param("sss", $nama, $nim, $prodi);
        $query->execute();

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
    <title>Tambah Data Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #e0f7fa, #80deea);
            font-family: Arial, sans-serif;
        }
        .form-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 10px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        .form-container h2 {
            font-size: 1.8em;
            margin-bottom: 1em;
            color: #333;
        }
        .form-control {
            background-color: #f3f3f3;
            border: none;
            border-radius: 5px;
        }
        .btn-primary {
            background-color: #00acc1;
            border: none;
            width: 100%;
            font-size: 1.2em;
            margin-top: 1em;
        }
        .btn-primary:hover {
            background-color: #00838f;
        }
        .btn-secondary {
            width: 100%;
            margin-top: 0.5em;
        }
        .alert {
            color: #f44336;
            font-size: 0.9em;
            margin-top: 1em;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <img src="https://img.icons8.com/ios-filled/100/00acc1/student-male.png" alt="Student Icon" />
        <h2>Tambah Data Mahasiswa</h2>
        
        <!-- Tampilkan pesan error jika NIM sudah ada -->
        <?php if (!empty($error)) : ?>
            <div class="alert"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="mb-3">
                <input type="text" name="nama" placeholder="Nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <input type="text" name="nim" placeholder="NIM" class="form-control" required>
            </div>
            <div class="mb-3">
                <input type="text" name="prodi" placeholder="Program Studi" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>
