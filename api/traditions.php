<!DOCTYPE html>
<html lang="en">

<?php
session_start();
?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SaudiCulture - Traditions</title>

    <!-- Fonts (same as main site) -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Almarai:wght@300;400;700&display=swap"
        rel="stylesheet" />

    <!-- Main CSS -->
    <link rel="stylesheet" href="CSS/styles.css" />
    <link rel="stylesheet" href="CSS/auth.css" />

    <!-- Main JS -->
    <script src="JS/script.js" defer></script>
    <link rel="icon" type="image/png" href="assets/images/logo.png">
</head>

<body>
    <!-- Header -->
       <header id="mainHeader">
        <div class="logo">
            <img src="assets/images/Logo.png" alt="SaudiCulture Logo">
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

        <button class="lang-btn" onclick="window.location.href='traditions_ar.php'">AR</button>
    </div>
</nav>

    </header>

    <main>
        <!-- Hero section with background video -->
        <section class="main-visual-section">
            <video autoplay muted loop playsinline class="bg-video">
                <source src="assets/videos/Saudi culture.mp4" type="video/mp4" />
            </video>

            <div class="main-visual-content">
                <span class="traditions-tagline">Saudi Traditions</span>
                <h1>Culture in Everyday Life</h1>
                <p>
                    Saudi culture is built on faith, family and hospitality. Each region has its
                    own customs and accent, but Saudis share common values that appear in greetings,
                    clothing, celebrations and social life.
                </p>
            </div>
        </section>

        <!-- Main traditions (image + text) -->
        <section class="traditions-container">
            <h2 style="text-align:center;">Key Traditions Across the Kingdom</h2>
            <p style="text-align:center; max-width:800px; margin:0.5rem auto;">
                These sections highlight some of the most visible traditions in Saudi life—from welcoming
                guests with coffee and dates to celebrating Eid and weddings with family and friends.
            </p>

            <div class="traditions-grid">
                <!-- 1 - Hospitality -->
                <article class="traditions-item">
                    <div class="traditions-image">
                        <img src="assets/images/saudi_hospitality.jpg" alt="Saudi hospitality with Arabic coffee and dates" />
                    </div>
                    <div class="traditions-text">
                        <h2>Hospitality & Arabic Coffee</h2>
                        <p>
                            Hospitality is a cornerstone of Saudi culture. Guests are welcomed warmly,
                            even without prior notice, and are offered Arabic coffee and dates as a first gesture.
                        </p>
                        <ul>
                            <li>Serving coffee as a sign of honor and respect.</li>
                            <li>Making guests feel relaxed and “at home”.</li>
                            <li>Preparing generous meals for special visits and occasions.</li>
                        </ul>
                    </div>
                </article>

                <!-- 2 - Greetings -->
                <article class="traditions-item">
                    <div class="traditions-image">
                        <img src="assets/images/saudi_greeting.jpg" alt="Saudi greeting traditions" />
                    </div>
                    <div class="traditions-text">
                        <h2>Greetings & Social Etiquette</h2>
                        <p>
                            Greetings are warm and often include asking about health and family
                            before moving on to any other subject.
                        </p>
                        <ul>
                            <li>Starting with “Assalamu Alaikum”.</li>
                            <li>Showing special respect to elders in language and seating.</li>
                            <li>Regular social visits and family majlis (sitting rooms).</li>
                        </ul>
                    </div>
                </article>

                <!-- 3 - Clothing -->
                <article class="traditions-item">
                    <div class="traditions-image">
                        <img src="assets/images/traditional_clothing.jpg" alt="Traditional Saudi clothing" />
                    </div>
                    <div class="traditions-text">
                        <h2>Traditional Dress</h2>
                        <p>
                            Clothing in Saudi Arabia is modest and reflects both climate and local customs.
                            Traditional outfits are still common in daily life and during important events.
                        </p>
                        <ul>
                            <li>Men: thobe, shemagh or ghutra, and bisht on special occasions.</li>
                            <li>Women: abaya in public, with styles that differ by region.</li>
                            <li>National dress is often worn on religious and national holidays.</li>
                        </ul>
                    </div>
                </article>

                <!-- 4 - Celebrations -->
                <article class="traditions-item">
                    <div class="traditions-image">
                        <img src="assets/images/saudi_celebration.jpg" alt="Saudi family celebration" />
                    </div>
                    <div class="traditions-text">
                        <h2>Celebrations & Family Life</h2>
                        <p>
                            Religious holidays and weddings bring families and communities together.
                            These occasions are full of joy, traditional dishes and sometimes folk performances.
                        </p>
                        <ul>
                            <li>Eid prayers followed by visiting relatives and sharing meals.</li>
                            <li>Giving “Eidiya” (money or gifts) to children on Eid mornings.</li>
                            <li>Henna nights before weddings in many regions of the Kingdom.</li>
                        </ul>
                    </div>
                </article>
            </div>
        </section>

        <!-- Extra general info -->
        <section class="traditions-container" style="margin-top: 3.5rem;">
            <h2 style="text-align:center;">More About Saudi Traditions</h2>
            <p style="text-align:center; max-width:850px; margin:0.5rem auto 2rem; line-height:1.8;">
                Saudi traditions connect the past with the present. They highlight values such as generosity,
                respect, family unity and cultural pride. Even with rapid development and modernization,
                many customs remain an important part of daily life.
            </p>

            <div class="traditions-grid" style="gap: 2rem;">
                <!-- Respect for elders -->
                <article class="traditions-item">
                    <div class="traditions-image">
                        <img src="assets/images/respect_elders.jpg" alt="Respect for elders in Saudi culture" />
                    </div>
                    <div class="traditions-text">
                        <h2>Respect for Elders</h2>
                        <p>
                            Respecting elders is one of the strongest values in Saudi society. It appears in the way
                            people speak, in seating order and in daily decisions.
                        </p>
                        <ul>
                            <li>Giving elders priority in greetings and seating.</li>
                            <li>Listening to their advice in family matters.</li>
                            <li>Using polite and respectful language when addressing them.</li>
                        </ul>
                    </div>
                </article>

                <!-- Family gatherings -->
                <article class="traditions-item">
                    <div class="traditions-image">
                        <img src="assets/images/family_gathering.jpg" alt="Saudi family gathering" />
                    </div>
                    <div class="traditions-text">
                        <h2>Family Gatherings</h2>
                        <p>
                            Families meet frequently, especially on weekends and during holidays. These gatherings
                            strengthen relationships and preserve cultural identity.
                        </p>
                        <ul>
                            <li>Regular visits between close and extended family members.</li>
                            <li>Sharing meals and traditional stories at the family table.</li>
                            <li>Celebrating achievements and special moments together.</li>
                        </ul>
                    </div>
                </article>
            </div>
        </section>

        <!-- INTERACTIVE CARDS: words, phrases, proverbs -->
        <section class="traditions-container traditions-expressions">
            <h2 style="text-align:center;">Words, Phrases & Proverbs in Saudi Traditions</h2>
            <p style="text-align:center; max-width:800px; margin:0.5rem auto 2rem;">
                These expressions are commonly used in Saudi daily life and reflect heritage,
                hospitality and social values. Reading them helps you answer part of the quiz
                related to vocabulary and popular sayings.
            </p>

            <div class="traditions-expression-grid">
                <!-- Words card -->
                <article class="traditions-expression-card">
                    <div class="traditions-expression-tag">Words</div>
                    <h3>Key Cultural Words</h3>
                    <p>Important words that appear in Saudi houses and gatherings:</p>
                    <ul>
                        <li><strong>Dallah</strong> – Traditional Arabic coffee pot used to serve guests.</li>
                        <li><strong>Majlis</strong> – Sitting room where guests and family gather.</li>
                        <li><strong>Agal</strong> – Black cord used to hold the ghutra or shemagh in place.</li>
                    </ul>
                </article>

                <!-- Phrases card -->
                <article class="traditions-expression-card">
                    <div class="traditions-expression-tag traditions-expression-tag-alt">Phrases</div>
                    <h3>Polite Saudi Phrases</h3>
                    <p>Common expressions used in greetings and social visits:</p>
                    <ul>
                        <li><strong>“Hayyak Allah”</strong> – Warm welcome meaning “May God greet you / welcome”.</li>
                        <li><strong>“Tasharrafna”</strong> – “We are honored to meet you”.</li>
                        <li><strong>“Bayyid Allah wajhak”</strong> – “May God lighten your face”, said to thank someone.
                        </li>
                    </ul>
                </article>

                <!-- Proverbs card -->
                <article class="traditions-expression-card">
                    <div class="traditions-expression-tag traditions-expression-tag-proverb">Proverbs</div>
                    <h3>Saudi Proverbs</h3>
                    <p>Popular sayings that carry wisdom and are used in daily situations:</p>
                    <ul>
                        <li>
                            <strong>“Aljār qabl al-dār”</strong><br />
                            “Choose your neighbor before your home” – shows the importance of good neighbors.
                        </li>
                        <li>
                            <strong>“Man jarrab al-mujarab ḥalla bih al-nadam”</strong><br />
                            “Whoever repeats what has already failed will face regret.”
                        </li>
                    </ul>
                </article>
            </div>
        </section>
         <!--copy form history.html and index.html test (quiz) button-->
     <section style="max-width: 1000px; margin: 3rem auto; padding: 0 1rem 4rem;">
            <h2 class="section-title">Test your knowledge here</h2>

             <div class="main-visual-content">

             <div class="action-buttons">
                <input type="button" value="Start Quiz" onclick="window.location.href='quiz.php'">
             </div>
        
    
    
            </div>

    </main>

    <!-- Footer -->
   <footer class="footer">
        <div class="footer-container">
            <div class="footer-about">
                <img src="assets/images/Logo.png" alt="SaudiCulture Logo" class="footer-logo">
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
    <!-- Script: toggle header style when user scrolls down -->
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
