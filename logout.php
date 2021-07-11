<?php 
    session_start();
    $_SESSION = [];
    session_unset();
    session_destroy();

    //hapus cookie
    setcookie('kepo', '', time() - 3600);
    setcookie('apaya','',time() - 3600);

    header("Location: login.php");
    exit;
?>