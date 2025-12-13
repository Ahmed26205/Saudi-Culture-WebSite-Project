<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <!-- ترميز يدعم اللغة العربية -->
    <meta charset="UTF-8" />
    <!-- ضبط العرض ليكون متجاوباً مع شاشات الجوال -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- عنوان الصفحة في شريط المتصفح -->
    <title>SaudiCulture - صفحة الفنون (عربي)</title>
    

    <!-- استيراد خطوط جوجل: Inter (إنجليزي) Outfit (عناوين) Almarai (عربي) -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700&family=Almarai:wght@300;400;700&display=swap"
        rel="stylesheet">
    <!-- ربط ملف التنسيقات الخارجية للموقع -->
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="stylesheet" href="CSS/auth.css">
    <!-- ربط ملف الجافاسكربت الخاص بالتفاعل في الواجهة -->
    <script src="JS/script.js" defer></script>
    <link rel="icon" type="image/png" href="images/logo.png">
</head>

<body>
        <!-- شريط علوي (Header) يحتوي الشعار والقائمة الرئيسية -->
  <header id="mainHeader">
    <div class="logo">
        <img src="images/Logo.png" alt="شعار SaudiCulture">
    </div>

    <nav>
        <a href="arabic.php">الرئيسية</a>
        <a href="history_ar.php">التاريخ</a>
        <a href="traditions_ar.php">التقاليد</a>
        <a href="food_ar.php">الطعام</a>
        <a href="arts_ar.php">الفنون</a>
        <a href="culture_events_ar.php">الفعاليات الثقافية</a>
        <a href="quiz_ar.php">الاختبار</a>
        <a href="browse_ar.php">المعجم</a>
        <a href="Contact_ar.php">اتصل بنا</a>
                

      <div class="search-wrap">
  <button class="nav-search-btn" type="button" onclick="toggleTopSearch()" aria-label="بحث">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
      xmlns="http://www.w3.org/2000/svg">
      <circle cx="11" cy="11" r="7" stroke="#0e6b4e" stroke-width="2"/>
      <line x1="16.5" y1="16.5" x2="22" y2="22"
        stroke="#0e6b4e" stroke-width="2" stroke-linecap="round"/>
    </svg>
  </button>

  <div class="top-search-bar" id="topSearchBar">
    <input id="siteSearchInput" type="text" placeholder="ابحث في الموقع..." autocomplete="off" />
    <div id="topSearchSuggestions" class="autocomplete" role="listbox"></div>
  </div>
</div>

        <div class="right-buttons" style="display: flex; align-items: center; gap: 10px;">
            
            <?php if(isset($_SESSION['user_id'])): ?>
                <a href="profile_ar.php" class="profile-square" title="الملف الشخصي" style="display: inline-flex;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="4"></circle>
                        <path d="M4 20c0-4 4-6 8-6s8 2 8 6"></path>
                    </svg>
                </a>
            <?php else: ?>
                <button class="login-btn" onclick="window.location.href='login_ar.php'">تسجيل الدخول</button>
                <button class="signup-btn" onclick="window.location.href='signup_ar.php'">إنشاء حساب</button>
            <?php endif; ?>

            <button class="lang-btn" onclick="window.location.href='culture_events.php'">EN</button>
        </div>
    </nav>
