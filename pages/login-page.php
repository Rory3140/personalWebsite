<?php
    include_once '../config.php';
    include_once $connPath;

    // Start the session
    session_start(); 

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
            header('Location: ' . $homePath);
            exit;
        } else {
            $error = "Invalid credentials. Please try again.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo $cssPath; ?>">
    <link rel="icon" href="<?php echo $websiteIcon; ?>">
</head>

<body>
    <div class="container">
        <h1>LOGIN</h1>
        <form action="" method="post" name="statsForm">
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
            <label for="submitBtn">don't have an account? <a href="<?php echo $signupPath; ?>">Sign Up</a></label>
        </form>
    </div>

    <script src="<?php echo $jsPath; ?>"></script>
</body>

</html>

<?php
// Close database connection
$conn->close();