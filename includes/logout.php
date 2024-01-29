<?php
    // Logs out user and ends session
    include_once '../config.php';

    session_start();
    session_destroy();
    header('Location: ' . $homePath);
    exit;