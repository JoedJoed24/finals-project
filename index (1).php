<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="home.css">
    <title>Our Team</title>
</head>
<body>
<nav>
    <a href="#" class="logo">The Kulelat Team</a>
    <ul id="nav-links">
        <li><a href="team.php">Team</a></li>
        <li><a href="teashop\shop.php">Shop</a></li>
        <li><a href="#" id="logout">Logout</a></li>
    </ul>
    <div class="menu-icon" id="menu-icon">
        <i class='bx bx-menu'></i>
    </div>
</nav>


    <header>
        <h1>Meet Our Team</h1>
    </header>

    <div class="container">
        <div class="team-member" onclick="toggleInfo(this)">
            <img src="Tristan.jpg" alt="Tristan">
            <h3>Tristan Joed Abar</h3>
            <p style="display: none;">Nickname: Joed</p>
            <p style="display: none;">Birthdate: Dec.24,2002</p>
            <p style="display: none;">Age: 21</p>
            <p style="display: none;">Address: Paranaque City</p>
            <div class="container">
                <div class="border-box" style="display: none;">
                    <p>"Kung d ako ang para sa kanya,kawawa naman sya"</p>
                </div>
                <div class="social-links" style="display: none;">
                    <a href="https://www.facebook.com/tristanjoed.abar.5" target="_blank"><i class='bx bxl-facebook-circle'></i></a>
                    <a href="https://www.instagram.com/tristan" target="_blank"><i class='bx bxl-instagram'></i></a>
                </div>
            </div>
        </div>
        <div class="team-member" onclick="toggleInfo(this)">
            <img src="Dan.jpg" alt="Dan Joseph">
            <h3>Dan Joseph Divina</h3>
            <p style="display: none;">Nickname: Ej</p>
            <p style="display: none;">Birthdate: November 14,2001</p>
            <p style="display: none;">Age: 22</p>
            <p style="display: none;">Address: Tunasan, Muntinlupa</p>
            <div class="container">
                <div class="border-box" style="display: none;">
                    <p>"Lagi mong tatandaan na kapag nag iisa ka, wala kang kasama"</p>
                    <div class="social-links" style="display: none;">
                        <a href="https://www.facebook.com/danjoseph.divina.3" target="_blank"><i class='bx bxl-facebook-circle'></i></a>
                        <a href="https://www.instagram.com/cuya_dan?igsh=MWs0dGJ4bmhzcngwNA==" target="_blank"><i class='bx bxl-instagram'></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="team-member" onclick="toggleInfo(this)">
            <img src="ian.jpg" alt="Ian Gabriel">
            <h3>Ian Gabriel Magpantay</h3>
            <p style="display: none;">Nickname: Gabo</p>
            <p style="display: none;">Birthdate: July 25,2003</p>
            <p style="display: none;">Age: 21</p>
            <p style="display: none;">Address: Poblacion,Muntinlupa</p>
            <div class="container">
                <div class="border-box" style="display: none;">
                    <p>"Don't make the same mistake twice,marami pang kasalanan try mo naman"</p>
                    <div class="social-links" style="display: none;">
                        <a href="https://www.facebook.com/profile.php?id=100072862945099" target="_blank"><i class='bx bxl-facebook-circle'></i></a>
                        <a href="https://www.instagram.com/imnotiyay/profilecard/?igsh=bW5sejZ0bDVqZnoz" target="_blank"><i class='bx bxl-instagram'></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="team-member" onclick="toggleInfo(this)">
            <img src="Jer.jpg" alt="Jerrel">
            <h3>Jerrel Perez</h3>
            <p style="display: none;">Nickname: Rel</p>
            <p style="display: none;">Birthdate: December 16,2003</p>
            <p style="display: none;">Age: 21</p>
            <p style="display: none;">Address: Poblacion, Muntinlupa</p>
            <div class="container">
                <div class="border-box" style="display: none;">
                    <p>"Kung ang pansit ay pampahaba ng buhay, ba't d to nirereseta ng doktor"</p>
                    <div class="social-links" style="display: none;">
                        <a href="https://www.facebook.com/perez.jerrel.31" target="_blank"><i class='bx bxl-facebook-circle'></i></a>
                        <a href="https://www.instagram.com/kya_jrrl?igsh=eHAzaHp5OG05d3Uz" target="_blank"><i class='bx bxl-instagram'></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="bottom-bar">
            <p>&copy; 2024 The Kulelat Team. All Rights Reserved.</p>
        </div>
    </footer>

    <script>
        document.getElementById("menu-icon").addEventListener("click", function() {
        const navLinks = document.getElementById("nav-links");
        navLinks.classList.toggle("show");
        });

        function toggleInfo(element) {
            const allInfoElements = document.querySelectorAll('p, .border-box, .social-links');

            const infoElements = element.querySelectorAll('p, .border-box, .social-links');
            const isOpen = Array.from(infoElements).some(info => info.style.display === 'block');

            allInfoElements.forEach(info => {
                info.style.display = 'none';
            });

            if (!isOpen) {
                infoElements.forEach(info => {
                    info.style.display = 'block';
                });
            }
        }
        const logoutButton = document.getElementById("logout");

        logoutButton.addEventListener("click", function(event) {
            event.preventDefault();
            const isConfirmed = window.confirm("Are you sure you want to logout?");
            
            if (isConfirmed) {
                window.location.href = "login.php"; 
            }
        });
    </script>
</body>
</html>