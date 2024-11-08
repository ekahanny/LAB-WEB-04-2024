<?php
    include "./config/config.php";

    $error = "";

    $name = "";
    $nim = "";
    $prodi = "";

    $action = "";
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    }

    if ($action == 'edit') {
        $id = $_GET['id'];
        $queryGet = "SELECT * FROM mahasiswa WHERE id='$id'";
        $executeQGet = mysqli_query($conn, $queryGet);
        $data = mysqli_fetch_array($executeQGet);

        if (!$data) {
            $error = "Data tidak ditemukan";
        } else {
            $name = $data['name'];
            $nim = $data['nim'];
            $prodi = $data['prodi'];
        }
    }

    if (isset($_POST['save'])) {
        $name = $_POST['name'];
        $nim = $_POST['nim'];
        $prodi = $_POST['prodi'];

        if ($nim && $name && $prodi) {
            if ($action == 'edit') {
                $checkQuery = "SELECT * FROM mahasiswa WHERE nim='$nim' AND id != '$id'";
                $result = mysqli_query($conn, $checkQuery);

                if (mysqli_num_rows($result) > 0) {
                    $error = "NIM sudah digunakan, tolong pilih NIM lain.";
                } else {
                    $queryUpdate = "UPDATE mahasiswa SET name='$name',nim='$nim', prodi='$prodi' WHERE id='$id'";
                    $executeQUpdate = mysqli_query($conn, $queryUpdate);

                    if ($executeQUpdate) {
                        $success = "Data mahasiswa berhasil diubah";
                        header("Location: index.php?success=$success");
                    } else {
                        $error = "Data gagal diubah";
                    }
                }   
            } else {
                $checkQuery = "SELECT * FROM mahasiswa WHERE nim='$nim'";
                $result = mysqli_query($conn, $checkQuery);

                if (mysqli_num_rows($result) > 0) {
                    $error = "NIM sudah digunakan, tolong pilih NIM lain.";
                } else {
                    $queryInsert = "INSERT INTO mahasiswa(nim, name, prodi) VALUES ('$nim', '$name', '$prodi')";
                    try {
                        $executeQInsert = mysqli_query($conn, $queryInsert);
                        if ($executeQInsert) {
                            $success = "Data mahasiswa berhasil ditambahkan";
                            header("Location: index.php?success=$success");
                        }
                    } catch (mysqli_sql_exception $err) {
                        $error = "Data mahasiswa gagal ditambahkan";
                    }
                }
            }
        } else {
            $error = "Semua inputan harus diisi!";
        }
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
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h2 class="card-title">Form Data</h2>
            </div>
            <div class="card-body">
                <?php if ($error) { ?>
                    <div class="alert alert-danger">
                        <?php echo $error ?>
                    </div>
                <?php header("refresh:3;url=form.php");
                } ?>

                <form action="" method="post">
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $name ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $nim ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="prodi" class="col-sm-2 col-form-label">Prodi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="prodi" name="prodi" value="<?php echo $prodi ?>">
                        </div>
                    </div>
                    <button type="submit" name="save" class="btn btn-primary w-100"
                        onclick="return confirm('Ingin Melanjutkan?')">Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
