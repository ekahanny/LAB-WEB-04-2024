<?php
include "./config/config.php";
session_start(); 

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

$success = "";
$error = "";

$role = $_SESSION['role'] ?? 'mahasiswa'; 
$username = $_SESSION['username'] ?? 'Guest';
$email = $_SESSION['email'] ?? 'Not Available';

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 5; 
$offset = ($page - 1) * $limit;


$queryTotalRows = "SELECT COUNT(*) as total FROM mahasiswa";
$resultTotalRows = mysqli_query($conn, $queryTotalRows);
$row = mysqli_fetch_assoc($resultTotalRows);
$totalRows = $row['total'];


$totalPages = ceil($totalRows / $limit);


$queryGetAll = "SELECT * FROM mahasiswa ORDER BY id ASC LIMIT $limit OFFSET $offset";
$executeQGetAll = mysqli_query($conn, $queryGetAll);


if ($role == 'admin' && isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = $_GET['id'];
    $queryDelete = "DELETE FROM mahasiswa WHERE id='$id'";
    $executeQDelete = mysqli_query($conn, $queryDelete);
    if ($executeQDelete) {
        header("Location: dashbord.php?success=Data berhasil dihapus");
        exit();
    } else {
        header("Location: dashbord.php?error=Gagal menghapus data");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            margin-top: 7%;
            font-family: 'Poppins', sans-serif;
            background-color: #d397b8;
            color: #333;
            padding: 0;
        }
        .container {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            background-color: #ffff;
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
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .button {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            color: white;
        }
        .button-tambah {
            color: #ffff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
            transition: background-color 0.3s ease;
            background-color:  #de71a6;
        }
        .button-profil {
            color: #ffff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
            transition: background-color 0.3s ease;
            background-color:  #808080;
        }
        .button-edit {
            color: #ffff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
            transition: background-color 0.3s ease;
            background-color: #7962c0;
        }
        .button-hapus {
            color: #ffff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
            transition: background-color 0.3s ease;
            background-color: #de71a6;
        }
        .modal {
            display: none;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            max-width: 400px;
            width: 100%;
        }
        table {
            background-color:#ffff;
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f682bd;
        }
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .pagination a {
            padding: 8px 12px;
            margin: 0 5px;
            background-color: #f1f1f1;
            text-decoration: none;
            color: #007bff;
            border-radius: 5px;
        }
        .pagination a:hover {
            background-color:#7962c0;
            color: white;
        }
        .active {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        
        <?php if ($error) { ?>
            <div class="alert alert-error">
                <?php echo $error; ?>
            </div>
        <?php } ?>

        <?php if ($success) { ?>
            <div class="alert alert-success">
                <?php echo $success; ?>
            </div>
        <?php } ?>

        <div>
            <div class="flex justify-between items-center">
                <h1>Data Mahasiswa</h1>
                
                <div>
                    
                    <?php if ($role == 'admin') { ?>
                        <a href="index.php" class="button-tambah">Tambah Data</a>
                    <?php } ?>
    
                
                    <button id="openModal" class="button-profil">Lihat Profil</button>
                </div>
            </div>

            
            <div id="profileModal" class="modal flex">
                <div class="modal-content">
                    <h2>Profil Pengguna</h2>
                    <p><strong>Username:</strong> <?php echo $username; ?></p>
                    <p><strong>Email:</strong> <?php echo $email; ?></p>
                    <p><strong>Role:</strong> <?php echo $role; ?></p>
                    <a href="logout.php" class="button-edit">Logout</a>
                    <button id="closeModal" class="button-hapus">Tutup</button>
                </div>
            </div>

            
            <div class="mt-4 border border-gray-300">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NAMA</th>
                            <th>NIM</th>
                            <th>Program Studi</th>
                            
                            <?php if ($role == 'admin') { ?>
                                <th>Aksi</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $number = $offset + 1; 
                        while ($data = mysqli_fetch_array($executeQGetAll)) {
                            $id = $data['id'];
                        ?>
                            <tr class="odd:bg-white even:bg-gray-100">
                                <td><?= $number++ ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td><?= $data['nim'] ?></td>
                                <td><?= $data['prodi'] ?></td>
                                
                                <?php if ($role == 'admin') { ?>
                                    <td>
                                        <a href="index.php?action=edit&id=<?php echo $id ?>" class="button-edit">Edit</a> |
                                        <a href="dashbord.php?action=delete&id=<?php echo $id ?>" class="button-hapus" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                                        
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination Links -->
            <div class="pagination">
                <?php if ($page > 1) { ?>
                    <a href="?page=<?= $page - 1 ?>">Sebelumnya</a>
                <?php } ?>

                <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                    <a href="?page=<?= $i ?>" class="<?= ($i == $page) ? 'active' : '' ?>"><?= $i ?></a>
                <?php } ?>

                <?php if ($page < $totalPages) { ?>
                    <a href="?page=<?= $page + 1 ?>">Berikutnya</a>
                <?php } ?>
            </div>
        </div>
    </div>

    
    <script>
        const modal = document.getElementById('profileModal');
        const openModalBtn = document.getElementById('openModal');
        const closeModalBtn = document.getElementById('closeModal');

        openModalBtn.onclick = function() {
            modal.style.display = 'flex';
        }

        closeModalBtn.onclick = function() {
            modal.style.display = 'none';
        }

        
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }
    </script>
</body>
</html>
