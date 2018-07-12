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
        
        if( login_cek_nama($nama) ) {
            if( cek_data($nama, $pass) ) {
                $_SESSION['user'] = $nama;
                header('Location: index.php');
            } else {
                echo 'data ada yang salah';
            }
        } else {
            echo 'Namanya Belum Terdaftar Di Database';
        }

    } else {
        echo 'Nama Tidak Boleh Kosong';
    }
}

?>

<form action="login.php" method="post">
    <label for="">Nama</label> <br>
    <input type="text" name="username">
    <br>
    <label for="">Password</label> <br>
    <input type="password" name="password">
    <br><br>
    <button type="submit" name="submit">Login</button>
</form>


<?php require_once('view/footer.php') ?>