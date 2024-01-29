<?php
    include_once '../config.php';
    include_once $connPath;

    // Start the session
    session_start(); 

    $error = '';
    // Process sign up form data
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $retype_password = $_POST['retype_password'];

        // Basic password validation
        if ($password !== $retype_password) {
            $error = "Passwords do not match. Please try again.";
        } else {
            // Query the database to check if the email or username is already taken
            $query = "SELECT * FROM users WHERE email = '$email' OR username = '$username'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                $error = "Email or username is already taken. Please choose another one.";
            } else {
                // Insert new user into the database
                $query = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$password')";
                if (mysqli_query($conn, $query)) {
                    header('Location: ' . $loginPath);
                    exit;
                } else {
                    $error = "Error: " . mysqli_error($conn);
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign Up</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo $cssPath; ?>">
    <link rel="icon" href="<?php echo $websiteIcon; ?>">
</head>

<body>
    <div class="container">
        <h1>SIGN UP</h1>
        <form action="signup.php" method="post">
            <div>
                <label for="username">username</label>
                <input class="textbox" type="text" name="username" required>
            </div>
            <div>
                <label for="email">email</label>
                <input class="textbox" type="email" name="email" required>
            </div>
            <div>
                <label for="password">password</label>
                <input class="textbox" type="password" name="password" required>
            </div>
            <div>
                <label for="retype_password">re-type password</label>
                <input class="textbox" type="password" name="retype_password" required>
            </div>
            <?php if ($error): ?>
                <p class="error">
                    <?php echo $error; ?>
                </p>
            <?php endif; ?>
            <input class="button" type="submit" name="submitBtn" value="submit">
            <label for="submitBtn">already have an account? <a href="<?php echo $loginPath; ?>">Login</a></label>
        </form>
    </div>

    <script src="<?php echo $jsPath; ?>"></script>
</body>

</html>

<?php
// Close database connection
$conn->close();