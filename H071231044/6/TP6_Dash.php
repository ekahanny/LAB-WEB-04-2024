<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: TP6_Login.php');
    exit;
}

// Set batas waktu login (misalnya 15 detik)
$max_login_duration = 15; 

// Mengecek apakah waktu login ada
if (isset($_SESSION['login_time'])) {
    // Hitung waktu yang sudah berlalu
    $elapsed_time = time() - $_SESSION['login_time'];

    // Jika sudah melebihi 15 detik, logout otomatis
    if ($elapsed_time > $max_login_duration) {
        session_unset();   // Hapus semua data sesi
        session_destroy(); // Hancurkan sesi
        header('Location: TP6_Login.php?message=Session expired');  // Redirect ke halaman login
        exit();
    }
} else {
    header('Location: TP6_Login.php');
    exit;
}
$remaining_time = $max_login_duration - $elapsed_time;
$user = $_SESSION['user'];
$_SESSION['login_time'] = time(); 
$users = [
    // Users array here, the same as in index.php
];

function displayUser($user) {
    echo "<div class='user'>";
    echo "<p>Name: " . $user['name'] . "</p>";
    echo "<p>Email: " . $user['email'] . "</p>";
    if (isset($user['gender'])) {
        echo "<p>Gender: " . $user['gender'] . "</p>";
        echo "<p>Faculty: " . $user['faculty'] . "</p>";
        echo "<p>Batch: " . $user['batch'] . "</p>";
    }
    echo "</div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <meta http-equiv="refresh" content="15;url=TP6_Login.php">
</head>
<body>
    <div class="dashboard-container">
        <h2>Welcome, <?= $user['name'] ?></h2>
        <form action="TP6_logout.php" method="POST">
            <button type="submit" class="logout-btn">Logout</button>
        </form>
        <div class="user-data">
            <?php
            if ($user['username'] === 'adminxxx') {
                header('Location: TP6_Admin.php');
            } else {
                displayUser($user);
            }
            ?>
        </div>
    </div>
</body>
</html>
