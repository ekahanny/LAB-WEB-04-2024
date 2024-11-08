<?php
include './config/config.php';

$error = "";
$success = "";

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $checkQuery = "SELECT * FROM akun WHERE username='$username'";
    $result = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
        $error = "Username sudah digunakan, tolong pilih username lain.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO akun (username, password) VALUES ('$username', '$hashed_password')";
        if (mysqli_query($conn, $query)) {
            $success = "Pendaftaran berhasil.";
        } else {
            $error = "Terjadi kesalahan.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center mb-4">REGISTER</h3>
                        <?php if (!empty($error)): ?>
                            <div class="alert alert-danger"><?= $error ?></div>
                        <?php endif; ?>
                        <?php if (!empty($success)): ?>
                            <div class="alert alert-success"><?= $success ?></div>
                        <?php endif; ?>
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" name="register" class="btn btn-primary w-100">Register</button>
                        </form>
                        <div class="text-center mt-3">
                            <a href="login.php" class="btn btn-secondary w-100">Kembali ke Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
