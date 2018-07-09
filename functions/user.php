<?php

function register_user($nama, $pass) {
    
    global $link;
    // mencegah slq injection
    $nama = mysqli_real_escape_string($link, $nama);
    $pass = mysqli_real_escape_string($link, $pass);
    
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

// mengui nama kembar
function register_cek_nama($nama) {
    global $link;
    $nama = mysqli_real_escape_string($link, $nama);

    $query = "SELECT * FROM users WHERE username = '$nama'";

    if( $result = mysqli_query($link, $query) ) {
        if( mysqli_num_rows($result) == 0 ) {
            return true;
        } else {
            return false;
        }
    }
}

?>