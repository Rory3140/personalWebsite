<?php
include_once '../conn.php';
session_start(); // Start the session

$error = '';
// Process login form data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database to check if the provided credentials are valid
    $query = "SELECT userid, username FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Login successful, store userid in session and redirect to homepage.php
        $row = mysqli_fetch_assoc($result);
        $_SESSION['userid'] = $row['userid'];
        $_SESSION['username'] = $row['username'];
        header('Location: ../home.php');
        exit;
    } else {
        $error = "Invalid credentials. Please try again.";
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en" style>

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" href="../images/websiteIcon.ico">

</head>

<body>
    <div class="container">
        <h1>LOGIN</h1>
        <form action="login.php" method="post" name="statsForm">
            <div>
                <label for="username">username</label>
                <input class="textbox" type="text" name="username" required>
            </div>
            <div>
                <label for="password">password</label>
                <input class="textbox" type="password" name="password" required>
            </div>
            <?php if ($error): ?>
                <p class="error">
                    <?php echo $error; ?>
                </p>
            <?php endif; ?>
            <input class="button" type="submit" name="submitBtn" value="login">
            <label for="submitBtn">don't have an account? <a href="signup.php">Sign Up</a></label>
        </form>
    </div>

    <script src="../script.js"></script>
</body>

</html>