<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #000a1f;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Verdana, sans-serif;
            overflow-x: hidden; 
            scroll-behavior: smooth; 
        }
        nav {
            width: 100%;
            background-color: #333;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }
        nav .logo {
            color: #FFFF00;
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
        }
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        nav ul li {
            margin: 0 15px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
        }
        nav ul li a:hover {
            color: #FFFF00;
        }
        .menu-icon {
            display: none;
            color: white;
            font-size: 30px;
            cursor: pointer;
        }
        @media (max-width: 768px) {
            nav ul {
                display: none;
                flex-direction: column;
                background-color: #333;
                position: absolute;
                top: 50px;
                left: 0;
                width: 100%;
                text-align: center;
            }
            nav ul.show {
                display: flex;
            }
            .menu-icon {
                display: block;
            }
        }
        .container {
            margin-top: 80px; 
            width: 80%;
            max-width: 1200px;
            display: flex;
            justify-content: center;
            gap: 20px; 
            padding: 20px;
            flex-wrap: wrap;
        }
        .team-member {
            position: relative;
            width: 20%; 
            height: 500px; 
            transition: width 0.5s ease-in-out;
            overflow: hidden;
            border-radius: 10px;
            cursor: pointer;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); 
        }
        .team-member img {
            width: 100%;
            height: 100%; 
            object-fit: cover;
            border-radius: 10px;
            transition: filter 0.5s ease-in-out, transform 0.5s ease-in-out;
        }
        .team-member:hover {
            width: 30%; 
        }
        .team-member:hover img {
            filter: blur(3px); 
            transform: scale(1.1); 
        }
        .info-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 15px;
            text-align: center;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
            border-radius: 10px;
        }
        .team-member:hover .info-overlay {
            opacity: 1;
        }
        .info-overlay h3 {
            margin: 0 0 10px;
        }
        .info-overlay p {
            margin: 5px 0;
            font-size: 14px;
        }
        .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(255, 0, 150, 0.7), rgba(0, 204, 255, 0.7));
            z-index: -1; 
            opacity: 0.3;
        }
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                height: auto;
            }
            .team-member {
                width: 60%; 
                height: 250px; 
                margin-bottom: 20px; 
            }
            .team-member:hover {
                width: 80%; 
            }
        }
    </style>
</head>
<body>

    <nav>
        <a href="#" class="logo">The Kulelat Team</a>
        <ul id="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="teashop\shop.php">Shop</a></li>
            <li><a href="#team">Team</a></li>
        </ul>
        <div class="menu-icon" id="menu-icon">
            <i class='bx bx-menu'></i>
        </div>
    </nav>

    <div class="container">
        <div class="team-member">
            <a href="joseph.php">
                <img src="tang.jpg" alt="Dan">
                <div class="info-overlay">
                    <h3>Dan Joseph</h3>
                    <p>Role: Developer</p>
                    <p>Specializes in web development and UX design.</p>
                </div>
            </a>
        </div>
        <div class="team-member">
            <a href="gab.php">
                <img src="iyan.jpg" alt="Ian">
                <div class="info-overlay">
                    <h3>Ian Gabriel</h3>
                    <p>Role: Designer</p>
                    <p>Expert in graphic design and brand identity.</p>
                </div>
            </a>
        </div>
        <div class="team-member">
            <a href="joed.php">
                <img src="bar.jpg" alt="Tristan">
                <div class="info-overlay">
                    <h3>Tristan Joed</h3>
                    <p>Role: Project Manager</p>
                    <p>Ensures the team stays on track and meets deadlines.</p>
                </div>
            </a>
        </div>
        <div class="team-member">
            <a href="rel.php">
                <img src="rel.jpg" alt="Jerrel">
                <div class="info-overlay">
                    <h3>Jerrel</h3>
                    <p>Role: Content Creator</p>
                    <p>Handles content creation and social media strategy.</p>
                </div>
            </a>
        </div>
    </div>

    <script>
        const menuIcon = document.getElementById('menu-icon');
        const navLinks = document.getElementById('nav-links');

        menuIcon.addEventListener('click', () => {
            navLinks.classList.toggle('show');
        });
    </script>
</body>
</html>
