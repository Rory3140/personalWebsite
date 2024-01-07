<?php
include_once 'conn.php';

session_start(); // Start the session

// Check if the user is logged in (userid is stored in the session)
if (!isset($_SESSION['userid'])) {
    // User is not logged in, redirect to the login page
    header('Location: ../loginPage/login.php');
    exit;
}

// Access the userid and username from the session
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en" style>

<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../loginPage/style.css">
    <link rel="icon" href="../loginPage/images/websiteIcon.ico">

</head>

<body>

    <nav id="navbar">
        <div id="menu-icon">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
        <a href="../loginPage/home.php" class="button">Home</a>
        <a href="" class="button">Profile</a>
        <a href="../loginPage/logout.php" class="button" id="logout">Logout</a>
    </nav>

    <div class="container" id="homecont">
        <h1>HOME</h1>
        <h2>Welcome,
            <?php echo $username; ?>
        </h2>
        <p>Your userid is:
            <?php echo $userid; ?>
        </p>

        <div id="applist">
            <a href="../todoList/todolist.php" class="button" id="app">To-Do List</a>
            <a href="../golfStats/golfstats.php" class="button" id="app">Golf Stats</a>
            <a href="../resume/index.html" class="button" id="app">Resume</a>
        </div>

    </div>

    <script src="../loginPage/script.js"></script>
</body>

</html>