<?php
include_once '../conn.php';

// Start the session
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ToDo List</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" href="../images/websiteIcon.ico">

</head>

<body>

    <nav id="navbar">
        <div id="menu-icon">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
        <a href="../home.php" class="button">Home</a>
        <a href="" class="button">Profile</a>
        <a href="../loginPage/logout.php" class="button" id="logout">Logout</a>
    </nav>

    <div id="wide_container" class="container">
        <h1>Select List</h1>

    </div>

    <script src="../script.js"></script>

</body>

</html>

<?php
$conn->close();
?>