<?php

include('config.php');

if (!isset($_SESSION['is_login'])) {
    header('location: login.php');
    exit;
}

$data_peserta = mysqli_query($conn, "SELECT * FROM registration WHERE is_deleted = 0");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin | Kelola peserta</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <h1 class="text-center my-5">Data peserta</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="registrasi.php" class="btn btn-primary">Registrasi Peserta</a>
                    <a href="sampah.php" class="btn btn-primary">Data Sampah</a>
                    <a href="logout.php" class="btn btn-secondary">Logout</a>
                </div>
            </div>
        </div>

        <table class="table table-striped mt-3" border="1" cellspacing="0" cellpadding="10">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Institusi</th>
                <th>Country</th>
                <th>Address</th>
                <th>Aksi</th>
            </tr>
    
            <?php $i = 1 ?>
            <?php foreach ($data_peserta as $data): ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['email'] ?></td>
                    <td><?= $data['institusi'] ?></td>
                    <td><?= $data['country'] ?></td>
                    <td><?= $data['address'] ?></td>
                    <td><a href="edit.php?id=<?= $data['id'] ?>" class="btn btn-success">Edit</a> | <a href="hapus.php?id=<?= $data['id'] ?>" class="btn btn-danger">Hapus</a></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>

    <script src="js/bootstrap.min.js"></script>
</body>

</html>