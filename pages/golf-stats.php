<?php
    include_once '../config.php';
    include_once $connPath;
    
    // Start the session
    session_start();

    // Check if the user is logged in (userid is stored in the session)
    if (!isset($_SESSION['userid'])) {
        // User is not logged in, redirect to the login page
        header('Location: ' . $loginPath);
        exit;
    }

    // Access the userid and username from the session
    $userid = $_SESSION['userid'];
    $username = $_SESSION['username'];

    $_SESSION['previousClub'] = "DRV";

    if (isset($_POST['submit-button']) && $_POST['rand-check'] == $_SESSION['rand']) {
        $club = $_POST['club'];
        $_SESSION['previousClub'] = $club;
        $distance = $_POST['distance'];

        $sql = "INSERT INTO shots (userid, club, distance)
        VALUES ('$userid','$club', '$distance');";

        if ($conn->query($sql) === FALSE) {
            echo "Error: " . $sql . "<br>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Golf Stats</title>
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
    
    <div class="default-container">
        <div class="container-header">
            <h1>Golf Stats</h1>
        </div>

        <form action="" method="POST" name="stats-form">
            <?php
                $rand = rand();
                $_SESSION['rand'] = $rand;
            ?>
            <input type="hidden" value="<?php echo $rand; ?>" name="rand-check" />

            <div class="default">
                <label for="club">Select Your Club: </label>
                <select name="club" class="textbox">
                    <option value="Driver" <?php if ($_SESSION['previousClub'] == 'Driver')
                        echo 'selected'; ?>>Driver
                    </option>
                    <option value="3 Wood" <?php if ($_SESSION['previousClub'] == '3 Wood')
                        echo 'selected'; ?>>3 Wood
                    </option>
                    <option value="5 Wood" <?php if ($_SESSION['previousClub'] == '5 Wood')
                        echo 'selected'; ?>>5 Wood
                    </option>
                    <option value="3 Iron" <?php if ($_SESSION['previousClub'] == '3 Iron')
                        echo 'selected'; ?>>3 Iron
                    </option>
                    <option value="4 Iron" <?php if ($_SESSION['previousClub'] == '4 Iron')
                        echo 'selected'; ?>>4 Iron
                    </option>
                    <option value="5 Iron" <?php if ($_SESSION['previousClub'] == '5 Iron')
                        echo 'selected'; ?>>5 Iron
                    </option>
                    <option value="6 Iron" <?php if ($_SESSION['previousClub'] == '6 Iron')
                        echo 'selected'; ?>>6 Iron
                    </option>
                    <option value="7 Iron" <?php if ($_SESSION['previousClub'] == '7 Iron')
                        echo 'selected'; ?>>7 Iron
                    </option>
                    <option value="8 Iron" <?php if ($_SESSION['previousClub'] == '8 Iron')
                        echo 'selected'; ?>>8 Iron
                    </option>
                    <option value="9 Iron" <?php if ($_SESSION['previousClub'] == '9 Iron')
                        echo 'selected'; ?>>9 Iron
                    </option>
                    <option value="Pitching Wedge" <?php if ($_SESSION['previousClub'] == 'Pitching Wedge')
                        echo 'selected'; ?>>Pitching Wedge
                    </option>
                    <option value="Sand Wedge" <?php if ($_SESSION['previousClub'] == 'Sand Wedge')
                        echo 'selected'; ?>>Sand Wedge
                    </option>
                    <option value="Putter" <?php if ($_SESSION['previousClub'] == 'Putter')
                        echo 'selected'; ?>>Putter
                    </option>
                </select>
            </div>
            <br>
            <div class="default">
                <label for="distance">Input Distince Hit: </label>
                <input type="number" class="textbox" min="0" max="999" step=".01" name="distance" required>
            </div>
            <div class="default">
                <input type="submit" class="button" name="submit-button" value="Add Shot">
            </div>
        </form>

        <div>
            <table>
                <tr>
                    <th>Club</th>
                    <th>Average Distance(yds)</th>
                </tr>
                <?php
                    $sql = "SELECT ad.club, ad.avg_distance
                    FROM average_distances ad
                    JOIN users u ON ad.userid = u.userid
                    WHERE u.userid = '$userid'
                    ORDER BY ad.avg_distance DESC;";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr><td>" . $row["club"] . "</td><td>" . $row["avg_distance"] . "</td></tr>";
                        }
                    }
                ?>
            </table>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Rory Wood</p>
        <p>Email: <a href="mailto:rorywood9@live.com">rorywood9@live.com</a></p>
        <p>Website: <a href="http://www.rorywood.co.uk">www.rorywood.co.uk</a></p>
    </footer>

    <script src="<?php echo $jsPath; ?>"></script>
</body>

</html>

<?php
// Close database connection
$conn->close();
