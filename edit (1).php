<?php 
  session_start();
  include("config.php");

  if (isset($_SESSION['valid'])) {
    header("Location: home.php");
    exit();
  }

  $username = $email = $age = "";
  $message = "";

  if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $message = "<div class='message'><p>Invalid email format!</p></div>";
    } else {
      $id = $_SESSION['id'];

      $query = "UPDATE users SET Username = ?, Email = ?, Age = ? WHERE Id = ?";
      if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, "ssii", $username, $email, $age, $id);

        if (mysqli_stmt_execute($stmt)) {
          $message = "<div class='message'><p>Profile Updated!</p></div>";
          $_SESSION['username'] = $username;
          $_SESSION['email'] = $email;
          $_SESSION['age'] = $age;
        } else {
          $message = "<div class='message'><p>Failed to update profile. Please try again later.</p></div>";
        }

        mysqli_stmt_close($stmt);
      } else {
        $message = "<div class='message'><p>Error preparing query!</p></div>";
      }
    }
  }
  if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $squery = mysqli_query($conn, "SELECT * FROM users WHERE Id = $id");
    if ($result = mysqli_fetch_assoc($squery)) {
      $username = $result['Username'];
      $email = $result['Email'];
      $age = $result['Age'];
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Change Profile</title>
</head>
<body>
  <div class="nav">
    <div class="logo">
      <p><a href="home.php">Logo</a></p>
    </div>
    <div class="right-links">
      <a href="#">Change Profile</a>
      <a href="php/Logout.php"><button class="btn">Log Out</button></a>
    </div>
  </div>

  <div class="container">
    <div class="box form-box">
      <?php if ($message): ?>
        <?php echo $message; ?>
      <?php endif; ?>

      <header>Change Profile</header>
      <form action="" method="post">
        <div class="field input">
          <label for="username">Username</label>
          <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($username); ?>" autocomplete="off" required>
        </div>

        <div class="field input">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>" autocomplete="off" required>
        </div>

        <div class="field input">
          <label for="age">Age</label>
          <input type="number" name="age" id="age" value="<?php echo htmlspecialchars($age); ?>" autocomplete="off" required>
        </div>

        <div class="field">
          <input type="submit" class="btn" name="submit" value="Update Profile">
        </div>
      </form>
    </div>
  </div>
</body>
</html>
