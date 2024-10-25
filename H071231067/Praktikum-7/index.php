<?php
    session_start();
    include "./config/config.php";

    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit;
    }

    $success = "";
    $error = "";

    if (isset($_GET['success'])) {
        $success = $_GET['success'];
    }
    if (isset($_GET['error'])) {
        $error = $_GET['error'];
    }

    $action = "";
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    }
    if ($action == 'delete') {
        $id = $_GET['id'];
        $queryDelete = "DELETE FROM mahasiswa WHERE id='$id'";
        $executeQDelete = mysqli_query($conn, $queryDelete);
        if ($executeQDelete) {
            $success = "Data mahasiswa berhasil dihapus";
        } else {
            $error = "Data mahasiswa gagal dihapus";
        }
    }

    if (isset($_POST['logout'])) {
        session_destroy();
        header('Location: login.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light py-5">
    <div class="container">
        <div class="d-flex justify-content-between mb-3">
            <form method="POST" action="">
                <button type="submit" name="logout" class="btn btn-danger">Logout</button>
            </form>
        </div>
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2 class="card-title">Data Mahasiswa</h2>
                <?php if ($_SESSION['username'] == 'admin123') { ?>
                    <a href="form.php" class="btn btn-primary">Tambah Data</a>
                <?php } ?>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Prodi</th>

                            <?php if ($_SESSION['username'] == 'admin123') { ?>
                                <th>Opsi</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $number = 1;
                            $queryGet = "SELECT * FROM mahasiswa ORDER BY id ASC";
                            $executeQGet = mysqli_query($conn, $queryGet);
                            while ($data = mysqli_fetch_array($executeQGet)) {
                                $id = $data['id'];
                        ?>
                        <tr>
                            <td><?= $number++ ?></td>
                            <td><?= $data['name'] ?></td>
                            <td><?= $data['nim'] ?></td>
                            <td><?= $data['prodi'] ?></td>

                            <?php if ($_SESSION['username'] == 'admin123') { ?>
                                <td>
                                    <a href="form.php?action=edit&id=<?= $id ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="index.php?action=delete&id=<?= $id ?>" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Ingin menghapus data ini?')">Hapus</a>
                                </td>
                            <?php } ?>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
