<?php

include('config.php');

if (!isset($_SESSION['is_login'])) {
    header('location: login.php');
    exit;
}

if (isset($_POST['registrasi'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $institusi = $_POST['institusi'];
    $country = $_POST['country'];
    $address = $_POST['address'];

    // cek email apakah sudah terdaftar
    $result = mysqli_query($conn, "SELECT email FROM registration WHERE email = '$email'");
    if ($result->fetch_assoc()) {
        echo "<script>
                alert('Email telah terdaftar!')
                document.location.href = 'registrasi.php'
            </script>";
        exit;
    }

    // tambah ke database
    mysqli_query($conn, "INSERT INTO registration VALUES(NULL, '$nama', '$email', '$institusi', '$country', '$address', 0)");

    if (mysqli_affected_rows($conn)) {
        echo "<script>
                alert('Peserta berhasil terdaftar!')
                document.location.href = 'registrasi.php'
            </script>";
        exit;
    } else {
        echo "<script>
                alert('Peserta gagal terdaftar!')
                document.location.href = 'registrasi.php'
            </script>";
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-5 shadow p-5">
                <h1 class="mb-5 text-center"> Registrasi peserta</h1>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>
                    <div class="mb-3">

                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="institusi">Institusi</label>
                        <input type="text" name="institusi" id="institusi" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="country">Country</label>
                        <select name="country" id="country" class="form-control">
                            <option disabled selected>-- Pilih Negara --</option>
                            <?php foreach($country as $item): ?>
                                <option value="<?= $item ?>"><?= $item ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address"class="form-control">
                    </div>
        
                    <button type="submit" name="registrasi" class="btn btn-primary">Registrasi</button>
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                </form>
            </div>

        </div>
    </div>

    <script src="js/bootstrap.min.js"></script>
</body>

</html>