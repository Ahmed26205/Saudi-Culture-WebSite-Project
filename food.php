<!-- HTML5 document type declaration -->
<!DOCTYPE html>
<!-- Food HTML element for the English version -->
<?php
session_start();
?>

<html lang="en">

<head>
    <!-- Character encoding to support all common characters -->
    <meta charset="UTF-8" />
    <!-- Viewport for responsive design on mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Text shown in the browser tab -->
    <title>SaudiCulture - Food</title>

    <!-- Google Fonts: Inter (body), Outfit (headings), Almarai (Arabic support) -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700&family=Almarai:wght@300;400;700&display=swap"
        rel="stylesheet">
    <!-- Main CSS file for styles -->
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="stylesheet" href="CSS/auth.css">
    <!-- Main JavaScript file for interactions (loaded after HTML) -->
    <script src="JS/script.js" defer></script>
</head>

<body>
    <!-- Top header bar: logo + navigation menu -->
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

        <button class="lang-btn" onclick="window.location.href='food_ar.php'">AR</button>
    </div>
</nav>

    </header>
    <!-- Main visual section: full-screen video hero -->
    <section class="main-visual-section">
        <!-- Background looping video -->
        <video autoplay muted loop playsinline class="bg-video">
            <source src="videos/Saudi Food.mov" type="video/mp4">
        </video>

        <!-- Content overlay on top of the video -->
        <div class="main-visual-content">
            <!--copied styling from history html and edit max-width to 650px-->
            <div style="padding: 7rem 1rem 3rem; max-width: 650px; margin: 0 auto;">
                <!-- Main site title -->
                <h1 style="text-align:center; margin-bottom:1rem;">TRADITIONAL FOOD OF SAUDI ARABIA</h1>
                <!-- Short description line -->
                <p style="text-align:center; line-height:1.7;">HERE YOU CAN LEARN ABOUT OUR TRADITIONAL FOOD FROM THE
                    DIFFERNT REGIONS IN OUR COUNTRY</p>
            </div>




        </div>
    </section>

    <!--central region section with background color -->
    <section class="region-section bg-central">
        <!--food container for the region-->
        <div class="food-container">
            <!--text color for the region-->
            <h2 class="text-central">Central Region Food</h2>

            <!--food grid for the region-->

            <div class="food-grid">
                <!--food cards for the region-->
                <div class="card">
                    <img src="images/Jareesh_Food.jpeg" alt="Jareesh food looks like cracked or crushed wheat">
                    <h3>Jareesh</h3>
                    <p style="text-align:left">
                        Jareesh, also known as cracked or crushed wheat,
                        is a staple grain used in Saudi Arabia. The dish, also named after the grain itself, is cooked
                        until tender with broth and meat,
                        creating a dish that can be likened to a creamy, grain-based stew with za'atar.

                    </p>
                </div>

                <div class="card">
                    <img src="images/Al-Qursan_food.jpeg" alt="Al-Qursan food">
                    <h3>Al-Qursan</h3>
                    <p style="text-align:left">
                        Al-Qursan is considered one of the popular Saudi dishes that are highlighted in events organized
                        by the Kingdom abroad,
                        particularly during Saudi Cultural Day events.
                        is made by kneading brown whole wheat flour dough mixed with spices including onion, cumin,
                        coriander, black seed, and cinnamon.

                    </p>
                </div>

                <div class="card">
                    <img src="images/Klija_food.jpeg" alt="Klija looks like a cookie">
                    <h3>Klija</h3>
                    <p style="text-align:left">
                        Klija is a dry dessert that can be stored for relatively long periods,
                        which allows it to be exported locally and internationally.
                        The cookie can be prepared with diverse fillings according to taste and preference. Some of its
                        fillings are made of nuts, dried coconuts, or cardamom, and the browning intensity at the top of
                        the cookie varies from one type to another.
                    </p>
                </div>

                <div class="card">
                    <img src="images/Hanini_food.jpeg" alt="Hanaini is made from Al-bur ">
                    <h3>Hanaini</h3>
                    <p style="text-align:left">
                        Hanaini is a traditional dish in the Kingdom of Saudi Arabia,
                        It is commonly prepared during the winter season, as it contains a high amount of calories,
                        providing the body with energy and warmth. is made from Al-bur (whole wheat grains), known as
                        "Al-Laqeemi," "Al-Jareeba," "Al-Umaydiya," "Al-Halba," and "Al-Ma'iya."
                    </p>
                </div>

                <div class="card">
                    <img src="images/Shakshuka_food.jpg"
                        alt="Shakshouka looks like dish of eggs poached in a sauce of tomatoes">
                    <h3>Shakshouka</h3>
                    <p style="text-align:left">
                        Shakshouka is a Maghrebi dish of eggs poached in a sauce of tomatoes,
                        olive oil, peppers, onion, and garlic, commonly spiced with cumin, paprika, and cayenne pepper.

                    </p>
                </div>
            </div>
        </div>
    </section>

    <!--northern region section with background color -->
    <section class="region-section bg-northern">
        <!--food container for the region-->
        <div class="food-container">
            <!--text color for the region-->
            <h2 class="text-northern">Northern Region Food</h2>

            <!--food grid for the region-->

            <div class="food-grid">
                <!--food cards for the region-->
                <div class="card">
                    <img src="images/8-chicken-kabsa-web.jpg" alt="Kabsa looks like a rice mixed with meat or chicken">
                    <h3>Kabsa</h3>
                    <p style="text-align:left">
                        Saudi Kabsa, known in the remaining Gulf Cooperation Council (GCC) countries as Makbous,
                        is one of the most prominent foods in the Kingdom of Saudi Arabia.
                        This dish universally expresses the cultural and nutritional identity of the Kingdom.
                        It is a somewhat greasy main dish and, therefore can be served for both lunch and dinner. Its
                        main ingredients are based on rice mixed with meat or chicken.

                    </p>
                </div>

                <div class="card">
                    <img src="images/Marqooq.jpg" alt="Marqooq consists of flour kneaded upon adding salt and water">
                    <h3>Marqooq</h3>
                    <p style="text-align:left">
                        This dish consists of flour kneaded upon adding salt and water,
                        ultimately forming a consistent and soft dough.
                        It is left to rest for no less than twenty minutes.
                        It is cooked with meat broth upon cooking the meat until half-cooked.
                        Some add vegetables to the mixture. The dough is rolled until it becomes,
                        placed in a pot along with meat, upon noting that the dough sheets should not be placed at once
                        so they do not stick to one another nor form a large sheet.
                        The mixture is then simmered on low heat until cooked.

                    </p>
                </div>

                <div class="card">
                    <img src="images/Mansaf.jpeg" alt="Mansaf consists of meat, rice, and Shirak bread">
                    <h3>Mansaf</h3>
                    <p style="text-align:left">
                        This dish consists of meat, rice, and Shirak bread.
                        However, the meat is cooked with Jameed, and then,
                        the Shirak bread is dipped in the liquid resulting from melting Jameed,
                        which is a type of hardened milk or other dairy. The Shirak bread is placed on top of a plate,
                        covered with rice,
                        and topped with meat and Jameed broth.

                    </p>

                </div>

                <div class="card">
                    <img src="images/Mufattah.jpg"
                        alt="Mufattah made primarily with rice, meat and a variety of spices">
                    <h3>Mufattah</h3>
                    <p style="text-align:left">
                        Mufattah is a traditional dish in Saudi Arabian cuisine, particularly popular in the northern
                        regions of the country.
                        It is a hearty and flavorful dish made primarily with rice, meat and a variety of spices.
                        The rice used in mufattah is typically basmati rice, known for its long grains and aromatic
                        flavor, often cooked with spices such as cardamom, cinnamon, and cloves to enhance its flavor.

                    </p>


                </div>

            </div>
        </div>
    </section>

    <!--Western region section with background color -->
    <section class="region-section bg-western">
        <!--food container for the region-->
        <div class="food-container">
            <!--text color for the region-->
            <h2 class="text-western">Western Region Food</h2>

            <!--food grid for the region-->

            <div class="food-grid">
                <!--food cards for the region-->
                <div class="card">
                    <img src="images/Saleeg_food.jpg"
                        alt="Saleeg looks like white-rice dish, cooked with broth (chicken or other meat) and milk">
                    <h3>Saleeg</h3>
                    <p style="text-align:left">
                        Is a white-rice dish, cooked with broth (chicken or other meat) and milk.
                        It originates in Hejaz region in the west of Saudi Arabia,
                        where it is commonly regarded as a national dish of the region.

                    </p>
                </div>

                <div class="card">
                    <img src="images/Sayadiyah_food.jpeg" alt="Sayadieh looks like a seasoned fish and rice dish">
                    <h3>Sayadieh</h3>
                    <p style="text-align:left">
                        Is a seasoned fish and rice dish from the Middle East,
                        made with cumin and other spices,
                        as well as fried onions.
                        The spice mix is called baharat in Arabic and its preparation varies from cook to cook but may
                        include caraway, cinnamon, cumin and coriander.

                    </p>

                </div>

                <div class="card">
                    <img src="images/Dibyaza_food.webp" alt="Dibyaza looks like baked dessert">
                    <h3>Dibyaza</h3>
                    <p style="text-align:left">
                        Dibyaza is a baked dessert, associated with festivity and joy.
                        In Makkah and Madinah, it is usually served on the first day of
                        Eid Al-Fitr and Eid Al-Adhha at the breakfast table after the Eid prayer.


                    </p>
                </div>

            </div>
        </div>
    </section>



    <!--Eastern region section with background color -->
    <section class="region-section bg-eastern">
        <!--food container for the region-->
        <div class="food-container">
            <!--text color for the region-->
            <h2 class="text-eastern">Eastern Region Food</h2>

            <!--food grid for the region-->

            <div class="food-grid">
                <!--food cards for the region-->
                <div class="card">
                    <img src="images/Balaleet.jpg"
                        alt="Balaleet looks like a consists of vermicelli sweetened with sugar, cardamom, rose water and saffron">
                    <h3>Balaleet</h3>
                    <p style="text-align:left">
                        A popular breakfast choice, it traditionally consists of vermicelli sweetened with sugar,
                        cardamom, rose water and saffron, and served with an overlying egg omelette.
                        It is sometimes served with sautéed onions or potatoes.
                        The dish is frequently served during the Islamic holidays of Eid al-Fitr as the first meal of
                        the day.

                    </p>
                </div>

                <div class="card">
                    <img src="images/Tharid.png" alt="Tharid looks like a bread soup">
                    <h3>Tharid</h3>
                    <p style="text-align:left">
                        Tharid also known as trid, taghrib, tashrib, tashreeb or thareed is a bread soup
                        Like other bread soups, it is a simple meal of broth and bread,
                        in this instance crumbled flatbread moistened with broth or stew.

                    </p>
                </div>

                <div class="card">
                    <img src="images/Sago.jpg" alt="Sago looks like a granules in water">
                    <h3>Sago</h3>
                    <p style="text-align:left">
                        The dish consists of starchy granules known as Sago.
                        They are one of the popular desserts in Gulf countries in general and the Eastern Province.
                        The dish is prepared after soaking the granules in water.
                        Sugar and ghee, amounting to the same quantity of granules, are then added to the mixture.

                    </p>


                </div>

            </div>
        </div>
    </section>

    <!--Southern region section with background color -->
    <section class="region-section bg-southern">
        <!--food container for the region-->
        <div class="food-container">
            <!--text color for the region-->
            <h2 class="text-southern">Southern Region Food</h2>

            <!--food grid for the region-->

            <div class="food-grid">
                <!--food cards for the region-->
                <div class="card">
                    <img src="images/Areeka_ food.jpg"
                        alt="Areeka looks like combination of mashed dates and crumbled bread">
                    <h3>Areeka</h3>
                    <p style="text-align:left">
                        Areeka is a traditional dessert that is prepared with a combination of mashed dates and crumbled
                        bread such as khubz,
                        while the additions usually include cream,
                        condensed milk, honey, and spices.
                        This filling dessert can be enjoyed for breakfast or as a light snack,
                        and it is typically drizzled with honey and garnished with slivered almonds.


                    </p>
                </div>

                <div class="card">
                    <img src="images/Mashghoutha_food.jpg"
                        alt="Al-Mashghoutha looks like consists of flour mixed with water">
                    <h3>Al-Mashghoutha</h3>
                    <p style="text-align:left">
                        Al-Mashghoutha is one of the dishes served during special occasions,
                        family gatherings, and big celebrations like weddings and festivals.
                        It is mainly a winter dish, providing the body with energy and warmth due to its nutritious
                        elements and high-calorie content.
                        Al-Mashghoutha consists of flour mixed with water, laban, milk, and a pinch of salt and is
                        served hot with honey, ghee, and dates.

                    </p>
                </div>

                <div class="card">
                    <img src="images/Aseedah.jpg"
                        alt="Aseedah looks like a lump of dough made by stirring wheat flour into boiling water">
                    <h3>Aseedah</h3>
                    <p style="text-align:left">
                        Is a lump of dough made by stirring wheat flour into boiling water,
                        sometimes with added butter or honey.
                        A simple, yet rich dish, often eaten without other complementary dishes, it is traditionally
                        served at breakfast.
                    </p>
                </div>

                <div class="card">
                    <img src="images/Haneeth.jpg" alt="Haneeth looks like a slow-roasted, spice-rubbed lamb with rice">
                    <h3>Haneeth</h3>
                    <p style="text-align:left">
                        It features slow-roasted, spice-rubbed lamb, typically cooked in a Tannour oven, served on a bed
                        of rice.
                        The preparation involves dry-rubbing chunks of bone-in lamb with a unique spice mix, then slowly
                        roasting it in the oven at a very low temperature for about six hours,
                        ensuring the meat is tender and succulent.

                    </p>
                </div>

            </div>
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
          

     </section>
    




    <!-- Footer with basic site info and contact details -->
    <!-- Shared footer for English pages -->
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