<?php

require_once('core/init.php');
require_once('view/header.php');

// redirect kalau user sudah login
if( isset($_SESSION['user']) ) {
    header('Location: index.php');
}

// validasi register
if( isset($_POST['submit']) ) {
    $nama = $_POST['username'];
    $pass = $_POST['password'];

    // kalau dia gak kosong
    // trim menghilangkan jarak awal dan di akhir string
    if( !empty(trim($nama)) && !empty(trim($pass)) ) {
        
        if ( register_cek_nama($nama) ) {
            // memasukan ke database
            if( register_user($nama, $pass) ) {
                echo 'Berhasil';
            } else {
                echo 'Gagal Daftar';
            }
        } else {
            echo 'Nama Sudah Ada';
        }

    } else {
        echo 'Nama Tidak Boleh Kosong';
    }
}

?>

<form action="register.php" method="post">
    <label for="">Nama</label> <br>
    <input type="text" name="username">
    <br>
    <label for="">Password</label> <br>
    <input type="password" name="password">
    <br><br>
    <button type="submit" name="submit">Daftar</button>
</form>


<?php require_once('view/footer.php') ?>