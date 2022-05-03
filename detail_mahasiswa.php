<?php 
    include 'library/controller.php';
    session_start();
    if (!isset($_SESSION['user_is_logged_in'])) {
        header('Location: login.php');
        exit;
    } else {
        $nrp = $_GET['nrp'] ?? '';
        $mahasiswa = getDataByNrp($nrp);

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
    <title>Detail Mahasiswa</title>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col col-lg-2 mt-2">
                <a href="data_mahasiswa.php" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i></a>
            </div>
            <div class="col">
                <h1 >Detail Mahasiswa</h1><br>
            </div>
        </div>
    </div>
    <div class="container mt-3" style="width: 75%;">
        <table class="table">
            <?php foreach($mahasiswa as $mhs): ?>
                <tr>
                    <th>Profile</th>
                    <?php if($mhs['profil'] == NULL): ?>
                        <td>--Tidak ada foto--</td>
                    <?php else: ?>
                    <td>
                        <img src="assets/files/<?= $mhs['profil'] ?>" alt="" class="img-thumbnail" width="300px">
                        <a href="download.php?file=<?= $mhs['profil'] ?>" class="btn btn-primary btn-sm ml-4"><i class="fa-solid fa-download"></i></a>
                    </td>
                    <?php endif; ?>
                </tr>
                <tr>
                    <th style="width: 200px">NRP</th>
                    <td><?= $mhs['nrp'] ?></td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td><?= $mhs['nama'] ?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td><?= $mhs['alamat'] ?></td>
                </tr>
                <tr>
                    <th>Tempat, Tanggal Lahir</th>
                    <td><?= $mhs['ttl'] ?></td>
                </tr>
                <tr>
                    <th>No Telp</th>
                    <td><?= $mhs['nohp'] ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?= $mhs['email'] ?></td>
                </tr>
                <tr>
                    <th>Username</th>
                    <td><?= $mhs['username'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>