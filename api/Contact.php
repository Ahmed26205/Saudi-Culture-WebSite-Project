<!DOCTYPE html>

<?php
session_start();
?>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SaudiCulture - Contact Us</title>

    <!-- Import Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700&family=Almarai:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- Link to external CSS stylesheet -->
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="stylesheet" href="CSS/auth.css">


    <!-- Contact Page Specific CSS -->
    <style>
        /* Contact Page Specific Styles */
        .contact-hero {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('assets/images/contact-bg.jpg');
            background-size: cover;
            background-position: center;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            padding: 0 20px;
            padding-top: 120px;

        }

            .contact-hero h1 {
                font-family: 'Outfit', sans-serif;
                font-size: 3.5rem;
                margin-bottom: 1rem;
                font-weight: 700;
            }

            .contact-hero p {
                font-family: 'Inter', sans-serif;
                font-size: 1.2rem;
                max-width: 700px;
                margin: 0 auto;
                line-height: 1.6;
            }

        .contact-container {
            max-width: 1200px;
            margin: 4rem auto;
            padding: 0 20px;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 30px;
            margin-top: 3rem;
        }

        .contact-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 2rem;
            text-align: center;
            box-shadow: var(--shadow-sm);
            border: 2px solid var(--color-accent);
            transition: all var(--transition-fast);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

            .contact-card:hover {
                transform: translateY(-8px);
                box-shadow: var(--shadow-md);
            }

        .contact-icon {
            background-color: var(--color-accent);
            color: white;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            box-shadow: 0 5px 15px rgba(14, 107, 78, 0.2);
        }

        .contact-card h3 {
            font-family: 'Outfit', sans-serif;
            color: var(--color-accent);
            margin-bottom: 1rem;
            font-size: 1.4rem;
            font-weight: 600;
        }

        .contact-card p {
            font-family: 'Inter', sans-serif;
            color: var(--color-text);
            line-height: 1.6;
            margin-bottom: 0.5rem;
            font-size: 1rem;
        }

        .contact-info-section {
            max-width: 1000px;
            margin: 4rem auto;
            padding: 2.5rem;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-sm);
            border: 1px solid rgba(14, 107, 78, 0.1);
        }

            .contact-info-section h3 {
                font-family: 'Outfit', sans-serif;
                color: var(--color-accent);
                margin-bottom: 1.5rem;
                text-align: center;
                font-size: 1.8rem;
                font-weight: 600;
            }

        .hours-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

            .hours-table tr {
                border-bottom: 1px solid rgba(0, 0, 0, 0.08);
            }

                .hours-table tr:last-child {
                    border-bottom: none;
                }

            .hours-table td {
                padding: 1rem 1.5rem;
                font-family: 'Inter', sans-serif;
                font-weight: 400;
                font-size: 1.05rem;
            }

        .day {
            font-weight: 600;
            color: var(--color-accent);
        }

        .time {
            color: #555;
            text-align: right;
        }

        .quick-links-section {
            max-width: 1200px;
            margin: 4rem auto;
            padding: 0 20px;
            text-align: center;
        }

            .quick-links-section h3 {
                font-family: 'Outfit', sans-serif;
                color: var(--color-accent);
                margin-bottom: 1rem;
                font-size: 1.8rem;
                font-weight: 600;
            }

            .quick-links-section p {
                font-family: 'Inter', sans-serif;
                color: var(--color-text);
                max-width: 700px;
                margin: 0 auto 2rem;
                font-size: 1.1rem;
                line-height: 1.6;
            }

        .quick-links-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-top: 2rem;
        }

        .quick-link-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 2rem;
            box-shadow: var(--shadow-sm);
            border: 1px solid rgba(14, 107, 78, 0.1);
            transition: all var(--transition-fast);
        }

            .quick-link-card:hover {
                transform: translateY(-5px);
                box-shadow: var(--shadow-md);
                border-color: var(--color-accent);
            }

            .quick-link-card h4 {
                font-family: 'Outfit', sans-serif;
                color: var(--color-accent);
                margin-bottom: 1rem;
                font-size: 1.3rem;
                font-weight: 600;
            }

            .quick-link-card p {
                font-family: 'Inter', sans-serif;
                color: #555;
                line-height: 1.6;
                margin-bottom: 1.5rem;
                font-size: 1rem;
            }

        .quick-link-btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background: var(--color-accent);
            color: white;
            border: none;
            border-radius: var(--border-radius);
            font-family: 'Outfit', sans-serif;
            font-weight: 600;
            text-decoration: none;
            transition: all var(--transition-fast);
        }

            .quick-link-btn:hover {
                background: rgba(14, 107, 78, 0.9);
                transform: translateY(-2px);
            }

        .section-title {
            font-family: 'Outfit', sans-serif;
            color: var(--color-accent);
            text-align: center;
            margin: 3rem 0 1.5rem;
            font-size: 2.2rem;
            font-weight: 700;
            position: relative;
            padding-bottom: 1rem;
        }

            .section-title:after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 50%;
                transform: translateX(-50%);
                width: 80px;
                height: 3px;
                background-color: var(--saudi-gold);
            }

        /* Responsive Design */
        @media (max-width: 768px) {
            .contact-hero {
                height: 320px;
                margin-top: 70px;
            }

                .contact-hero h1 {
                    font-size: 2.5rem;
                }

                .contact-hero p {
                    font-size: 1.1rem;
                    padding: 0 10px;
                }

            .contact-grid {
                grid-template-columns: 1fr;
                gap: 25px;
            }

            .section-title {
                font-size: 1.8rem;
                margin: 2rem 0 1.5rem;
            }

            .contact-info-section {
                padding: 1.5rem;
                margin: 3rem 20px;
            }

            .hours-table td {
                padding: 0.75rem 1rem;
                font-size: 1rem;
            }

            .quick-links-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
        }

        @media (max-width: 480px) {
            .contact-hero h1 {
                font-size: 2rem;
            }

            .contact-hero p {
                font-size: 1rem;
            }

            .section-title {
                font-size: 1.5rem;
            }
        }
    </style>

    <!-- Load external JavaScript file with defer to load after HTML -->
    <script src="JS/script.js" ></script>
    <link rel="icon" type="image/png" href="assets/images/logo.png">
