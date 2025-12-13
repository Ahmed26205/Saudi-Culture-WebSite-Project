<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SaudiCulture - Cultural Events</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700&family=Almarai:wght@300;400;700&display=swap" rel="stylesheet" />

    <!-- Main stylesheet -->
    <link rel="stylesheet" href="CSS/styles.css" />
<link rel="stylesheet" href="CSS/auth.css"/>
    <!-- Global site script -->
    <script src="JS/script.js" defer></script>
    <link rel="icon" type="image/png" href="images/logo.png">
</head>

<body>
    <!-- Top header bar shared across pages -->
     <header id="mainHeader">
        <div class="logo">
            <img src="images/Logo.png" alt="SaudiCulture" onclick="window.location.href='index.php'" />
        </div>

        <nav>
            <a href="index.php">Home</a>
            <a href="history.php">History</a>
            <a href="traditions.php">Traditions</a>
            <a href="food.php">Food</a>
            <a href="arts.php">Arts</a>
            <a href="culture_events.php">Cultural events</a>
            <a href="quiz.php">Quiz</a>
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

            <button class="lang-btn" onclick="window.location.href='culture_events_ar.php'">AR</button>
    </header>

    <!-- Main content area -->
    <main>
        <!-- Intro section -->
        <section class="main-visual-section">
            <div class="history-intro" style="padding: 7rem 1rem 3rem; max-width: 900px; margin: 0 auto;">
                <h1 style="text-align:center; margin-bottom:1rem;">Saudi Arabia's Cultural Events</h1>
                <p style="text-align:center; line-height:1.7; font-size: 1.2rem;">
                    Saudi Arabia hosts diverse cultural events that reflect its rich heritage and modern development. This page showcases some of the most prominent events.
                </p>
            </div>
            <!-- Background looping video -->
            <video autoplay muted loop playsinline class="bg-video">
                <source src="videos/Culturual_events_video.mp4" type="video/mp4">
            </video>
        </section>

        <!-- Timeline section -->
        <h2 class="section-title">Most Prominent Cultural Events</h2>

        <section class="history-timeline">
            <!-- Step 1 -->
            <div class="timeline-item" >
                <!-- image left -->
                <div class="timeline-image">
                    <img src="images/Janadriyah_festival.png" alt="A moment from Janadriyah Festival">
                </div>
                <!-- text right -->
                <div class="timeline-content">
                    <span class="era-label">National Festival</span>
                    <h3>Janadriyah Festival</h3>
                    <p>
                        Janadriyah Festival is one of the largest cultural festivals in the Kingdom, held annually for two weeks. The festival showcases Saudi folk heritage through artistic performances, literary events, traditional sports, folk markets, and heritage costumes.
                    </p>
                    <p>
                        The festival includes folk art performances, historical plays, cultural seminars, and craft exhibitions, making it an important platform for preserving national heritage and introducing it to new generations.
                    </p>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="timeline-item" >
                <!-- text left -->
                <div class="timeline-content">
                    <span class="era-label">World Heritage Site</span>
                    <h3>Al-Turaif District</h3>
                    <p>
                        Al-Turaif District in Diriyah was the first capital of the First Saudi State and has been listed as a UNESCO World Heritage Site. The district features traditional architecture and hosts various cultural events throughout the year.
                    </p>
                    <p>
                        The district hosts diverse cultural activities including heritage performances, historical tours, art exhibitions, and poetry evenings, making it an important cultural and tourist destination that reflects the history and development of the Kingdom.
                    </p>
                </div>
                <!-- image right -->
                <div class="timeline-image">
                    <img src="images/Alturaiyf.png" alt="Al-Turaif District in Diriyah">
                </div>
            </div>

            <!-- Step 3 -->
            <div class="timeline-item" >
                <div class="timeline-image">
                    <img src="images/Riyadh_Book_Fair.png" alt="Riyadh, capital of the Kingdom">
                </div>
                <div class="timeline-content">
                    <span class="era-label">Cultural Capital</span>
                    <h3>Riyadh Book Fair</h3>
                    <p>
                        The Riyadh International Book Fair is the largest cultural event in the Kingdom of Saudi Arabia, organized annually by the Ministry of Culture. It features hundreds of local, Arab, and international publishing houses, offering millions of titles across all fields. It is accompanied by diverse cultural activities such as seminars with intellectuals, and creative workshops.
                    </p>
                    <p>
                        The fair includes theatrical performances, concerts, art exhibitions, food festivals, sporting events, and cultural workshops, making Riyadh a center for cultural and entertainment diversity throughout the year.
                    </p>
                </div>
            </div>

            <!-- Step 4 -->
            <div class="timeline-item" >
                <div class="timeline-content">
                    <span class="era-label">Heritage & Traditions</span>
                    <h3>Camel Race</h3>
                    <p>
                        Camel racing is an authentic Arab tradition that has evolved into a major sporting and cultural event in the Kingdom. Races are held in various regions of the Kingdom and attract thousands of participants and spectators.
                    </p>
                    <p>
                        The event is not limited to racing only, but also includes camel exhibitions, folk markets, heritage art performances, and poetry competitions, making it an important cultural and social occasion that preserves authentic Saudi heritage.
                    </p>
                </div>
                <div class="timeline-image">
                    <img src="images/day-2-race-hero.jpg" alt="Camel Race">
                </div>
            </div>
        </section>

        <!-- Section: Events by regions -->
        <section>
            <h2 class="section-title">Events by Regions</h2>

            <div class="cards">
                <!-- Central Region -->
                <div class="card">
                    <img src="images/historical-dir-iyahh.jpg" alt="Diriyah" />
                    <h3>Central Region</h3>
                    <p>
                        The Central Region is known for diverse cultural events in Riyadh and Diriyah, including heritage festivals, art exhibitions, and cultural evenings that reflect the region's rich history.
                    </p>
                </div>

                <!-- Western Region -->
                <div class="card">
                    <img src="images/madinaold.jpg" alt="Makkah and Madinah" />
                    <h3>Western Region</h3>
                    <p>
                        Makkah and Madinah host cultural events aims muslims throughout the year, especially during Hajj and Umrah seasons, in addition to heritage festivals and traditional markets.
                    </p>
                </div>

                <!-- Northern & Northwestern Region -->
                <div class="card">
                    <img src="images/old history.jpg" alt="AlUla" />
                    <h3>North & Northwest</h3>
                    <p>
                        AlUla is famous for cultural events showcasing ancient Nabatean history, including light festivals, theatrical performances at archaeological sites, and historical exhibitions.
                    </p>
                </div>

                <!-- Eastern & Southern Region -->
                <div class="card">
                    <img src="images/rijal alma.jpg" alt="Eastern and Southern heritage" />
                    <h3>East & South</h3>
                    <p>
                        The Eastern and Southern regions are rich in cultural events reflecting geographical and heritage diversity, including maritime heritage festivals, traditional markets, and traditional art performances.
                    </p>
                </div>
            </div>
        </section>

        <!-- Optional: small "Did You Know?" facts section -->
        <section style="max-width: 1000px; margin: 3rem auto; padding: 0 1rem 4rem;">
            <h2 class="section-title">Did You Know?</h2>
            <ul style="line-height: 1.8; font-size: 1.1rem;">
                <li>Janadriyah Festival is considered the largest cultural gathering in the Kingdom and attracts over one million visitors annually.</li>
                <li>Al-Turaif District in Diriyah was the first Saudi site to be listed as a UNESCO World Heritage Site.</li>
                <li>Camel races in the Kingdom are considered one of the oldest sporting traditions still practiced today.</li>
            </ul>
        </section>
    </main>

    <!-- Shared footer section -->
    <footer class="footer">
        <div class="footer-container">
            <!-- Left: logo + short description -->
            <div class="footer-about">
                <img src="images/Logo.png" alt="SaudiCulture Logo" class="footer-logo">
                <p>
                    <strong>SaudiCulture</strong> is a digital window into the rich history, heritage, and cultural diversity of Saudi Arabia.
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

    <!-- JavaScript -->
    <script>
        // Scroll behavior for header background
        window.addEventListener("scroll", () => {
            const header = document.getElementById("mainHeader");
            if (window.scrollY > 50) {
                header.classList.add("scrolled");
            } else {
                header.classList.remove("scrolled");
            }
        });

        // Set active class for current page
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('nav a');
            navLinks.forEach(link => {
                if (link.getAttribute('href') === 'culture_events.html') {
                    link.classList.add('active');
                }
            });

            // Initialize search functionality
            const searchInput = document.getElementById('siteSearchInput');
            const suggestionsBox = document.getElementById('topSearchSuggestions');

            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    const query = this.value.toLowerCase();
                    if (query.length > 2) {
                        // Search suggestions
                        const suggestions = [
                            {title: "Janadriyah Festival", snippet: "Largest cultural festival in Saudi Arabia"},
                            {title: "Al-Turaif District", snippet: "UNESCO World Heritage Site in Diriyah"},
                            {title: "Camel Race", snippet: "Traditional Arab sport and cultural event"},
                            {title: "Riyadh Book Fair", snippet: "Major cultural and entertainment initiative"}
                        ];

                        const filtered = suggestions.filter(item =>
                            item.title.toLowerCase().includes(query) ||
                            item.snippet.toLowerCase().includes(query)
                        );

                        if (filtered.length > 0) {
                            suggestionsBox.innerHTML = filtered.map(item => `
                                <div class="item">
                                    <div class="title">${item.title}</div>
                                    <div class="snippet">${item.snippet}</div>
                                </div>
                            `).join('');
                            suggestionsBox.classList.add('show');
                        } else {
                            suggestionsBox.classList.remove('show');
                        }
                    } else {
                        suggestionsBox.classList.remove('show');
                    }
                });

                // Close suggestions when clicking outside
                document.addEventListener('click', function(e) {
                    if (!searchInput.contains(e.target) && !suggestionsBox.contains(e.target)) {
                        suggestionsBox.classList.remove('show');
                    }
                });
            }
        });

        // Toggle search bar function
        function toggleTopSearch() {
            const searchBar = document.getElementById('topSearchBar');
            if (searchBar.style.display === 'flex' || searchBar.style.display === 'block') {
                searchBar.style.display = 'none';
            } else {
                searchBar.style.display = 'block';
                document.getElementById('siteSearchInput').focus();
            }
        }
    </script>
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
    </script>
</body>

</html>
