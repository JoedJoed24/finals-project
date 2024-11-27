<?php
include 'db.php';

$username = '';
$successMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Username or email already exists!";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
        if ($conn->query($sql) === TRUE) {
            $successMessage = "Registration successful! You can now <a href='login.php'>login</a>.";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
            flex-direction: column;
        }

        .success-message, .user-info {
            position: fixed;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgba(0, 123, 255, 0.8);
            color: white;
            padding: 10px;
            border-radius: 5px;
            z-index: 1000;
            font-size: 16px;
            text-align: center;
        }
        .form-container {
            margin: 20px 0;
            background: rgba(255, 255, 255, 0.7);
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding: 20px;
            width: 100%;
            max-width: 400px;
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
            color: red;
        }

        p a {
            color: blacks;
            text-decoration: none;
        }

        p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <?php if ($successMessage): ?>
        <div class="success-message">
            <?php echo $successMessage; ?>
        </div>
    <?php endif; ?>
    <div class="form-container" id="register">
        <h2>Register</h2>
        <form action="register.php" method="post">
            <div class="input-group">
                <i class="fas fa-user icon"></i>
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input-group">
                <i class="fas fa-envelope icon"></i>
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <i class="fas fa-lock icon"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn">Register</button>
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </form>
    </div>

</body>
</html>
