<?php 
    include 'config.php';
    include 'opendb.php';

    function login($username, $password) {
        global $conn;
        $sql = "SELECT * FROM `data_mahasiswa` WHERE `username` = '$username'";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function register($nrp, $nama, $alamat, $ttl, $email, $no_hp, $username, $password){
        global $conn;
        
        $sql = "INSERT INTO data_mahasiswa VALUES ('$nrp', '$nama', '$alamat', '$ttl', '$email', '$no_hp', '$username', '$password', NULL)";
        if(mysqli_query($conn, $sql)){
            return true;
        } else {
            return false;
        }
    }

    function addTugas($nama, $ukuran, $deskripsi, $upload_at){
        global $conn;
        $sql = "INSERT INTO data_tugas (nama, ukuran, deskripsi, upload_at) VALUES ('$nama', '$ukuran', '$deskripsi', '$upload_at')";
        if(mysqli_query($conn, $sql)){
            return true;
        } else {
            return false;
        }
    }

    function edit($nrp, $nama, $alamat, $ttl, $email, $no_hp, $username){
        global $conn;

        $sql = "UPDATE data_mahasiswa SET nama = '$nama', alamat = '$alamat', ttl = '$ttl', email = '$email', nohp = '$no_hp' WHERE nrp = '$nrp'";
        if(mysqli_query($conn, $sql)){
            return true;
        } else {
            return false;
        }
    }

    function edit_profile($nrp, $profil){
        global $conn;

        $sql = "UPDATE data_mahasiswa SET profil = '$profil' WHERE nrp = '$nrp'";
        if(mysqli_query($conn, $sql)){
            return true;
        } else {
            return false;
        }
    }

    function getData(){
        global $conn;
        $data = "SELECT * FROM data_mahasiswa ORDER BY nrp ASC";
        $result = mysqli_query($conn, $data);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    function getDataTugas(){
        global $conn;
        $data = "SELECT * FROM data_tugas";
        $result = mysqli_query($conn, $data);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    function getDataByNrp($nrp){
        global $conn;
        $data = "SELECT * FROM data_mahasiswa WHERE nrp='$nrp'";
        $result = mysqli_query($conn, $data);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    function getDataByUsername($username){
        global $conn;
        $data = "SELECT * FROM data_mahasiswa WHERE username='$username'";
        $result = mysqli_query($conn, $data);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }
?>