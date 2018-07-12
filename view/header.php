<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Halaman Login</title>
</head>
    <body>

    <header>
        <h1>Login Dan Register</h1>
    </header>

    <nav>
        <a href="index.php">Home</a>
        
        <!-- kalau user tidak login -->
        <?php if( !isset($_SESSION['user']) ) { ?>
            <a href="register.php">Register</a>
            <a href="login.php">Login</a>
        <?php }else{ ?>
            <a href="logout.php">Logout</a>
        <?php } ?>
    </nav>
    <br>


    