<?php
session_start();
include 'config.php';

// Cek apakah pengguna adalah admin
if ($_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit;
}

// Ambil data mahasiswa berdasarkan ID
$id = $_GET['id'];
$query = $conn->prepare("SELECT * FROM mahasiswa WHERE id = ?");
$query->bind_param("i", $id);
$query->execute();
$result = $query->get_result();
$mahasiswa = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];

    // Cek apakah NIM sudah ada di mahasiswa lain
    $checkQuery = $conn->prepare("SELECT * FROM mahasiswa WHERE nim = ? AND id != ?");
    $checkQuery->bind_param("si", $nim, $id);
    $checkQuery->execute();
    $checkResult = $checkQuery->get_result();

    if ($checkResult->num_rows > 0) {
        $error = "NIM sudah digunakan oleh mahasiswa lain.";
    } else {
        // Update data mahasiswa jika NIM tidak duplikat
        $query = $conn->prepare("UPDATE mahasiswa SET nama = ?, nim = ?, prodi = ? WHERE id = ?");
        $query->bind_param("sssi", $nama, $nim, $prodi, $id);
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
    <title>Edit Data Mahasiswa</title>
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
    </style>
</head>
<body>
    <div class="form-container">
        <img src="https://img.icons8.com/ios-filled/100/00acc1/edit.png" alt="Edit Icon" />
        <h2>Edit Data Mahasiswa</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?= htmlspecialchars($mahasiswa['nama']) ?>" required>
            </div>
            <div class="mb-3">
                <input type="text" name="nim" class="form-control" placeholder="NIM" value="<?= htmlspecialchars($mahasiswa['nim']) ?>" required>
            </div>
            <div class="mb-3">
                <input type="text" name="prodi" class="form-control" placeholder="Program Studi" value="<?= htmlspecialchars($mahasiswa['prodi']) ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Data</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
        <?php if (isset($error)) echo "<p class='text-danger'>$error</p>"; ?>
    </div>
</body>
</html>