</header>

    <!-- Main content area -->
    <main>
        <!-- Intro section -->
        <section class="main-visual-section">
            <div class="history-intro" style="padding: 7rem 1rem 3rem; max-width: 900px; margin: 0 auto;">
                <h1 style="text-align:center; margin-bottom:1rem;">الفعاليات الثقافية في المملكة العربية السعودية</h1>
                <p style="text-align:center; line-height:1.7; font-size: 1.2rem;">
                    تحتضن المملكة العربية السعودية العديد من الفعاليات الثقافية المتنوعة التي تعكس تراثها العريق وتطورها المعاصر. هذه الصفحة تقدم لكم أبرز هذه الفعاليات.
                </p>
            </div>
            <!-- Background looping video -->
            <video autoplay muted loop playsinline class="bg-video">
                <source src="videos/Culturual_events_video.mp4" type="video/mp4">
            </video>
        </section>

        <!-- Timeline section -->
        <h2 class="section-title">أبرز الفعاليات الثقافية</h2>

        <section class="history-timeline">
            <!-- Step 1 -->
            <div class="timeline-item">
                <!-- image right -->
                <div class="timeline-image">
                    <img src="images/Janadriyah_festival.png" alt="لقطة من مهرجان الجنادرية">
                </div>
                <!-- text left -->
                <div class="timeline-content">
                    <span class="era-label">مهرجان وطني</span>
                    <h3>مهرجان الجنادرية</h3>
                    <p>
                        مهرجان الجنادرية هو أحد أكبر المهرجانات الثقافية في المملكة، يقام سنوياً ويستمر لمدة أسبوعين. يعرض المهرجان التراث الشعبي السعودي من خلال العروض الفنية والأدبية والرياضات التقليدية والأسواق الشعبية والأزياء التراثية.
                    </p>
                    <p>
                        يشمل المهرجان عروضاً للفنون الشعبية، والمسرحيات التاريخية، والندوات الثقافية، والمعارض الحرفية، مما يجعله منصة مهمة للحفاظ على التراث الوطني وتعريف الأجيال الجديدة به.
                    </p>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="timeline-item">
                <!-- text right -->
                <div class="timeline-content">
                    <span class="era-label">موقع تراثي عالمي</span>
                    <h3>حي الطريف بالدرعية</h3>
                    <p>
                        يعد حي الطريف في الدرعية أول عاصمة للدولة السعودية الأولى، وقد تم إدراجه ضمن قائمة اليونسكو للتراث العالمي. يتميز الحي بطابعه المعماري التقليدي والعديد من الفعاليات الثقافية التي تقام فيه على مدار العام.
                    </p>
                    <p>
                        تقام في الحي فعاليات ثقافية متنوعة تشمل العروض التراثية، والزيارات التاريخية، والمعارض الفنية، والأمسيات الشعرية، مما يجعله وجهة ثقافية وسياحية مهمة تعكس تاريخ وتطور المملكة.
                    </p>
                </div>
                <!-- image left -->
                <div class="timeline-image">
                    <img src="images/Alturaiyf.png" alt="حي الطريف في الدرعية">
                </div>
            </div>

            <!-- Step 3 -->
            <div class="timeline-item">
                <div class="timeline-image">
                    <img src="images/Riyadh_Book_Fair.png" alt="الرياض عاصمة المملكة">
                </div>
                <div class="timeline-content">
                    <span class="era-label">عاصمة الثقافة</span>
                    <h3>معرض الرياض للكتاب</h3>
                    <p>
                        معرض الرياض الدولي للكتاب هو أكبر حدث ثقافي في المملكة العربية السعودية، تُنظمه وزارة الثقافة سنويًا. يضم مئات دور النشر المحلية والعربية والدولية، ويقدم ملايين العناوين في جميع المجالات. تتخلله فعاليات ثقافية متنوعة مثل الندوات مع المثقفين، وجلسات توقيع الكتب، وورش العمل الإبداعية.
                    </p>
                    <p>
                        يتضمن المعرض عروضاً مسرحية، ومعارض فنية، ومهرجانات طعام، وفعاليات رياضية، وورش عمل ثقافية، مما يجعل الرياض مركزاً للتنوع الثقافي والترفيهي على مدار السنة.
                    </p>
                </div>
            </div>

            <!-- Step 4 -->
            <div class="timeline-item">
                <div class="timeline-content">
                    <span class="era-label">تراث وتقاليد</span>
                    <h3>سباق الهجن</h3>
                    <p>
                        سباق الهجن هو تقليد عربي أصيل تحول إلى فعالية رياضية وثقافية كبرى في المملكة. تقام السباقات في مختلف مناطق المملكة وتجذب الآلاف من المشاركين والمشاهدين.
                    </p>
                    <p>
                        لا تقتصر الفعالية على السباق فقط، بل تشمل أيضاً معارض للهجن، وأسواقاً شعبية، وعروضاً للفنون التراثية، ومسابقات شعرية، مما يجعلها مناسبة ثقافية واجتماعية مهمة تحافظ على التراث السعودي الأصيل.
                    </p>
                </div>
                <div class="timeline-image">
                    <img src="images/day-2-race-hero.jpg" alt="سباق الهجن">
                </div>
            </div>
        </section>

        <!-- Section: historical regions & landmarks -->
        <section>
            <h2 class="section-title">الفعاليات حسب المناطق</h2>

            <div class="cards">
                <!-- المنطقة الوسطى -->
                <div class="card">
                    <img src="images/historical-dir-iyahh.jpg" alt="الدرعية" />
                    <h3>المنطقة الوسطى</h3>
                    <p>
                        تشتهر المنطقة الوسطى بفعاليات ثقافية متنوعة في الرياض والدرعية، بما في ذلك المهرجانات التراثية، والمعارض الفنية، والأمسيات الثقافية التي تعكس التاريخ العريق للمنطقة.
                    </p>
                </div>

                <!-- المنطقة الغربية -->
                <div class="card">
                    <img src="images/madinaold.jpg" alt="مكة المكرمة والمدينة المنورة" />
                    <h3>المنطقة الغربية</h3>
                    <p>
                        تستضيف مكة المكرمة والمدينة المنورة فعاليات ثقافية تستهدف المسلمين على مدار العام، خاصة خلال مواسم الحج والعمرة، بالإضافة إلى المهرجانات التراثية والأسواق الشعبية.
                    </p>
                </div>

                <!-- المنطقة الشمالية والشمالية الغربية -->
                <div class="card">
                    <img src="images/old history.jpg" alt="العلا " />
                    <h3>الشمال والشمال الغربي</h3>
                    <p>
                        تشتهر العلا بفعاليات ثقافية تستعرض التاريخ النبطي القديم، وتشمل مهرجانات الضوء، والعروض المسرحية في المواقع الأثرية، والمعارض التاريخية.
                    </p>
                </div>

                <!-- المنطقة الشرقية والجنوبية -->
                <div class="card">
                    <img src="images/rijal alma.jpg" alt="التراث الشرقي والجنوبي" />
                    <h3>الشرق والجنوب</h3>
                    <p>
                        تزخر المنطقتان الشرقية والجنوبية بفعاليات ثقافية تعكس التنوع الجغرافي والتراثي، بما في ذلك مهرجانات التراث البحري، والأسواق الشعبية، والعروض الفنية التقليدية.
                    </p>
                </div>
            </div>
        </section>

        <!-- Optional: small "هل تعلم؟" facts section -->
        <section style="max-width: 1000px; margin: 3rem auto; padding: 0 1rem 4rem;">
            <h2 class="section-title">هل تعلم؟</h2>
            <ul style="line-height: 1.8; font-size: 1.1rem;">
                <li>مهرجان الجنادرية يعتبر أكبر تجمع ثقافي في المملكة ويستقطب أكثر من مليون زائر سنوياً.</li>
                <li>حي الطريف في الدرعية هو أول موقع سعودي يتم إدراجه في قائمة اليونسكو للتراث العالمي.</li>
                <li>سباقات الهجن في المملكة تعتبر من أقدم التقاليد الرياضية التي ما زالت تمارس حتى اليوم.</li>

            </ul>
        </section>
    </main>

    <!-- Shared footer section -->
  <footer class="footer">
        <div class="footer-container">

            <!-- Left: logo + brief -->
            <div class="footer-about">
                <img src="images/Logo.png" alt="SaudiCulture Logo" class="footer-logo">
                <p>مشروع <strong>SaudiCulture</strong> – منصة تعرض جمال الموروث الثقافي والتاريخ السعودي.</p>
            </div>

            <!-- Middle: quick links -->
            <div class="footer-links">
                <h4>روابط سريعة</h4>
                <a href="arabic.php">الرئيسية</a>
                <a href="history_ar.php">التاريخ</a>
                <a href="traditions_ar.php">التقاليد</a>
                <a href="food_ar.php">الطعام</a>
                        <a href="arts_ar.php">الفنون</a>

                <a href="Contact_ar.php">اتصل بنا</a>
            </div>

            <!-- Right: contact info -->
            <div class="footer-contact">
                <h4>تواصل معنا</h4>
                <p>📞 +966554731708</p>
                <p>📧 mawrooth@gmail.com</p>
                <p>📍 مكة، المملكة العربية السعودية</p>
            </div>

        </div>

        <div class="footer-bottom">
            <p>© 2025 Mawrooth – SaudiCulture Website. All rights reserved.</p>
        </div>
    </footer>

    <!-- Scroll behavior for header background -->
    <script>
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
                if (link.getAttribute('href') === 'culture_events_ar.php') {
                    link.classList.add('active');
                }
            });

            // Initialize search functionality for Arabic
            const searchInput = document.getElementById('siteSearchInput');
            const suggestionsBox = document.getElementById('topSearchSuggestions');

            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    const query = this.value;
                    if (query.length > 2) {
                        // Arabic search suggestions
                        const suggestions = [
                            {title: "مهرجان الجنادرية", snippet: "أكبر المهرجانات الثقافية في المملكة"},
                            {title: "حي الطريف", snippet: "موقع تراث عالمي في الدرعية"},
                            {title: "سباق الهجن", snippet: "تراث عربي أصيل وتحول إلى فعالية رياضية"},
                            {title: "معرض الرياض للكتاب", snippet: "مبادرة ثقافية وترفيهية كبرى في العاصمة"}
                        ];

                        const filtered = suggestions.filter(item =>
                            item.title.includes(query) ||
                            item.snippet.includes(query)
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

    <!-- Firebase auth nav handling -->
    <script type="module">
        // Note: Uncomment and connect to your Firebase when ready
        /*
        import { auth } from "./JS/firebase-config.js";
        import { onAuthStateChanged } from "https://www.gstatic.com/firebasejs/10.13.0/firebase-auth.js";

        onAuthStateChanged(auth, (user) => {
            const nav = document.querySelector("nav");
            if (user) {
                const name = user.displayName || "مستخدم";
                nav.innerHTML = `
                    <a href="index_ar.html">الرئيسية</a>
                    <a href="history_ar.html">التاريخ</a>
                    <a href="traditions_ar.html">التقاليد</a>
                    <a href="food_ar.html">المأكولات</a>
                    <a href="arts_ar.html">الفنون</a>
                    <a href="culture_events_ar.html" class="active">الفعاليات الثقافية</a>
                    <a href="quiz_ar.html">الاختبار</a>
                    <a href="Contact_ar.html">اتصل بنا</a>

                    <div class="search-wrap">
                        <button class="nav-search-btn" type="button" onclick="toggleTopSearch()" aria-label="بحث">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="2"/>
                                <line x1="16.5" y1="16.5" x2="22" y2="22" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </button>
                        <div class="top-search-bar" id="topSearchBar">
                            <input id="siteSearchInput" type="text" placeholder="ابحث في الموقع..." autocomplete="off" />
                            <div id="topSearchSuggestions" class="autocomplete" role="listbox"></div>
                        </div>
                    </div>

                    <span class="user-name">${name}</span>
                    <button id="logoutBtn" class="login-btn">تسجيل الخروج</button>
                    <button class="lang-btn" onclick="window.location.href='culture_events.html'">EN</button>
                `;

                // Re-add event listeners
                document.getElementById("logoutBtn").addEventListener("click", () => {
                    auth.signOut().then(() => {
                        window.location.href = "login_ar.html";
                    });
                });

                // Re-add active class
                document.querySelector('a[href="culture_events_ar.html"]').classList.add('active');

                // Reinitialize search functionality
                const searchInput = document.getElementById('siteSearchInput');
                const suggestionsBox = document.getElementById('topSearchSuggestions');

                if (searchInput) {
                    searchInput.addEventListener('input', function() {
                        const query = this.value;
                        if (query.length > 2) {
                            // Arabic search suggestions
                            const suggestions = [
                                {title: "مهرجان الجنادرية", snippet: "أكبر المهرجانات الثقافية في المملكة"},
                                {title: "حي الطريف", snippet: "موقع تراث عالمي في الدرعية"},
                                {title: "سباق الهجن", snippet: "تراث عربي أصيل وتحول إلى فعالية رياضية"},
                                {title: "معرض الرياض للكتاب", snippet: "مبادرة ثقافية وترفيهية كبرى في العاصمة"}
                            ];

                            const filtered = suggestions.filter(item =>
                                item.title.includes(query) ||
                                item.snippet.includes(query)
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
                }
            }
        });
        */
    </script>
</body>

</html>
