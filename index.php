<?php

include('config.php');

$data_peserta = mysqli_query($conn, "SELECT * FROM registration");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin | Kelola peserta</title>
</head>
<body>
    <h1>Data peserta</h1>

    <a href="registrasi.php">Registrasi Peserta</a>

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

        <?php foreach($data_peserta as $data): ?>
            <tr>
                <td>1</td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['email'] ?></td>
                <td><?= $data['institusi'] ?></td>
                <td><?= $data['country'] ?></td>
                <td><?= $data['address'] ?></td>
                <td><a href="edit.php">Edit</a> | <a href="hapus.php">Hapus</a></td>
            </tr>
        <?php endforeach ?>
    </table>
</body>
</html>