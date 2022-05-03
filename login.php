<?php 
    session_start();
    $errorMessage = '';
    require 'library/controller.php';

    if (isset($_POST['login'])) {
        if (empty($_POST['username']) || empty($_POST['password'])) {
            $errorMessage = 'Username or Password is empty';
        } else {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if (login($username, $password)) {
                $_SESSION['user_is_logged_in'] = true;
                $_SESSION['username'] = $username;
                header('Location: index.php');
            } else {
                $errorMessage = 'Username or Password is invalid';
            }
        }
    } elseif (isset($_POST['register'])) {
        header('Location: register.php');
    }

    include 'library/closedb.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/cda0666fb1.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>    <title>Data Mahasiswa</title>
    <title>Login</title>
</head>
<body>
    <div class="container mt-4" style="width: 400px;">
        <h2 class="text-center">LOGIN</h2>
        <div class="container">
            <?php if($errorMessage != "") : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?= $errorMessage ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
        </div>
        <form action="" method="POST" class="p-3 mt-3">
            <div class="form-group">
                <input type="text" class="form-control" name="username" id="username" placeholder="Username">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary w-100" name="login">Login</button>
            </div>
            <button type="register" name="register" class="btn btn-secondary w-100">Register</button>
        </form>
    </div>
</body>
</html>