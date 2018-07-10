<?php

require_once('core/init.php');
require_once('view/header.php');

if( !isset($_SESSION['user']) ) {
    header('Location: login.php');
}

?>

<h1>Selamat Datang <?php echo $_SESSION['user']; ?></h1>

<a href="logout.php">Logout</a>


<?php require_once('view/footer.php') ?>