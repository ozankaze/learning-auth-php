<?php

require_once('core/init.php');
require_once('view/header.php');

// validasi register
if( isset($_POST['submit']) ) {
    $nama = $_POST['username'];
    $pass = $_POST['password'];

    // kalau dia gak kosong
    // trim menghilangkan jarak awal dan di akhir string
    if( !empty(trim($nama)) && !empty(trim($pass)) ) {
        
        cek_data($nama, $pass);

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
    <button type="submit" name="submit">Daftar</button>
</form>


<?php require_once('view/footer.php') ?>