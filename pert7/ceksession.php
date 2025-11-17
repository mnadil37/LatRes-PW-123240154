<?php
    session_start();

    if(isset($_SESSION['username'])) {
        echo $_SESSION['username'] . " Ganteng.";
    } else {
        echo "Session tidak ditemukan";
    }

?>