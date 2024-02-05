<?php
    include_once '../config.php';
    include_once $connPath;
    
    // Start the session
    session_start();

    // Set userid to 0 for public list
    $publicid = 0;

    // Logic for submit list item button
    if (isset($_POST['submit-button']) && $_POST['rand-check'] == $_SESSION['rand']) {
        $messageText = $_POST['message-text'];

        $sql = "INSERT INTO todo (userid, message_text)
        VALUES ('$publicid','$messageText');";

        if ($conn->query($sql) === FALSE) {
            echo "Error: " . $sql . "<br>";
        }
        
    }

    // Logic for delete row button
    if (isset($_POST['delete-row'])) {
        $todoid = $_POST['todo-id'];
        $deleteSQL = "DELETE FROM todo WHERE todoid = '$todoid';";

        if ($conn->query($deleteSQL) === FALSE) {
            echo "Error deleting record: " . $conn->error;
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Public Todo List</title>
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
        <a href="<?php echo $listSelectorPath; ?>" class="button">Select List</a>
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
            <h1>Shared To-Do List</h1>
        </div>

        <div>
            <form action="" method="POST" name="delete-form">

                <table>
                    <?php
                        $sql = "SELECT message_text, todoid
                        FROM todo t
                        WHERE t.userid = '$publicid'
                        ORDER BY t.message_date ASC;";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["message_text"] . "</td>";
                                echo "<td><input class='delete-button' type='submit' name='delete-row' value='X' onclick=deleteRow(" . $row["todoid"] . ")></td>";
                                echo "</tr>";
                            }
                        }
                    ?>
                </table>
                <input type="hidden" name="todo-id" value="">
            </form>
        </div>

        <form action="" method="POST" name="todo-form">

            <?php
                $rand = rand();
                $_SESSION['rand'] = $rand;
            ?>
            <input type="hidden" value="<?php echo $rand; ?>" name="rand-check">

            <div>
                <input class="textbox" type="text" name="message-text" required>
            </div>
            <input class="button" type="submit" name="submit-button" value="Add">
        </form>
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
