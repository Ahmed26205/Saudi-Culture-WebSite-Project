<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>

<head>
    <!-- Character encoding to support all common characters -->
    <meta charset="UTF-8" />
    <!-- Viewport for responsive design on mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Text shown in the browser tab -->
    <title>SaudiCulture - Home</title>

    <!-- Google Fonts: Inter (body), Outfit (headings), Almarai (Arabic support) -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700&family=Almarai:wght@300;400;700&display=swap"
        rel="stylesheet">
        <!-- Swiper.js:
     Enables responsive sliders with autoplay, pagination, and navigation
-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>
    <!-- Main CSS file for styles -->
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="stylesheet" href="CSS/auth.css">
    <!-- Main JavaScript file for interactions (loaded after HTML) -->
    <script src="JS/script.js" defer></script>
    <link rel="icon" href="assets/images/Logo.png" sizes="32x32">
    <link rel="icon" type="image/png" href="assets/images/logo.png">
</head>


<body>
    <!-- Top header bar: logo + navigation menu -->
    <header id="mainHeader">
        <div class="logo">
            <img src="assets/images/Logo.png" alt="SaudiCulture" onclick="window.location.href='index.php'" />
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
            
<!-- Search (EN) -->
<div class="search-wrap">
  <button class="nav-search-btn" type="button" onclick="toggleTopSearch()" aria-label="Search">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
      xmlns="http://www.w3.org/2000/svg">
      <circle cx="11" cy="11" r="7" stroke="#0e6b4e" stroke-width="2"/>
      <line x1="16.5" y1="16.5" x2="22" y2="22"
        stroke="#0e6b4e" stroke-width="2" stroke-linecap="round"/>
    </svg>
  </button>

  <div class="top-search-bar" id="topSearchBar">
    <input id="siteSearchInput" type="text" placeholder="Search in the site..." autocomplete="off" />
    <div id="topSearchSuggestions" class="autocomplete" role="listbox"></div>
  </div>
</div>


         <?php if(isset($_SESSION['user_id'])): ?>
                <a href="profile.php" class="profile-square" title="Profile">
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
    </header>


    <!-- Main visual section: full-screen video hero -->
    <section class="main-visual-section">
        <!-- Background looping video -->
        <video autoplay muted loop playsinline class="bg-video">
            <source src="assets/videos/Journey through time.mp4" type="video/mp4">
        </video>

        <!-- Content overlay on top of the video -->
        <div class="main-visual-content">
            <!-- Main site title -->
            <h1>Mawrooth</h1>
            <!-- Short description line -->
            <p>AN INTERACTIVE WEBSITE THAT HIGHLIGHTS SAUDI CULTURE</p>
            <!-- Call to action line -->
            <p>START YOUR JOURNEY NOW....</p>

            <!-- Primary action buttons in hero -->
            <div class="action-buttons">
                <input type="button" value="Test your culture here" onclick="window.location.href='quiz.php'">
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
  <div class="swiper poets-swiper">
    <div class="swiper-wrapper">

        <!-- Khaled Al-Faisal -->
        <article class="poetry-card swiper-slide">
            <div class="poetry-photo">
                <img src="assets/images/خالد الفيصل.jpeg" alt="Prince Khaled Al-Faisal">
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

        <!-- Ghazi Al-Gosaibi -->
        <article class="poetry-card swiper-slide">
            <div class="poetry-photo">
                <img src="assets/images/غازي القصيبي.jpeg" alt="Ghazi Al-Gosaibi">
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

        <!-- Talal Al-Rasheed -->
        <article class="poetry-card swiper-slide">
            <div class="poetry-photo">
                <img src="assets/images/طلال الرشيد.jpeg" alt="Talal Al-Rasheed">
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
    <div class="swiper-pagination"></div>

    </div>
</section>


    <!-- Section title for the featured cards -->
    <h2 class="section-title">Featured Sections</h2>

    <!-- Grid of feature cards linking to main content areas -->
    <div class="cards">
        <!-- Card: Traditional Food -->
        <div class="card">
            <img src="assets/images/8-chicken-kabsa-web.jpg" alt="Traditional food">
            <h3>Traditional Food</h3>
            <a href="food.php" class="button">View More</a>
        </div>

        <!-- Card: Cultural Traditions -->
        <div class="card">
            <img src="assets/images/tradtion.jpg" alt="Cultural Traditions">
            <h3>Cultural Traditions</h3>
            <a href="traditions.php" class="button">View More</a>
        </div>

        <!-- Card: Traditional Arts -->
        <div class="card">
            <img src="assets/images/arda.jpg" alt="Traditional arts">
            <h3>Traditional Arts</h3>
            <a href="arts.php" class="button">View More</a>
        </div>

        <!-- Card: Ancient Civilizations -->
        <div class="card">
            <img src="assets/images/madain salah.jpg" alt="History and civilizations">
            <h3>Ancient Civilizations</h3>
            <a href="history.php" class="button">View More</a>
        </div>
    </div>


    <section class="regions-journey">
    <h2 class="section-title">Journey Through Saudi Regions</h2>
    <p class="regions-subtitle">
        Explore the five main regions of Saudi Arabia and discover the cultural landmarks and unique heritage of each area.
    </p>


