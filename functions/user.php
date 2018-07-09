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

?>