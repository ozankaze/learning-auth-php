<?php

require_once('core/init.php');
require_once('view/header.php');

$error = '';

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
        
        if( cek_nama($nama) != 0 ) {
            if( cek_data($nama, $pass) ) {
                redirect_login($nama);
            } else {
                $error = 'data ada yang salah';
            }
        } else {
            $error =  'Namanya Belum Terdaftar Di Database';
        }

    } else {
        $error = 'Nama Tidak Boleh Kosong';
    }
}

// menguji pesan session
if( isset($_SESSION['msg']) ) {
    flash_delete($_SESSION['msg']);
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
    <br><br>
    <?php if( $error != '' ) : ?>
        <div style="color: red;" id="error">
            <?php echo $error; ?>
        </div>
    <?php endif ?>
</form>


<?php require_once('view/footer.php') ?>