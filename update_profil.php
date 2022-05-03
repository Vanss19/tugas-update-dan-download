<?php 
    require 'library/controller.php';
    session_start();
    if (!isset($_SESSION['user_is_logged_in'])) {
        header('Location: login.php');
        exit;
    } else {
        $username = $_SESSION['username'];
        $users = getDataByUsername($username);
        $user = $users[0];

        if (isset($_POST['submit'])) {
            $ekstensi_diperbolehkan	= array('png','jpg','jpeg');
            $nrp = $_POST['nrp'];
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $ttl = $_POST['ttl'];
            $email = $_POST['email'];
            $no_hp = $_POST['nohp'];
            $username = $_POST['username'];
            $profil = $_FILES['profil']['name'];
            $x = explode('.', $profil);
            $ekstensi = strtolower(end($x));
            $temp_profil = $_FILES['profil']['tmp_name'];
            if ($profil) {
                if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                    $path = 'assets/files/' . $profil;
                    $result = move_uploaded_file($temp_profil, $path);
                } else {
                    echo "<script>alert('Ekstensi gambar yang diupload tidak sesuai');</script>";
                    echo "<script>location='update_profil.php';</script>";
                }
            } else {
                $result = false;
            }
            if (edit($nrp, $nama, $alamat, $ttl, $email, $no_hp, $username)) {
                if ($result) {
                    edit_profile($nrp, $profil);
                    header('Location: profile.php');
                    exit;
                } else {
                    header('Location: profile.php');
                }
            } else {
                echo '<script>alert("Gagal mengubah data!");</script>';
            }
        }
    
        include 'library/closedb.php';
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
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <link href="assets/style.css" rel="stylesheet">
    <title>Profile</title>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col col-lg-2 mt-2">
                <a href="profile.php" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i></a>
            </div>
            <div class="col">
                <h2>Edit Profile</h2>
            </div>
        </div>
        <br>
        <div class="container mt-3" style="width: 75%;">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="profil">Profil</label>
                    <input type="file" class="form-control" id="profil" name="profil" value="<?= $user['profil'] ?>" accept="image/*">
                </div>
                <div class="form-group">
                    <label for="nrp">NRP</label>
                    <input type="text" name="nrp" id="nrp" class="form-control" value="<?= $user['nrp'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="<?= $user['nama'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" value="<?= $user['alamat'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="ttl">TTL</label>
                    <input type="text" name="ttl" id="ttl" class="form-control" value="<?= $user['ttl'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?= $user['email'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="nohp">No HP</label>
                    <input type="text" name="nohp" id="nohp" class="form-control" value="<?= $user['nohp'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" value="<?= $user['username'] ?>" readonly>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>