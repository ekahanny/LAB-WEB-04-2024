<?php 
include 'config/config.php';

$success = "";
$error = "";


if (isset($_GET['success'])) {
    $success = $_GET['success'];
}

if (isset($_GET['error'])) {
    $error = $_GET['error'];
}

$id = "";
$nama = "";
$nim = "";
$programStudi = "";

// Tangani aksi edit jika ada parameter action=edit
if (isset($_GET['action']) && $_GET['action'] == 'edit') {
    $id = $_GET['id'];
    $queryEdit = "SELECT * FROM mahasiswa WHERE id='$id'";
    $executeQEdit = mysqli_query($conn, $queryEdit);
    $data = mysqli_fetch_array($executeQEdit);
    if ($data) {
        $nim = $data['nim'];
        $nama = $data['nama'];
        $programStudi = $data['prodi'];
    }
}

// Tangani aksi submit (tambah atau edit data)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $programStudi = $_POST['programStudi'];

    if ($id) {
        $queryCheckNim = "SELECT * FROM mahasiswa WHERE nim = '$nim' AND id != '$id'";
        $executeCheckNim = mysqli_query($conn, $queryCheckNim);

        // Jika NIM sudah ada pada mahasiswa lain
        if (mysqli_num_rows($executeCheckNim) > 0) {
            $error = "Gagal mengupdate data, NIM sudah digunakan oleh mahasiswa lain.";
        } else {
            $queryUpdate = "UPDATE mahasiswa SET nim='$nim', nama='$nama', prodi='$programStudi' WHERE id='$id'";
            $executeQUpdate = mysqli_query($conn, $queryUpdate);
            if ($executeQUpdate) {
                $success = "Data berhasil diupdate.";
            } else {
                $error = "Gagal mengupdate data.";
            }
        }
    } else {
        // Periksa apakah NIM sudah ada (untuk penambahan data baru)
        $queryCheckNim = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
        $executeCheckNim = mysqli_query($conn, $queryCheckNim);

        // Jika NIM sudah ada
        if (mysqli_num_rows($executeCheckNim) > 0) {
            $error = "Gagal menambahkan data, NIM sudah ada.";
        } else {
            // Insert data baru
            $queryInsert = "INSERT INTO mahasiswa (nim, nama, prodi) VALUES ('$nim', '$nama', '$programStudi')";
            $executeQInsert = mysqli_query($conn, $queryInsert);
            if ($executeQInsert) {
                $success = "Data berhasil ditambahkan.";
            } else {
                $error = "Gagal menambahkan data.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #d397b8;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }
        .alert {
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }
        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
        }
        .form-card {
            margin-top: 10%;
            background-color: #ffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 24px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 16px;
        }
        button, .btn-back {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            color: white;
            margin-right: 10px;
        }
        .buttons {
            display: flex;
            justify-content: flex-end;
            margin-top: 16px;
        }
        .btn-back {
            background-color: #808080;
        }
        .btn-back:hover {
            background-color: #5a6268;
        }
        .btn-submit {
            background-color: #de71a6;
        }
        .btn-submit:hover {
            background-color: #0056b3;
        }
    </style>

</head>
<body>
    <div class="container">
        <?php if ($error) { ?>
            <div class="alert alert-error">
                <?php echo $error ?>
            </div>
        <?php } ?>

        <?php if ($success) { ?>
            <script>
                alert("<?php echo $success; ?>");
                window.location.href = "dashbord.php";
            </script>
        <?php } ?>

        <div class="form-card">
            <form method="POST">
                <div>
                    <label for="nama">NAMA</label>
                    <input type="text" name="nama" id="nama" value="<?= $nama ?>" required>
                </div>

                <div>
                    <label for="nim">NIM</label>
                    <input type="text" name="nim" id="nim" value="<?= $nim ?>" required>
                </div>

                <div>
                    <label for="programStudi">Program Studi</label>
                    <input type="text" name="programStudi" id="programStudi" value="<?= $programStudi ?>" required>
                </div>
                <div class="buttons">
                    <button type="submit" class="btn-submit">Simpan</button>
                    <a href="dashbord.php" class="btn-back">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