</head>

<body>
    <!-- Header with solid background for internal pages -->
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

            <button class="lang-btn" onclick="window.location.href='Contact_ar.php'">AR</button>
    </header>

    <!-- Contact Hero Section -->
    <section class="contact-hero">
        <div>
            <h1>Contact Us</h1>
            <p>We're here to help you explore the rich cultural heritage of Saudi Arabia. Reach out to us with any questions or for more information about Saudi traditions, history, and culture.</p>
        </div>
    </section>

    <!-- Contact Information Section -->
   <!-- Contact Information Section -->
    <div class="contact-container">
        <h2 class="section-title">Contributing Team Members</h2>

        <div class="contact-grid">
            <!-- Location Card -->
            <div class="contact-card">
                <div class="contact-icon">   <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="4"></circle>
                        <path d="M4 20c0-4 4-6 8-6s8 2 8 6"></path>
                    </svg></div>
                <h3>Abdulaziz Abdulhamid Elyousfi</h3>
                <p>Team Leader: Designer of Homepage, History, Program Styles, and Scripts</p>
                <p>Makkah, Saudi Arabia</p>
                <p> Contact Information</p>
                <p>+966554731708📞</p>
                <p>aaelyousfi9@gmail.com✉️</p>
 </div>

            <div class="contact-card">
                <div class="contact-icon"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="4"></circle>
                        <path d="M4 20c0-4 4-6 8-6s8 2 8 6"></path>
                    </svg></div>
                <h3>Faisal Khalid Al-Mutrafi</h3>
                <p>Login, Account Creation, and Profile Page Designer</p>
               <p>Makkah, Saudi Arabia</p>
                <p>Contact Information</p>
                <p>+966537077092📞</p>
            </div>

            <div class="contact-card">
                <div class="contact-icon"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="4"></circle>
                        <path d="M4 20c0-4 4-6 8-6s8 2 8 6"></path>
                    </svg></div>
                <h3>Hamed Raed Al-Ansari</h3>
                <p>Arts & Food Page Designer</p>
              <p>Makkah, Saudi Arabia</p>
                <p>Contact Information</p>
                <p>+966540015851📞</p>

            </div>
       

         <div class="contact-card">
                <div class="contact-icon"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="4"></circle>
                        <path d="M4 20c0-4 4-6 8-6s8 2 8 6"></path>
                    </svg></div>
                <h3> Ahmed Abdullah Al-Afeef </h3>
                <p>Test and Dictionary Page Designer</p>
              <p>Makkah, Saudi Arabia</p>
                <p>Contact Information</p>
                <p>+966550239251📞</p>

            </div>
       

     <div class="contact-card">
                <div class="contact-icon"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="4"></circle>
                        <path d="M4 20c0-4 4-6 8-6s8 2 8 6"></path>
                    </svg></div>
                <h3>Mohammed Ibrahim Qaid</h3>
                <p>Traditions Page Designer</p>
              <p>Makkah, Saudi Arabia</p>
                <p>Contact Information</p>
                <p>+966537768476📞</p>

            </div>
       

     <div class="contact-card">
                <div class="contact-icon"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="4"></circle>
                        <path d="M4 20c0-4 4-6 8-6s8 2 8 6"></path>
                    </svg></div>
                <h3>Mohammed Hindi Al-Saadi</h3>
                <p>Designer of the Cultural Events and Communication Page</p>
              <p>Makkah, Saudi Arabia</p>
                <p>Contact Information</p>
                <p>+966546155082📞</p>

            </div>
        </div>
    </div>

    <!-- Business Hours Section -->
    <div class="contact-info-section">
        <h3>Business Hours</h3>
        <table class="hours-table">
            <tr>
                <td class="day">Sunday - Thursday</td>
                <td class="time">9:00 AM - 5:00 PM</td>
            </tr>
            <tr>
                <td class="day">Friday</td>
                <td class="time">Closed</td>
            </tr>
            <tr>
                <td class="day">Saturday</td>
                <td class="time">Closed</td>
            </tr>
         
        </table>
    </div>

    <!-- Quick Links Section -->
    <div class="quick-links-section">
        <h3>Explore Saudi Culture</h3>
        <p>Discover more about the rich heritage and traditions of Saudi Arabia through our featured sections</p>

        <div class="quick-links-grid">
            <!-- Traditional Food -->
            <div class="quick-link-card">
                <h4>Traditional Food</h4>
                <p>Explore the diverse culinary traditions from different regions of Saudi Arabia, from Kabsa to Saleeg and traditional desserts.</p>
                <a href="food.php" class="quick-link-btn">Explore Food</a>
            </div>

            <!-- Cultural Traditions -->
            <div class="quick-link-card">
                <h4>Cultural Traditions</h4>
                <p>Learn about Saudi customs, celebrations, clothing, and social practices that define the Kingdom's rich cultural identity.</p>
                <a href="traditions.php" class="quick-link-btn">Learn Traditions</a>
            </div>

            <!-- Arts & Heritage -->
            <div class="quick-link-card">
                <h4>Traditional Arts</h4>
                <p>Discover Saudi Arabia's artistic heritage including traditional music, dance, handicrafts, and visual arts.</p>
                <a href="arts.php" class="quick-link-btn">View Arts</a>
            </div>

            <!-- History -->
            <div class="quick-link-card">
                <h4>Ancient Civilizations</h4>
                <p>Explore the historical landmarks and ancient civilizations that have shaped Saudi Arabia's rich history.</p>
                <a href="history.php" class="quick-link-btn">Discover History</a>
            </div>

            <!-- Cultural Events -->
            <div class="quick-link-card">
                <h4>Saudi events</h4>
                <p>Learn about ancient and modern saudi events.</p>
                <a href="culture_events.php" class="quick-link-btn">Discover History</a>
            </div>

        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <!-- Left: logo + description -->
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
                <p>📞 +966 12 345 6789</p>
                <p>📧 saudi.culture@project.com</p>
                <p>📍 Makkah, Saudi Arabia</p>
            </div>
        </div>

        <!-- Bottom strip -->
        <div class="footer-bottom">
            <p>© 2025 Mawrooth – SaudiCulture Website. All rights reserved.</p>
        </div>
    </footer>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const navLinks = document.querySelectorAll('nav a');
    navLinks.forEach(link => {
      if (link.getAttribute('href') === 'Contact.php') link.classList.add('active');
    });

    const searchInput = document.getElementById('siteSearchInput');
    const suggestionsBox = document.getElementById('topSearchSuggestions');

    if (searchInput) {
      searchInput.addEventListener('input', function () {
        const query = this.value.toLowerCase();

        if (query.length > 2) {
          const suggestions = [
            { title: "Traditional Food", snippet: "Learn about Kabsa, Saleeg, and other Saudi dishes" },
            { title: "Cultural Traditions", snippet: "Discover Saudi customs and celebrations" },
            { title: "Ancient Civilizations", snippet: "Explore historical landmarks" },
            { title: "Traditional Arts", snippet: "Saudi music, dance, and handicrafts" },
            { title: "Saudi events", snippet: "Learn about ancient and modern saudi events" }
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

      document.addEventListener('click', function (e) {
        if (!searchInput.contains(e.target) && !suggestionsBox.contains(e.target)) {
          suggestionsBox.classList.remove('show');
        }
      });
    }
  });

  function toggleTopSearch() {
    const searchBar = document.getElementById('topSearchBar');
    if (searchBar.style.display === 'flex' || searchBar.style.display === 'block') {
      searchBar.style.display = 'none';
    } else {
      searchBar.style.display = 'block';
      document.getElementById('siteSearchInput').focus();
    }
  }

  window.addEventListener('scroll', () => {
    const header = document.getElementById('mainHeader');
    if (!header) return;
    if (window.scrollY > 50) header.classList.add('scrolled');
    else header.classList.remove('scrolled');
  });
</script>

</body>

</html>

