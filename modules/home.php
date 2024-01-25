<?php
    include_once 'conn.php';
    
    // Start the session
    session_start();

    // Check if the user is logged in (userid is stored in the session)
    if (isset($_SESSION['userid'])) {
        // Access the userid and username from the session
        $userid = $_SESSION['userid'];
        $username = $_SESSION['username'];
    }
?>

<!DOCTYPE html>
<html lang="en" style>

<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="images/websiteIcon.ico">

</head>

<body>

    <nav id="navbar">
        <div id="menu-icon">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
        <?php
            if (!isset($_SESSION['userid'])) {
                echo "<a href='loginPage/login.php' class='button' id='login'>Login</a>";
            }
        ?>
        <?php
            if (isset($_SESSION['userid'])) {
                echo "<a href='' class='button'>Profile</a>";
                echo "<a href='loginPage/logout.php' class='button' id='logout'>Logout</a>";
            }
        ?> 
    </nav>

    <div class="container" id="wide_container">
        <h1>HOME</h1>
        <div id="placeholder">
            <?php 
                if (isset($_SESSION['userid'])) {
                    echo "<h2>Welcome, " . $username . "</h2>";
                    echo "<p>Your userid is: " . $userid . "</p>";
                }
            ?>
        </div>

        <div class="app_list">
            <a href="resume/index.html" class="button" id="app">Resume</a>
            <a href="todoList/listselector.php" class="button" id="app">To-Do List</a>
            <a href="golfStats/golfstats.php" class="button" id="app">Golf Stats</a>
        </div>

    </div>

    <script src="script.js"></script>
</body>

</html>