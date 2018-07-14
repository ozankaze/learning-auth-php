<?php

function register_user($nama, $pass) {
    
    global $link;
    // mencegah slq injection
    $nama = escape($nama);
    $pass = escape($pass);
    
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    $query = "INSERT INTO `users` (`username`, `password`) VALUES ('$nama', '$pass')";
    // var_dump($query);die();

    // $a = mysqli_query($link, $query);

    // var_dump($a);die();
    if( mysqli_query($link, $query) ) {
        return true; // mengambil nilai
    } else {
        return false;
    }


}

function cek_nama($nama){
    global $link;
    $nama = escape($nama);

    $query = "SELECT * FROM users WHERE username = '$nama'";

    if( $result = mysqli_query($link, $query) ) {
        return mysqli_num_rows($result);
    }
}

// cek data
function cek_data($nama, $pass) {
    global $link;

    // mencegah slq injection
    $nama = escape($nama);
    $pass = escape($pass);

    $query = "SELECT `password` FROM `users` WHERE username = '$nama'";
    $result = mysqli_query($link, $query);
    // print_r($result);
    $hash = mysqli_fetch_assoc($result)['password']; // hasilnya array mysqli_fetch_assoc()
    // var_dump($hash);die();
    // echo $hash['password'];die();
    if( password_verify($pass, $hash) ) {
        // die('Berhasil');
        return true; 
    } else {
        return false;
    }

} 

// mencegah injection
function escape($data) {
    global $link;
    return mysqli_real_escape_string($link, $data);
}

// 
function redirect_login($nama) {
    $_SESSION['user'] = $nama;
    header('Location: index.php');
}

function flash_delete($nama) {
    if( isset($_SESSION['msg']) ) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
}

// menguji status user
function cek_status($nama) {
    global $link;
    $nama = escape($nama);

    $query = "SELECT `role` FROM users WHERE username='$nama'";

    $result = mysqli_query($link, $query);
    $query = mysqli_fetch_assoc($result)['role'];
    // var_dump($query);die();
    if( $query == 1 ) {
        return true;
    } else {
        return false;
    }
    // return $query; 

}

?>