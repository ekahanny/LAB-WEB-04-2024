<?php
include "./config/config.php";

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $email = $_POST['email'];
    $role = 'mahasiswa';

    $sql_check = "SELECT * FROM users WHERE username='$username' or email='$email'";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        echo "Username atau email sudah terdaftar!";
    } else {
        $sql = "INSERT INTO users (username, password, email, role) VALUES ('$username', '$password', '$email', '$role')";
        if ($conn->query($sql) === TRUE) {
            $success = "Berhasil Registrasi";
            echo "Registrasi berhasil!";
            header("Location: login.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="style.css">
    <style>
        
        body {
            font-family: Arial, sans-serif;
            background-color: #d397b8;
            margin: 0;
            padding: 0;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin: 20px 0;
        }

        .form {
            margin-top: 100px;
            background-color: white;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 100%;
            max-width: 800px;
        }

        .form h2 {
            margin-bottom: 20px;
            font-size: 24px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            outline: none;
            border-color: #80bdff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
        }

        .btn2, .btn-back {
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }

        .btn2 {
            background-color: #de71a6;
            color: white;
        }

        .btn-back {
            background-color: #6c757d;
            color: white;
            text-decoration: none;
        }

        .btn2:hover {
            background-color: ;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .form div[style*="display: flex"] {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }
        
        
        @media (max-width: 768px) {
            .col-6 {
                flex-basis: 100%;
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="row">
            <div class="form">
                <h2 align="center">Registrasi Pengguna</h2>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="password" required>
                    </div>

                    <div style="display: flex; justify-content: space-between;">
                        <a href="login.php" class="btn-back">Kembali</a>
                        <button type="submit" class="btn2">Daftar</button>
                    </div>
                </form>
            </div>

    </div>
</body>
</html>
