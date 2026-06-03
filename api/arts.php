<!-- HTML5 document type declaration -->
<!DOCTYPE html>
<?php
session_start();
?>
<!-- Arts HTML element for the English version -->
<html lang="en">

<head>
    <!-- Character encoding to support all common characters -->
    <meta charset="UTF-8" />
    <!-- Viewport for responsive design on mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Text shown in the browser tab -->
    <title>SaudiCulture - Arts</title>

    <!-- Google Fonts: Inter (body), Outfit (headings), Almarai (Arabic support) -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700&family=Almarai:wght@300;400;700&display=swap"
        rel="stylesheet">
    <!-- Main CSS file for styles -->
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="stylesheet" href="CSS/auth.css">
    <!-- Main JavaScript file for interactions (loaded after HTML) -->
    <script src="JS/script.js" defer></script>
    <link rel="icon" type="image/png" href="assets/images/logo.png">
</head>

<body>
    <!-- Top header bar: logo + navigation menu -->
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

        <button class="lang-btn" onclick="window.location.href='arts_ar.php'">AR</button>
    </div>
</nav>

    </header>

    <!-- Main visual section: full-screen video hero -->
    <section class="main-visual-section">
        <!-- Background looping video -->
        <video autoplay muted loop playsinline class="bg-video">
            <source src="assets/videos/Arts_vid.mp4" type="video/mp4">
        </video>

        <!-- Content overlay on top of the video -->
        <div class="main-visual-content">
            <!--copied styling from history html and edit max-width to 650px-->
            <div style="padding: 7rem 1rem 3rem; max-width: 650px; margin: 0 auto;">
                <!-- Main site title -->
                <h1 style="text-align:center; margin-bottom:1rem;">TRADITIONAL ARTS OF SAUDI ARABIA</h1>
                <!-- Short description line -->
                <p style="text-align:center; line-height:1.7;">HERE YOU CAN LOOK AND EXPLORE ABOUT OUR TRADITIONAL ARTS</p>
            </div>




        </div>
    </section>
   
  <!--here is the Art gallery section-->
   <section>
    <h2 style="text-align: center; margin-top: 40px;">Traditional Arts Gallery</h2>
   </section>
   
