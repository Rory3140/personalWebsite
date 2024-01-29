<?php
    include_once '../config.php';
    include_once $connPath;
    
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
<html lang="en">

<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo $cssPath; ?>">
    <link rel="icon" href="<?php echo $websiteIcon; ?>">
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
                echo "<a href=" . $loginPath . " class='button' id='login'>Login</a>";
            } else {
                echo "<a href=" . $profilePath . " class='button'>Profile</a>";
                echo "<a href=" . $logoutPath . " class='button' id='logout'>Logout</a>";
            }
        ?> 
    </nav>

    <div class="container" id="wide-container">
        <h1>HOME</h1>
        <div id="placeholder">
            <?php 
                if (isset($_SESSION['userid'])) {
                    echo "<h2>Welcome, " . $username . "</h2>";
                    echo "<p>Your userid is: " . $userid . "</p>";
                }
            ?>
        </div>

        <div class="app-list">
            <a href="<?php echo $resumePath; ?>" class="button app">Resume</a>
            <a href="<?php echo $listSelectorPath; ?>" class="button app">To-Do List</a>
            <a href="<?php echo $golfStatsPath; ?>" class="button app">Golf Stats</a>
        </div>

    </div>

    <script src="<?php echo $jsPath; ?>"></script>
</body>

</html>

<?php
// Close database connection
$conn->close();