<div class="swiper regions-swiper">
    <div class="swiper-wrapper">
        <!-- Western Region -->
        <article class="region-card swiper-slide">
            <img src="assets/images/west.jpg" alt="Western Region">
            <h3>Western Region</h3>
            <p>
                Home to the Two Holy Mosques, known for its historic souks, Hijazi folklore,
                and the unique architecture of Old Jeddah.
            </p>
        </article>

        <!-- Central Region -->
        <article class="region-card swiper-slide">
            <img src="assets/images/middle.webp" alt="Central Region">
            <h3>Central Region</h3>
            <p>
                The heart of the Kingdom, featuring Diriyah and Al-Masmak Fort, traditional Najdi attire,
                and the famous Saudi Ardah folk dance.
            </p>
        </article>

        <!-- Eastern Region -->
        <article class="region-card swiper-slide">
            <img src="assets/images/east.webp" alt="Eastern Region">
            <h3>Eastern Region</h3>
            <p>
                A coastal region rich in traditional markets, seafood cuisine,
                and heritage related to ancient maritime crafts.
            </p>
        </article>

        <!-- Southern Region -->
        <article class="region-card swiper-slide">
            <img src="assets/images/south.jpg" alt="Southern Region">
            <h3>Southern Region</h3>
            <p>
                Known for its mountains, traditional villages like Rijal Almaa,
                colorful cultural attire, and the famous southern “Khutwah” dance.
            </p>
        </article>

        <!-- Northern Region -->
        <article class="region-card swiper-slide">
            <img src="assets/images/north.jpg" alt="Northern Region">
            <h3>Northern Region</h3>
            <p>
                Famous for the traditional “Dahha” dance, Bedouin heritage,
                vast desert landscapes, and ancient rock inscriptions.
            </p>
        </article>
        </div>


          <div class="swiper-pagination"></div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>

    </div>
</section>




    <!-- Section title for events area -->
    <h2 class="section-title">Discover more about Saudi Arabia</h2>

    <!-- Mini events section: text + button + illustrative image -->
    <div class="mini-events-section">
        <!-- Text content and CTA button -->
        <div>
            <p>Explore the most prominent cultural events across the Kingdom of Saudi Arabia.</p>
            <button onclick="window.location.href='Clture_events.php'">view more</button>
        </div>

        <!-- Image showing events or map of Saudi Arabia -->
        <div class="mini-events">
            <img src="assets/images/فعاليات.jpg" alt="Cultural events in Saudi Arabia">
        </div>
    </div>

    <!-- Footer with basic site info and contact details -->
    <!-- Shared footer for English pages -->
    <footer class="footer">
        <div class="footer-container">

            <!-- Left: logo + short description -->
            <div class="footer-about">
                <img src="assets/images/Logo.png" alt="SaudiCulture Logo" class="footer-logo">
                <p>
                    <strong>SaudiCulture</strong> is a digital window into the rich history,
                    heritage, and cultural diversity of Saudi Arabia.
                </p>
            </div>

            <!-- Middle: quick navigation links -->
            <div class="footer-links">
                <h4>Quick Links</h4>
                <a href="index.php">Home</a>
                <a href="history.php">History</a>
                <a href="traditions.php">Traditions</a>
                <a href="food.php">Food</a>
                <a href="arts.php">Arts</a>
                <a href="Contact.php">Contact Us</a>
            </div>

            <!-- Right: contact information -->
            <div class="footer-contact">
                <h4>Contact</h4>
                <p>📞 +966554731708</p>
                <p>📧 mawrooth@gmail.com</p>
                <p>📍 Makkah, Saudi Arabia</p>
            </div>

        </div>

        <!-- Bottom strip -->
        <div class="footer-bottom">
            <p>© 2025 Mawrooth – SaudiCulture Website. All rights reserved.</p>
        </div>
    </footer>

    <!-- Script: toggle header style when user scrolls down -->
    <script>
        window.addEventListener("scroll", () => {
            const header = document.getElementById("mainHeader");
            if (window.scrollY > 50) {
                header.classList.add("scrolled");
            } else {
                header.classList.remove("scrolled");
            }
        });
    </script>



</body>

</html>
