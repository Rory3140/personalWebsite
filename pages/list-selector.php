<?php
    include_once '../config.php';

    // Start the session
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Select List</title>
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
    </nav>

    <div id="nav-menu">
        <a href="<?php echo $homePath; ?>" class="button">Home</a>
        <?php
            if (!isset($_SESSION['userid'])) {
                echo "<a href=" . $loginPath . " class='button' id='login'>Login</a>";
            } else {
                echo "<a href=" . $profilePath . " class='button'>Profile</a>";
                echo "<a href=" . $logoutPath . " class='button' id='logout'>Logout</a>";
            }
        ?> 
    </div>

    <div class="default-container wide-container">
        <div class="container-header">
            <h1>Select List</h1>
        </div>
        <div>
            <a href="<?php echo $publicListPath; ?>" class="button" >Public List</a>
            <a href="<?php echo $personalListPath; ?>" class="button" >Personal List</a>
        </div>
    </div>

    <script src="<?php echo $jsPath; ?>"></script>
</body>

</html>

