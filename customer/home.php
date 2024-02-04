<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <section class="header">
        <div class="logo">
            <img src="../img/logo2.png" alt="">
        </div>
        <!--<div>
            Welcome 
            <?php
            // Check if the user is logged in
            if (isset($_SESSION['loggedin'])) {
                // If not, redirect them to the login page
                echo $_SESSION['email'];
                //header('Location: index.php');
                exit;
            }else{
                echo 'user not logged in';
            }
            ?>
        </div>-->
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <a href="#" id="close">X</a>
            </ul>
        </nav>
        <div class="profile">Profile</div>
    </section>
</body>
</html>