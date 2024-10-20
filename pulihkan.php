<?php

include('config.php');

$id = $_GET['id'];

// SOFT DELETE
mysqli_query($conn, "UPDATE registration SET is_deleted = 0 WHERE id = $id");

if(mysqli_affected_rows($conn)) {
    echo "<script>
                alert('Peserta berhasil dipulihkan!')
                document.location.href = 'index.php'
            </script>";
            exit;
} else {
    echo "<script>
                alert('Peserta gagal dipulihkan!')
                document.location.href = 'index.php'
            </script>";
            exit;
}