<!--here is the Art gallery container-->
 <div class="arts-container">
    
    <div class="flip-card">
        <div class="flip-card-inner">
            <div class="flip-card-front">
                <img src="assets/images/Al-Fajari_art.jpg" alt="Al-Fajri is a traditional maritime singing">
            </div>
            <div class="flip-card-back">
                <h3>Al-Fajri</h3>
                <p>Al-Fajri is a traditional maritime singing genre and an ancient folk art that gained popularity across the Arab Gulf countries. It derives its name from 'al-Fajiri' or 'al-Jahl' clay instrument, which is the primary tool used in the performance of this art.</p>
            </div>
        </div>
    </div>

    <div class="flip-card">
        <div class="flip-card-inner">
            <div class="flip-card-front">
                <img src="assets/images/Al_Qatt al_Asiri_art.jpg" alt="Al-Qatt al-Asiri a traditional art form of engraving and ornamentation in the Aseer Province">
            </div>
            <div class="flip-card-back">
                <h3>Al-Qatt al-Asiri</h3>
                <p>Al-Qatt al-Asiri is a traditional art form of engraving and ornamentation in the Aseer Province, southwestern Saudi Arabia. It relies on depicting geometric and floral patterns using primary colors directly on the interior walls of homes, reception areas, or any permanent and fixed surfaces.</p>
            </div>
        </div>
    </div>

    <div class="flip-card">
        <div class="flip-card-inner">
            <div class="flip-card-front">
                <img src="assets/images/Majas Art.jpg" alt="Majas Art is a form of traditional Hejazi folk singing">
            </div>
            <div class="flip-card-back">
                <h3>Majas Art</h3>
                <p>Majas Art is a form of traditional Hejazi folk singing that has been around for a long time. Initially, it was known as the shepherd's chant, then it evolved to be called the mastered chant, later by laughter, shouting, and paired singing, until it finally became known as Majas.</p>
            </div>
        </div>
    </div>

     <div class="flip-card">
        <div class="flip-card-inner">
            <div class="flip-card-front">
                <img src="assets/images/الصحاف.jpg" alt="vessel carved from the wood ">
            </div>
            <div class="flip-card-back">
                <h3>Sihaf</h3>
                <p>The Sihaf industry in Saudi Arabia is a profession distinguished by the regions and villages of the southern Kingdom. Sahaaf is the plural of Sahfah, which is a circular vessel carved from the wood of the Gharb tree, in which food is placed for eating. It is used in occasions like marriage; whereas a man used to not marry unless there were Sahaaf in his house, as they are among the necessary household requirements.</p>
            </div>
        </div>
    </div>

     <div class="flip-card">
        <div class="flip-card-inner">
            <div class="flip-card-front">
                <img src="assets/images/السدو.jpg" alt="traditional craft">
            </div>
            <div class="flip-card-back">
                <h3>Al-Sadu</h3>
                <p>Al-Sadu traditional craft originated among Arab tribes who lived in the ancient Arabian Peninsula. Moreover, the Kingdom's handcrafting techniques helped it grow into one of the most well-known traditional arts in the Kingdom's history. It is now celebrated by the media and is a popular attraction at heritage and cultural festivals.</p>
            </div>
        </div>
    </div>

    <div class="flip-card">
        <div class="flip-card-inner">
            <div class="flip-card-front">
                <img src="assets/images/Pottery.jpeg" alt="traditional craft">
            </div>
            <div class="flip-card-back">
                <h3>Dougha Pottery</h3>
                <p>The Dougha Pottery Factory in Al-Ahsa is one of Saudi Arabia’s oldest traditional craft centers, with a history spanning over 600 years. It stands as a living testament to the region’s deep cultural heritage and the enduring craftsmanship of generations who have mastered the art of pottery-making.</p>
            </div>
        </div>
    </div>

    <div class="flip-card">
        <div class="flip-card-inner">
            <div class="flip-card-front">
                <img src="assets/images/Al_Khoos.jpeg" alt="Palm weaving, known as Khoos">
            </div>
            <div class="flip-card-back">
                <h3>Al-Khoos</h3>
                <p>Palm weaving, known as Khoos, is one of the Kingdom’s oldest crafts, with artisans in Al-Ahsa Oasis — home to the world’s largest date palm oasis and a UNESCO World Heritage Site</p>
            </div>
        </div>
    </div>

    <div class="flip-card">
        <div class="flip-card-inner">
            <div class="flip-card-front">
                <img src="assets/images/Mud_Houses.jpg" alt="Mud houses">
            </div>
            <div class="flip-card-back">
                <h3>Mud Houses</h3>
                <p>Mud houses in the Kingdom of Saudi Arabia reflect one of the earliest architectural concepts upon which homes, forts, palaces, and houses were built in the Kingdom. These constructions are based on the use of mud, a common material in most building processes. Mud is used for both interior and exterior walls and acts as a binding material between the stone foundations. It is mixed with straw to prevent cracking.</p>
            </div>
        </div>
    </div>

    <div class="flip-card">
        <div class="flip-card-inner">
            <div class="flip-card-front">
                <img src="assets/images/Rose_Cultivation.jpg" alt="Roses">
            </div>
            <div class="flip-card-back">
                <h3>Rose Cultivation</h3>
                <p>Rose Cultivation in the Kingdom of Saudi Arabia is one of the agricultures that spread in the Kingdom, starting from the stage of planting seedlings to the manufacturing of final rose products, such as perfumes and essential oils.</p>
            </div>
        </div>
    </div>

    <div class="flip-card">
        <div class="flip-card-inner">
            <div class="flip-card-front">
                <img src="assets/images/Al-Qallaleef.jpeg" alt="traditional wooden ships">
            </div>
            <div class="flip-card-back">
                <h3>Al-Qallafah</h3>
                <p>Al-Qallafah is the craft of traditional wooden shipbuilding in the Eastern Province of the Kingdom of Saudi Arabia. It is considered a part of the carpentry profession, and the skilled craftsman in this trade is called "al-Qallaf." The ships were made in small and medium sizes to suit sailing in the Arabian Gulf, and they were used by sailors for maritime transport, trade, and diving trips to harvest natural pearls.</p>
            </div>
        </div>
    </div>

    <div class="flip-card">
        <div class="flip-card-inner">
            <div class="flip-card-front">
                <img src="assets/images/Mishlah.jpg" alt="traditional Arabic cloak">
            </div>
            <div class="flip-card-back">
                <h3>Bisht</h3>
                <p>Bisht or Mishlah is one of the local names for the traditional Arabic cloak. It is a loose outer garment that is open at the front and holds cultural and social significance in the Gulf and Arab regions. Ccommonly worn by people during special occasions, ceremonies, and holidays.</p>
            </div>
        </div>
    </div>

    <div class="flip-card">
        <div class="flip-card-inner">
            <div class="flip-card-front">
                <img src="assets/images/the Rababah.jpg" alt="The Rababah is a primitive musical instrument">
            </div>
            <div class="flip-card-back">
                <h3>The Rababah</h3>
                <p>The Rababah is a primitive musical instrument, historically known in the northern regions of the Kingdom of Saudi Arabia. It used to be a companion for the nomads during their gatherings and celebrations. Even today, it remains an integral part of the folk music culture in festivals and national celebrations within and beyond the Kingdom.</p>
            </div>
        </div>
    </div>

    <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="assets/images/الدباغة .jpeg" alt="Leather Tanning">
                </div>
                <div class="flip-card-back">
                    <h3>Leather Tanning</h3>
                    <p>Leather Tanning is the process of converting animal hides to a product; i.e.., leather—which is used in manufacturing multiple items. The main source of leather is cattle. The process of tanning preserves hides from getting rotten and makes them flexible and durable. </p>
                </div>
            </div>
     </div>

     <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="assets/images/السبح.jpg" alt=" Rosaries">
                </div>
                <div class="flip-card-back"> 
                    <h3>Subah</h3>
                    <p>The craft of making Subah (prayer beads) in Saudi Arabia is a historic profession renowned in several regions, particularly in Makkah and Madinah. It involves collecting beads crafted from raw materials derived from trees or gemstones, and then stringing them onto specialized threads. This craft requires great skill and precision from its practitioners, who are locally known as 'Al-Subahiyyah'.</p>
                </div>
            </div>
     </div>

     <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="assets/images/Saudi_Arabia-_Sword.jpg" alt="The Saudi Dagger">
                </div>
                <div class="flip-card-back">
                    <h3>The Saudi Dagger</h3>
                    <p>The Saudi Dagger (Khanjar) or Saudi Janbiya is a type of Arab dagger crafted within the Kingdom of Saudi Arabia. Traditionally, these daggers are manufactured in the southern regions of the Kingdom and Al-Ahsa, featuring both curved and straight designs. The Saudi Khanjar (or Janbiya) is considered one of the most significant Saudi cultural symbols and is worn during weddings and national occasions, particularly in the Najran region.</p>
                </div>
            </div>
     </div>

 </div>
      
     <!--copy form history.html and index.html test (quiz) button-->
     <section style="max-width: 1000px; margin: 3rem auto; padding: 0 1rem 4rem;">
            <h2 class="section-title">Test your knowledge here</h2>

             <div class="main-visual-content">

             <div class="action-buttons">
                <input type="button" value="Start Quiz" onclick="window.location.href='quiz.php'">
             </div>
        
    
    
            </div>
          

     </section>
    



    <!-- Footer with basic site info and contact details -->
    <!-- Shared footer for English pages -->
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
