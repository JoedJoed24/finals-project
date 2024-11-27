<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delicious Recipes</title>
    <link rel="icon" href="images/logo.png" type="image/png">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-image: url('https://png.pngtree.com/thumb_back/fh260/back_our/20190620/ourmid/pngtree-simple-food-delivery-meal-fashion-poster-background-yellow-back-image_158378.jpg'); 
            background-size: cover; 
            background-position: center center; 
            background-attachment: fixed; 
            color: #333;
            line-height: 1.6;
            overflow-x: hidden;
        }

        .container {
            width: 90%;
            margin: 0 auto;
        }

        header {
            background: rgba(0, 0, 0, 0.6); 
            color: #fff;
            padding: 20px 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        header .logo {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        header .logo img {
            width: 50px;
            margin-right: 10px;
        }

        header h1 {
            font-size: 2rem;
            font-weight: 600;
            letter-spacing: 1px;
            margin: 0;
        }

        header nav ul {
            list-style-type: none;
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        header nav ul li {
            margin-left: 30px;
        }

        header nav ul li a {
            text-decoration: none;
            color: #fff;
            font-size: 1rem;
            font-weight: 500;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        header nav ul li a:hover {
            color: #f39c12;
            transform: translateY(-3px);
        }

        .recipes {
            background-color: rgba(255, 255, 255, 0.8); 
            padding: 60px 0;
            text-align: center;
        }

        .recipes h2 {
            font-size: 2.5rem;
            font-weight: 600;
            margin-bottom: 40px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .recipe-cards {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 30px;
            margin-top: 30px;
        }

        .recipe-card {
            background: #f9f9f9;
            width: 30%;
            margin-bottom: 30px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .recipe-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .recipe-card h3 {
            font-size: 1.8rem;
            font-weight: 600;
            margin: 20px 0;
            color: #333;
        }

        .recipe-card p {
            padding: 0 20px;
            font-size: 1rem;
            color: #555;
            margin-bottom: 20px;
        }

        .recipe-card .btn {
            background: #f39c12;
            color: #fff;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1.1rem;
            display: inline-block;
            margin-bottom: 20px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .recipe-card .btn:hover {
            background: #e67e22;
            transform: scale(1.05);
        }

        .recipe-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .recipe-card:hover img {
            transform: scale(1.05);
        }

        footer {
            background: rgba(0, 0, 0, 0.6);
            color: #fff;
            padding: 40px 0;
            text-align: center;
            position: relative;
        }

        footer .footer-content {
            z-index: 2;
        }

        footer a {
            color: #f39c12;
            text-decoration: none;
            font-weight: 500;
        }

        footer a:hover {
            color: #e67e22;
        }

        footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }
    </style>
</head>
<body>
<header>
    <div class="container">
        <div class="logo">
            <img src="https://as1.ftcdn.net/v2/jpg/00/93/45/70/1000_F_93457089_dHTmgrVqsaZ0S5svrDThnFIEPT0iOhVs.jpg" alt="Delicious Recipes Logo">
            <h1>Delicious Recipes</h1>
        </div>
        <nav>
            <ul>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </div>
</header>

<section id="recipes" class="recipes">
    <div class="container">
        <h2>Our Favorite Recipes</h2>
                <div class="welcome-message">
            Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>! Enjoy exploring our delicious recipes.
        </div>

        <div class="recipe-cards">
            <div class="recipe-card">
                <img src="https://www.allrecipes.com/thmb/Y7ftij8uq7sM2VpxGt-RHZg3yaA=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/11973-spaghetti-carbonara-mfs-042-21d5decdffde4a1faa94a21725ce9cc3.jpg" alt="Spaghetti Carbonara">
                <h3>Spaghetti Carbonara</h3>
                <p>A classic Italian pasta dish with creamy egg sauce, pancetta, and Parmesan cheese.</p>
                <a href="recipes.html" class="btn">Read More</a>
            </div>
            <div class="recipe-card">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR0lAG2h4vq5pLgte3cTeO8z5r7U0rxDR6Fzg&s" alt="Chicken Curry">
                <h3>Chicken Curry</h3>
                <p>A fragrant and spicy chicken curry with coconut milk and exotic spices.</p>
                <a href="recipes.html" class="btn">Read More</a>
            </div>
            <div class="recipe-card">
                <img src="https://hips.hearstapps.com/hmg-prod/images/greek-salad-index-642f292397bbf.jpg?crop=0.888888888888889xw:1xh;center,top&resize=1200:*" alt="Greek Salad">
                <h3>Greek Salad</h3>
                <p>A refreshing salad with tomatoes, cucumbers, olives, feta cheese, and olive oil.</p>
                <a href="recipes.html" class="btn">Read More</a>
            </div>
        </div>
    </div>
</section>

<footer id="contact">
    <div class="container">
        <div class="footer-content">
            <p>&copy; 2024 Delicious Recipes. All rights reserved.</p>
            <p>Contact us at: <a href="https://www.facebook.com/tristanjoed.abar.5">Tristan Joed Abar</a></p>
        </div>
    </div>
</footer>

</body>
</html>
