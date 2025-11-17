<?php
    session_start();
    $_SESSION['username'] = "Bahlil"; //biasanya $_SESSION['isLogggedIn'] = true;

    header("Location: ceksession.php")
?>
