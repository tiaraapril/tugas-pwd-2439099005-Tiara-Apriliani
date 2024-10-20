<?php

include('config.php');

if(!isset($_SESSION['is_login'])) {
    header('location: login.php');
    exit;
}

$data_peserta = mysqli_query($conn, "SELECT * FROM registration WHERE is_deleted = 1");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin | Kelola peserta</title>
</head>
<body>
    <h1>Data Sampah</h1>

    <a href="registrasi.php">Registrasi Peserta</a>
    <a href="index.php">Kembali</a>

    <table border="1" cellspacing="0" cellpadding="10">
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
        <?php foreach($data_peserta as $data): ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['email'] ?></td>
                <td><?= $data['institusi'] ?></td>
                <td><?= $data['country'] ?></td>
                <td><?= $data['address'] ?></td>
                <td><a href="pulihkan.php?id=<?= $data['id'] ?>">Pulihkan</a> | <a href="hapus_permanen.php?id=<?= $data['id'] ?>">Hapus Permanen</a></td>
            </tr>
        <?php endforeach ?>
    </table>
</body>
</html>