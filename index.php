<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SaudiCulture - Home</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700&family=Almarai:wght@300;400;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="stylesheet" href="CSS/auth.css">
    
    <script src="JS/script.js" defer></script>
</head>

<body>
    <header id="mainHeader">
        <div class="logo">
            <img src="images/Logo.png" alt="SaudiCulture Logo">
        </div>

       <nav>
    <a href="index.php">Home</a>  
        <a href="history.php">History</a>
    <a href="traditions.php">Traditions</a>
    <a href="food.php">Food</a>       
    <a href="arts.php">Arts</a>
    <a href="culture_events.php">Cultural events</a>
    <a href="quiz.php">Quiz</a>
    <a href="browse_ar.php">dictionary</a>
    <a href="Contact.php">Contact us</a>

    <button class="nav-search-btn" onclick="toggleTopSearch()">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <circle cx="11" cy="11" r="7" stroke="#0e6b4e" stroke-width="2"/>
            <line x1="16.5" y1="16.5" x2="22" y2="22"
                  stroke="#0e6b4e" stroke-width="2"
                  stroke-linecap="round"/>
        </svg>
    </button>

    <div class="top-search-bar" id="topSearchBar">
        <input type="text" placeholder="Search in the web. . ." />
    </div>

    <div class="right-buttons" style="display: flex; align-items: center; gap: 10px;">
        
        <?php if(isset($_SESSION['user_id'])): ?>
            <a href="profile.php" class="profile-square" title="الملف الشخصي" style="display: inline-flex;">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="8" r="4"></circle>
                    <path d="M4 20c0-4 4-6 8-6s8 2 8 6"></path>
                </svg>
            </a>
        <?php else: ?>
            <button class="login-btn" onclick="window.location.href='login.php'">Login</button>
            <button class="signup-btn" onclick="window.location.href='signup.php'">Sign Up</button>
        <?php endif; ?>

        <button class="lang-btn" onclick="window.location.href='arabic.php'">AR</button>
    </div>
