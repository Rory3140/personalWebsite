<?php
include_once '../conn.php';

// Start the session
session_start(); 

// Check if the user is logged in (userid is stored in the session)
if (!isset($_SESSION['userid'])) {
    // User is not logged in, redirect to the login page
    header('Location: ../loginPage/login.php');
    exit;
}

// Access the userid and username from the session
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];

if ($_SESSION['public_list'] == true) {
    $userid = 0;
}


if (isset($_POST['submitBtn']) && $_POST['randcheck'] == $_SESSION['rand']) {
    $message_text = $_POST['message_text'];

    $sql = "INSERT INTO todo (userid, message_text)
    VALUES ('$userid','$message_text');";

    if ($conn->query($sql) === FALSE) {
        echo "Error: " . $sql . "<br>";
    }
    
}
if (isset($_POST['delete_row'])) {
    $todoid = $_POST['todoid'];
    $delete_sql = "DELETE FROM todo WHERE todoid = '$todoid';";

    if ($conn->query($delete_sql) === FALSE) {
        echo "Error deleting record: " . $conn->error;
    }
    
}

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
        <h1>ToDo List</h1>

        <div class="default">
            <form action="" method="POST" name="delete_form">

                <table>
                    <?php
                    $sql = "SELECT message_text, todoid
                    FROM todo t
                    JOIN users u ON t.userid = u.userid
                    WHERE u.userid = '$userid'
                    ORDER BY t.message_date ASC;";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr><td>" . $row["message_text"] . "</td>";
                            echo "<td><input type='hidden' name='todoid' value='" . $row["todoid"] . "'>
                                    <input class='delete_button' type='submit' name='delete_row' value='X'></td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </table>
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

    <script src="../script.js"></script>

</body>

</html>

<?php
$conn->close();
?>
