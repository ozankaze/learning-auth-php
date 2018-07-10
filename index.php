<?php

require_once('core/init.php');
require_once('view/header.php');

if( !isset($_SESSION['user']) ) {
    header('Location: login.php');
}

?>

Konten


<?php require_once('view/footer.php') ?>