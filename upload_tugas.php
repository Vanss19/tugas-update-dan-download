<?php 
    require 'library/controller.php';
    session_start();

    if (!isset($_SESSION['user_is_logged_in'])) {
        header('Location: login.php');
        exit;
    } else {
        if (isset($_POST['submit'])) {
            $nama_file = $_FILES['file']['name'];
            $ukuran_file = $_FILES['file']['size'];
            $tmp_file = $_FILES['file']['tmp_name'];
            $deskripsi_file = $_POST['deskripsi'];
            $tanggal_upload = date('Y-m-d');

            $path = 'assets/files/'.$nama_file;

            if (move_uploaded_file($tmp_file, $path)) {
                if (addTugas($nama_file, $ukuran_file, $deskripsi_file, $tanggal_upload)) {
                    header('Location: data_tugas.php');
                }
            } else {
                echo '<script>alert("File gagal diupload")</script>';
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
    <title>Tambah Tugas</title>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col col-lg-2 mt-2">
                <a href="data_tugas.php" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i></a>
            </div>
            <div class="col">
                <h2>Tambah Tugas</h2>
            </div>
        </div>
        <br>
        <div class="container mt-3" style="width: 75%;">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="file">File Tugas</label>
                    <input type="file" class="form-control" id="file" name="file" accept=".docx, .pdf, .doc" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" name="deskripsi" id="deskripsi" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>