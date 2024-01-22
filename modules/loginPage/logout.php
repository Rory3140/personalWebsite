<?php
    session_start();
    session_destroy();
    header('Location: ./modules/home.php');
    exit;