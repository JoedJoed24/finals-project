<?php
include 'db.php';

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $hashed_password = $user['password'];
        if (password_verify($password, $hashed_password)) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_id'] = $user['id'];
            header("Location: home.php");
            exit();
        } else {
            $error_message = "Invalid password!";
        }
    } else {
        $error_message = "No user found with that username!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <style>
* {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f9;
        background-image: url('https://as1.ftcdn.net/v2/jpg/05/69/77/46/1000_F_569774614_WPzqSyc2eXAlaNF2W1IFa7H62ezbBeNw.jpg'); 
        background-size: cover;  
        background-position: center center;  
        background-repeat: no-repeat; 
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        width: 100%;
        max-width: 400px;
        background: rgba(255, 255, 255, 0.7); 
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        padding: 20px;
    }

    .form-container {
        margin: 20px 0;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: black;
    }

    .input-group {
        position: relative;
        margin-bottom: 20px;
    }

    .input-group .icon {
        position: absolute;
        top: 50%;
        left: 10px;
        transform: translateY(-50%);
        font-size: 18px;
        color: #555;
    }

    .input-group input {
        width: 100%;
        padding: 10px 10px 10px 40px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    .input-group input:hover {
        border-color: #007bff; 
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.3); 
    }

    .input-group input:focus {
        border-color: #007bff; 
        outline: none;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .btn {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn:hover {
        background-color: #0056b3;
        transform: scale(1.05); 
    }

    .btn:active {
        transform: scale(0.98);  
        background-color: #004494;
    }

    .btn:focus {
        outline: none;
        box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.5); 
    }

    p {
        text-align: center;
        font-size: 14px;
        color: black;
    }

    p a {
        color: red;
        text-decoration: none;
    }

    p a:hover {
        text-decoration: underline;
    }

    .error-message {
        text-align: center;
        color: white; 
        background-color: rgba(244, 67, 54, 0.8); /* Transparent background */
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 20px;
        font-size: 16px;
    }
    </style>

    <div class="container">
        <?php if (!empty($error_message)): ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <div class="form-container" id="login">
            <h2>Login</h2>
            <form action="login.php" method="post">
                <div class="input-group">
                    <i class="fas fa-user icon"></i>
                    <input type="text" name="username" placeholder="Username" required>
                </div>
            
                <div class="input-group">
                    <i class="fas fa-lock icon"></i>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn">Login</button>
                <p>Don't have an account? <a href="register.php">Register here</a></p>
            </form>
        </div>
    </div>
</body>
</html>
