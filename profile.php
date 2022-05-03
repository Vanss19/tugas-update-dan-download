<?php 
    require 'library/controller.php';
    session_start();
    if (!isset($_SESSION['user_is_logged_in'])) {
        header('Location: login.php');
        exit;
    } else {
        $username = $_SESSION['username'];
        $users = getDataByUsername($username);
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
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-2 shadow">
        <span class="navbar-brand col-md-3 col-lg-2 mr-0 px-3">Admin</span>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </ul>
    </nav>
    <div class="container-fuild">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                    <li class="nav-item">
                            <a class="nav-link" href="index.php">
                                <i class="fa-solid fa-house mr-4"></i>
                                Dashboard 
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="profile.php">
                                <i class="fa-solid fa-address-card mr-4"></i>
                                Profile User <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="data_mahasiswa.php">
                                <i class="fa-solid fa-users mr-4"></i>
                                Data Mahasiswa 
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="data_tugas.php">
                                <i class="fa-solid fa-folder-open mr-4"></i>
                                Data Tugas
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="row">
                    <div class="col d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-4 pb-2 mx-4">
                        <h2>Profile</h2>
                    </div>
                    <div class="col col-lg-2 mt-4 mx-4">
                        <a href="update_profil.php" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                    </div>
                </div>
                <div class="container mt-3" style="width: 75%;">
                    <table class="table">
                        <?php foreach($users as $user): ?>
                            <tr>
                                <th>Profile</th>
                                <?php if($user['profil'] == NULL): ?>
                                    <td>--Tidak ada foto--</td>
                                <?php else: ?>
                                <td><img src="assets/files/<?= $user['profil'] ?>" alt="" class="img-fluid" width="400px"></td>
                                <?php endif; ?>
                            </tr>
                            <tr>
                                <th style="width: 200px">NRP</th>
                                <td><?= $user['nrp'] ?></td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td><?= $user['nama'] ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td><?= $user['alamat'] ?></td>
                            </tr>
                            <tr>
                                <th>Tempat, Tanggal Lahir</th>
                                <td><?= $user['ttl'] ?></td>
                            </tr>
                            <tr>
                                <th>No Telp</th>
                                <td><?= $user['nohp'] ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?= $user['email'] ?></td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td><?= $user['username'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </main>
        </div>
    </div>
</body>
</html>