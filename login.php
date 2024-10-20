<?php

include('config.php');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // cek username apakah sudah terdaftar
    $result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");
    if ($row = $result->fetch_assoc()) {
        // cek password
        if (password_verify($password, $row['password'])) {
            $_SESSION['is_login'] = true;
            header('location: index.php');
            exit;
        }
    }
    echo "<script>
                alert('Username atau password salah!')
                document.location.href = 'login.php'
            </script>";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-5 shadow p-5">
                <h1 class="mb-5 text-center">Login</h1>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <button type="submit" name="login" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.min.js"></script>
</body>

</html>