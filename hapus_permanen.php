<?php

include('config.php');

$id = $_GET['id'];

// SOFT DELETE
mysqli_query($conn, "DELETE FROM registration WHERE id = $id");

if(mysqli_affected_rows($conn)) {
    echo "<script>
                alert('Peserta berhasil dihapus permanen!')
                document.location.href = 'index.php'
            </script>";
            exit;
} else {
    echo "<script>
                alert('Peserta gagal dihapus permanen!')
                document.location.href = 'index.php'
            </script>";
            exit;
}