<?php

include('config.php');

$id = $_GET['id'];
$data_peserta = mysqli_query($conn, "SELECT * FROM registration WHERE id = $id")->fetch_assoc();

if(isset($_POST['edit'])) {
    $nama = $_POST['nama'];
    $institusi = $_POST['institusi'];
    $country = $_POST['country'];
    $address = $_POST['address'];

    // edit ke database
    mysqli_query($conn, "UPDATE registration SET nama = '$nama', institusi = '$institusi', country = '$country', address = '$address' WHERE id = $id");

    if(mysqli_affected_rows($conn)) {
        echo "<script>
                alert('Peserta berhasil diedit!')
                document.location.href = 'index.php'
            </script>";
            exit;
    } else {
        echo "<script>
                alert('Peserta gagal diedit!')
                document.location.href = 'index.php'
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
    <title>Edit</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-5 shadow p-5">
                <h1 class="text-center my-5">Edit peserta</h1>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" value="<?= $data_peserta['nama'] ?>"class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="institusi">Institusi</label>
                        <input type="text" name="institusi" id="institusi" value="<?= $data_peserta['institusi'] ?>"class="form-control">
                    </div>
                    <div class="mb-3">

                        <label for="country">Country</label>
                            <select name="country" id="country"class="form-control">
                                <?php foreach($country as $item): ?>
                                    <option value="<?= $item ?>" <?= ($data_peserta['country'] == $item) ? 'selected' : '' ?>><?= $item ?></option>
                                <?php endforeach ?>
                            </select>
                    </div>
                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" value="<?= $data_peserta['address'] ?>"class="form-control">
                    </div>
                
                    <button type="submit" name="edit"class="btn btn-primary">Ubah</button>
                </form>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.min.js"></script>
</body>

</html>