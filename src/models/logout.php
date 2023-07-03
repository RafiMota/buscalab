<?php
    session_start();
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    session_destroy();
    header('location: ../../html/suporte/login.html');
    exit;
?>