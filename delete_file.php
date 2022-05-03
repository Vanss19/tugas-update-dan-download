<?php
    include 'library/config.php';
    include 'library/opendb.php';
    
    $file = $_GET['file'];
    $path = "assets/files/".basename($file);
    if(unlink($path)){
        $sql = "DELETE FROM data_tugas WHERE nama = '$file'";
        if(mysqli_query($conn, $sql)){
            header("Location: data_tugas.php");
        } else {
            echo "File gagal dihapus";
        }
    } else {
        echo "File gagal dihapus";
    }

    include 'library/closedb.php';
?>