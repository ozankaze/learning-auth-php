<?php

function register_user($nama, $pass) {
    
    global $link;
    
    $query = "INSERT INTO `users` (username, password) VALUES ('$nama', '$pass')";

    $a = mysqli_query($link, $query);

    // var_dump($a);die();
    if( mysqli_query($link, $query) ) {
        return true; // mengambil nilai
    } else {
        return false;
    }


}

?>