<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>
<body>
     <div class="container"></div>
      <div class="box form-box">
        <?php 
          include("config.php");

          // Check if the form is submitted
          if (isset($_POST['submit'])) {
            // Get form input and sanitize
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);

            // Query the database to find the user (case insensitive email search)
            $result = mysqli_query($conn, "SELECT * FROM users WHERE LOWER(Email) = LOWER('$email')") or die("Select Error");

            // Fetch the user data from the result
            $row = mysqli_fetch_assoc($result);

            // If the user exists, verify the password
            if ($row) {
                if (password_verify($password, $row['Password'])) {
                    // Set session variables
                    $_SESSION['valid'] = $row['Email'];
                    $_SESSION['username'] = $row['Username'];
                    $_SESSION['age'] = $row['Age'];
                    $_SESSION['id'] = $row['Id'];

                    // Set cookies for persistent login (optional)
                    setcookie("user_email", $row['Email'], time() + (86400 * 30), "/");
                    setcookie("user_name", $row['Username'], time() + (86400 * 30), "/");

                    // Redirect to the home page
                    header("Location: index.php");
                    exit();
                } else {
                    // Incorrect password
                    echo "<div class='message'>
                            <p>Wrong Password</p>
                          </div> <br>";
                }
            } else {
                // No user found with that email
                echo "<div class='message'>
                        <p>User does not exist</p>
                      </div> <br>";
            }
          } 
        ?>  
        <header>Login</header>
        <form action="" method="post">
          <div class="field input">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" required>
          </div>

          <div class="field input">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
          </div>

          <div class="field">
            <input type="submit" class="btn" name="submit" value="Login">
          </div>

          <div class="links">
            Don't have an account? <a href="register.php">Sign Up Now</a>
          </div>

        </form>
      </div>
</body>
</html>

