<?php
    session_start();
    session_destroy();
    header('Location: /MIS_PROYECTOS/CenitSky/admin/login.php');
    exit;
?>