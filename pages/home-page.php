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
    <nav id="nav-bar">
        <div id="menu-icon">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
        <a href="<?php echo $homePath; ?>">
            <img id="home-icon" src="<?php echo $homeIcon; ?>" alt="Home Icon">
        </a>
    </nav>
    
    <div id="nav-menu">
        <?php
            if (!isset($_SESSION['userid'])) {
                echo "<a href=" . $loginPath . " class='button' id='login'>Login</a>";
            } else {
                echo "<a href=" . $profilePath . " class='button'>Profile</a>";
                echo "<a href=" . $logoutPath . " class='button' id='logout'>Logout</a>";
            }
        ?> 
    </div>

    <div class="default-container wide-container" id="home-container">
        <div class="container-header">
             <h1>Dashboard</h1>
            <?php 
                if (isset($_SESSION['userid'])) {
                    echo "<h2>Welcome, " . $username . "</h2>";
                } else {
                    echo "<a href=" . $loginPath . " class='button' id='login'>Login</a>";
                }
            ?>
        </div>

        <div class="home-block">
            <a href="<?php echo $listSelectorPath; ?>" class="button app">To-Do List</a>
            <a href="<?php echo $golfStatsPath; ?>" class="button app">Golf Stats</a>
            <a href="<?php echo $resumePath; ?>" class="button app">Resume (old)</a>
        </div>
    </div>

    <script src="<?php echo $jsPath; ?>"></script>
</body>

</html>

<?php
// Close database connection
$conn->close();