<?php
    include_once '../config.php';
    include_once $connPath;
    
    // Start the session
    session_start();

    // Set userid to 0 for public list
    $publicid = 0;

    // Logic for submit list item button
    if (isset($_POST['submitBtn']) && $_POST['randcheck'] == $_SESSION['rand']) {
        $message_text = $_POST['message_text'];

        $sql = "INSERT INTO todo (userid, message_text)
        VALUES ('$publicid','$message_text');";

        if ($conn->query($sql) === FALSE) {
            echo "Error: " . $sql . "<br>";
        }
        
    }

    // Logic for delete row button
    if (isset($_POST['delete_row'])) {
        $todoid = $_POST['todoid'];
        $delete_sql = "DELETE FROM todo WHERE todoid = '$todoid';";

        if ($conn->query($delete_sql) === FALSE) {
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

    <nav id="navbar">
        <div id="menu-icon">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
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
    </nav>

    <div id="wide_container" class="container">
        <h1>Public To-Do List</h1>

        <div class="default">
            <form action="" method="POST" name="delete_form">

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
                                echo "<td><input class='delete_button' type='submit' name='delete_row' value='X' onclick=deleteRow(" . $row["todoid"] . ")></td>";
                                echo "</tr>";
                            }
                        }
                    ?>
                </table>
                <input type="hidden" name="todoid" value="">
            </form>
        </div>

        <form action="" method="POST" name="todoForm" id="todoForm">

            <?php
                $rand = rand();
                $_SESSION['rand'] = $rand;
            ?>
            <input type="hidden" value="<?php echo $rand; ?>" name="randcheck">

            <div>
                <input class="textbox" type="text" name="message_text" required>
            </div>
            <input class="button" type="submit" name="submitBtn" value="Add">
        </form>
    </div>

    <script src="<?php echo $jsPath; ?>"></script>
</body>

</html>

<?php
// Close database connection
$conn->close();
