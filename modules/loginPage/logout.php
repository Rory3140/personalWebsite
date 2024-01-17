<?php
    session_start();
    session_destroy();
    header('Location: ../loginPage/login.php');
    exit;