</nav>

    </header>

    <section class="main-visual-section">
        <video autoplay muted loop playsinline class="bg-video">
            <source src="videos/Journey through time.mov" type="video/mp4">
        </video>

        <div class="main-visual-content">
            <h1>Mawrooth</h1>
            <p>AN INTERACTIVE WEBSITE THAT HIGHLIGHTS SAUDI CULTURE</p>
            <p>START YOUR JOURNEY NOW....</p>

            <div class="action-buttons">
                <input type="button" value="Explore Culture" onclick="window.location.href='history.html'">
                <input type="button" value="Start Quiz" onclick="window.location.href='quiz.php'">
            </div>
        </div>
    </section>

    <h2 class="section-title">About Mawrooth</h2>
    <section class="about-section">
        <p>
            “Mawrooth” is a digital cultural platform designed to highlight the richness of Saudi heritage—
            from history and traditions to food, arts, and cultural events. Our goal is to present authentic,
            accessible, and enjoyable content that helps visitors understand the essence of Saudi identity
            through a modern, engaging experience.
        </p>
    </section>

    <h2 class="section-title">Poetic Echoes of Saudi Heritage</h2>
    <section class="poetry-section">
        <div class="poetry-list">
            <article class="poetry-card">
                <div class="poetry-photo">
                    <img src="images/خالد الفيصل.jpeg" alt="Prince Khaled Al-Faisal">
                </div>
                <div class="poetry-content">
                    <h3 class="poet-name">Prince Khaled Al-Faisal</h3>
                    <p class="poet-origin">Poet & Governor of Makkah Region</p>
                    <blockquote class="poet-quote">
                        <p>
                            أنا من هالأرض… أرض الخير<br>
                            أرض أجدادي… وتراثي… لي فيها جذور ما تموت
                        </p>
                    </blockquote>
                </div>
            </article>

            <article class="poetry-card">
                <div class="poetry-photo">
                    <img src="images/غازي القصيبي.jpeg" alt="Ghazi Al-Gosaibi">
                </div>
                <div class="poetry-content">
                    <h3 class="poet-name">Ghazi Al-Gosaibi</h3>
                    <p class="poet-origin">Renowned Saudi Poet, Minister & Diplomat</p>
                    <blockquote class="poet-quote">
                        <p>
                            يا وطناً شامخاً تسمو المآثرُ فيه<br>
                            ما زلتَ في مهجتي عشقاً أُرتِّلهُ
                        </p>
                    </blockquote>
                </div>
            </article>

            <article class="poetry-card">
                <div class="poetry-photo">
                    <img src="images/طلال الرشيد.jpeg" alt="Talal Al-Rasheed">
                </div>
                <div class="poetry-content">
                    <h3 class="poet-name">Talal Al-Rasheed</h3>
                    <p class="poet-origin">Saudi Poet & Writer</p>
                    <blockquote class="poet-quote">
                        <p>
                            السعودية… يا دارٍ لنا<br>
                            فيك المحبة… والأمان… والعز والسلاطين
                        </p>
                    </blockquote>
                </div>
            </article>
        </div>
    </section>

    <h2 class="section-title">Featured Sections</h2>
    <div class="cards">
        <div class="card">
            <img src="images/8-chicken-kabsa-web.jpg" alt="Traditional food">
            <h3>Traditional Food</h3>
            <a href="food.html" class="button">View More</a>
        </div>

        <div class="card">
            <img src="images/tradtion.jpg" alt="Cultural Traditions">
            <h3>Cultural Traditions</h3>
            <a href="traditions.html" class="button">View More</a>
        </div>

        <div class="card">
            <img src="images/arda.jpg" alt="Traditional arts">
            <h3>Traditional Arts</h3>
            <a href="arts.html" class="button">View More</a>
        </div>

        <div class="card">
            <img src="images/madain salah.jpg" alt="History and civilizations">
            <h3>Ancient Civilizations</h3>
            <a href="history.html" class="button">View More</a>
        </div>
    </div>

    <section class="regions-journey">
        <h2 class="section-title">Journey Through Saudi Regions</h2>
        <p class="regions-subtitle">
            Explore the five main regions of Saudi Arabia and discover the cultural landmarks and unique heritage of each area.
        </p>

        <div class="regions-grid">
            <article class="region-card">
                <img src="images/west.jpg" alt="Western Region">
                <h3>Western Region</h3>
                <p>Home to the Two Holy Mosques, historic souks, and Old Jeddah architecture.</p>
            </article>

            <article class="region-card">
                <img src="images/middle.webp" alt="Central Region">
                <h3>Central Region</h3>
                <p>The heart of the Kingdom, featuring Diriyah, Al-Masmak Fort, and Najdi heritage.</p>
            </article>

            <article class="region-card">
                <img src="images/east.webp" alt="Eastern Region">
                <h3>Eastern Region</h3>
                <p>A coastal region rich in traditional markets and maritime history.</p>
            </article>

            <article class="region-card">
                <img src="images/south.jpg" alt="Southern Region">
                <h3>Southern Region</h3>
                <p>Known for its mountains, Rijal Almaa village, and colorful cultural attire.</p>
            </article>

            <article class="region-card">
                <img src="images/north.jpg" alt="Northern Region">
                <h3>Northern Region</h3>
                <p>Famous for the "Dahha" dance, Bedouin heritage, and ancient rock inscriptions.</p>
            </article>
        </div>
    </section>

    <h2 class="section-title">Discover more about Saudi Arabia</h2>
    <div class="mini-events-section">
        <div>
            <p>Explore the most prominent cultural events across the Kingdom of Saudi Arabia.</p>
            <button onclick="window.location.href='index.html'">View All Events</button>
        </div>
        <div class="mini-events">
            <img src="images/فعاليات.jpg" alt="Cultural events">
        </div>
    </div>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-about">
                <img src="images/Logo.png" alt="SaudiCulture Logo" class="footer-logo">
                <p>
                    <strong>SaudiCulture</strong> is a digital window into the rich history,
                    heritage, and cultural diversity of Saudi Arabia.
                </p>
            </div>

            <div class="footer-links">
                <h4>Quick Links</h4>
                <a href="index.php">Home</a>
                <a href="history.php">History</a>
                <a href="traditions.php">Traditions</a>
                <a href="food.php">Food</a>
                <a href="arts.php">Arts</a>
                <a href="contact.php">Contact Us</a>
            </div>

            <div class="footer-contact">
                <h4>Contact</h4>
                <p>📞 +966554731708</p>
                <p>📧 mawrooth@gmail.com</p>
                <p>📍 Makkah, Saudi Arabia</p>
            </div>
        </div>

        <div class="footer-bottom">
            <p>© 2025 Mawrooth – SaudiCulture Website. All rights reserved.</p>
        </div>
    </footer>
<script>
        window.addEventListener("scroll", () => {
            const header = document.getElementById("mainHeader");
            if (window.scrollY > 50) {
                // Solid background when scrolled
                header.classList.add("scrolled");
            } else {
                // Transparent over hero video at top
                header.classList.remove("scrolled");
            }
        });
    </script>

</body>
</html>