<?php 
    require 'library/controller.php';

    if (isset($_POST['submit'])) {
        $nrp = $_POST['nrp'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $ttl = $_POST['ttl'];
        $email = $_POST['email'];
        $no_hp = $_POST['no_hp'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        if (register($nrp, $nama, $alamat, $ttl, $email, $no_hp, $username, $password)) {
            header('Location: login.php');
        } else {
            echo "Gagal";   
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/cda0666fb1.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>    <title>Data Mahasiswa</title>
    <title>Register</title>
</head>
<body>
    <h1 class="mt-4 text-center">Register</h1><hr>
    <div class="container col-md-5">
        <form action="" method="post">
            <div class="form-group">
                <label for="nrp">NRP</label>
                <input type="text" name="nrp" id="nrp" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="ttl">TTL</label>
                <input type="text" name="ttl" id="ttl" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="no_hp">No HP</label>
                <input type="text" name="no_hp" id="no_hp" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>
            </div>
        </form>
    </div>
</body>
</html>