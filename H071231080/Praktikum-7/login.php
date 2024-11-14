<?php 
    session_start();
    include 'config\config.php';

    $error_message = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['staticEmail'];
        $password = $_POST['inputPassword'];

        $sql = "SELECT * FROM users WHERE username='$username' OR email='$username'";
        $result = $conn->query($sql);

        
        if ($result -> num_rows > 0) {
            $user = $result->fetch_assoc();
            
            if (password_verify($password, $user['password'])) {
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['role'];

                header('Location: dashbord.php');
                exit;
            } else {
                $error_message = "Password salah!";
            }
        } else {
            $error_message = "Pengguna tidak ditemukan!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #d397b8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container-fluid {
            display: flex;
            flex-wrap: wrap;
            width: 800px;
            height: 450px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            background-color: #fff;
        }
        .welcome-section {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            background-image: url(./image/lg.jpg);
            background-size: cover;
            background-position: center;
            width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: black;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
        }
        .welcome-section img{
            width:40%;
        }
        .login-section {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            background-color: #fefefe;
            padding: 40px;
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .login-section h2 {
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }
        .login-section label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        .login-section input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            background-color: #f9f9f9;
            transition: all 0.3s ease;
        }
        .login-section input:focus {
            border-color: #6200ea;
            box-shadow: 0 0 8px rgba(98, 0, 234, 0.4);
            outline: none;
        }
        .login-section button {
            background-color: #ab4e93;
            color: #ffff;
            width: 100%;
            margin-top: 20px;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .login-section button:hover {
            background-color: #bf9799;
        }
        .login-section p {
            margin-top: 10px;
            margin-bottom: 10px;
            text-align: center;
            font-size: 14px;
        }
        .login-section p a {
            color: #6200ea;
            text-decoration: none;
        }
        .login-section p a:hover {
            text-decoration: underline;
        }
        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 10px;
            text-align: center;
        }


        @media (max-width: 768px) {
            .container-fluid {
                width: 90%;
                height: auto;
            }
            .welcome-section {
                display: none;
            }
            .login-section {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="welcome-section">
        </div>

        <div class="login-section">
            <form action="" method="POST">
                <h2>Login</h2>

                <label for="staticEmail">Username</label>
                <input type="text" id="staticEmail" name="staticEmail" placeholder="Username or Email">

                <label for="inputPassword">Password</label>
                <input type="password" id="inputPassword" name="inputPassword" placeholder="Password">

                
                <?php if (!empty($error_message)): ?>
                    <div class="error-message">
                        <?php echo $error_message; ?>
                    </div>
                <?php endif; ?>

                <p>Belum punya Akun? <a href="daftar.php">Daftar</a></p>

                <button type="submit">Masuk</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
