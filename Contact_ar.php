<!DOCTYPE html>
<?php
session_start();
?>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ثقافة السعودية - اتصل بنا</title>

    <!-- Import Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700&family=Almarai:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- Link to external CSS stylesheet -->
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="stylesheet" href="CSS/auth.css"/>


    <!-- Arabic Contact Page Specific CSS -->
    <style>
        /* Arabic Contact Page Specific Styles */
        body {
            font-family: 'Almarai', sans-serif;
            text-align: right;
            
        }

        .contact-hero {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('images/contact-bg.jpg');
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
                font-family: 'Almarai', sans-serif;
                font-size: 3.5rem;
                margin-bottom: 1rem;
                font-weight: 700;
            }

            .contact-hero p {
                font-family: 'Almarai', sans-serif;
                font-size: 1.2rem;
                max-width: 700px;
                margin: 0 auto;
                line-height: 1.8;
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
            font-family: 'Almarai', sans-serif;
            color: var(--color-accent);
            margin-bottom: 1rem;
            font-size: 1.4rem;
            font-weight: 700;
        }

        .contact-card p {
            font-family: 'Almarai', sans-serif;
            color: var(--color-text);
            line-height: 1.8;
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
                font-family: 'Almarai', sans-serif;
                color: var(--color-accent);
                margin-bottom: 1.5rem;
                text-align: center;
                font-size: 1.8rem;
                font-weight: 700;
            }

        .hours-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
            direction: rtl;
        }

            .hours-table tr {
                border-bottom: 1px solid rgba(0, 0, 0, 0.08);
            }

                .hours-table tr:last-child {
                    border-bottom: none;
                }

            .hours-table td {
                padding: 1rem 1.5rem;
                font-family: 'Almarai', sans-serif;
                font-weight: 400;
                font-size: 1.05rem;
            }

        .day {
            font-weight: 700;
            color: var(--color-accent);
            text-align: right;
        }

        .time {
            color: #555;
            text-align: left;
        }

        .quick-links-section {
            max-width: 1200px;
            margin: 4rem auto;
            padding: 0 20px;
            text-align: center;
        }

            .quick-links-section h3 {
                font-family: 'Almarai', sans-serif;
                color: var(--color-accent);
                margin-bottom: 1rem;
                font-size: 1.8rem;
                font-weight: 700;
            }

            .quick-links-section p {
                font-family: 'Almarai', sans-serif;
                color: var(--color-text);
                max-width: 700px;
                margin: 0 auto 2rem;
                font-size: 1.1rem;
                line-height: 1.8;
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
            text-align: right;
        }

            .quick-link-card:hover {
                transform: translateY(-5px);
                box-shadow: var(--shadow-md);
                border-color: var(--color-accent);
            }

            .quick-link-card h4 {
                font-family: 'Almarai', sans-serif;
                color: var(--color-accent);
                margin-bottom: 1rem;
                font-size: 1.3rem;
                font-weight: 700;
            }

            .quick-link-card p {
                font-family: 'Almarai', sans-serif;
                color: #555;
                line-height: 1.8;
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
            font-family: 'Almarai', sans-serif;
            font-weight: 700;
            text-decoration: none;
            transition: all var(--transition-fast);
        }

            .quick-link-btn:hover {
                background: rgba(14, 107, 78, 0.9);
                transform: translateY(-2px);
            }

        .section-title {
            font-family: 'Almarai', sans-serif;
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

        /* Arabic Header Styles */
        .solid-header nav {
            direction: rtl;
        }

            .solid-header nav a {
                margin: 0 0 0 1.5rem;
            }

        .search-wrap {
            margin-right: 0;
            margin-left: 1rem;
        }

        /* Arabic Footer Styles */
        .footer-container {
            direction: rtl;
        }

        .footer-about,
        .footer-links,
        .footer-contact {
            text-align: right;
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
    <script src="JS/script.js" defer></script>
    <link rel="icon" type="image/png" href="images/logo.png">
</head>

<body>
    <!-- Header with solid background for internal pages -->
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

            <button class="lang-btn" onclick="window.location.href='Contact.php'">EN</button>
        </div>
    </nav>
    
</header>

    <!-- Contact Hero Section -->
    <section class="contact-hero">
        
        <div>
            <h1>اتصل بنا</h1>
            <p>نحن هنا لمساعدتك في استكشاف التراث الثقافي الغني للمملكة العربية السعودية. تواصل معنا لأي استفسارات أو لمزيد من المعلومات حول تقاليد وتاريخ وثقافة السعودية.</p>
        </div>
    </section>

    <!-- Contact Information Section -->
    <div class="contact-container">
        <h2 class="section-title">أعضاء الفريق المساهمين</h2>

        <div class="contact-grid">
            <!-- Location Card -->
            <div class="contact-card">
                <div class="contact-icon">   <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="4"></circle>
                        <path d="M4 20c0-4 4-6 8-6s8 2 8 6"></path>
                    </svg></div>
                <h3>عبدالعزيز عبدالحميد اليوسفي</h3>
                <p>قائد الفريق مصمم الصفحة الرئيسية والتاريخ وستايلات البرنامج وسكريبتات</p>
                <p>مكة المكرمة، المملكة العربية السعودية</p>
                <p> معلومات التواصل</p>
                <p>+966554731708📞</p>
                <p>aaelyousfi9@gmail.com✉️</p>
 </div>

            <div class="contact-card">
                <div class="contact-icon"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="4"></circle>
                        <path d="M4 20c0-4 4-6 8-6s8 2 8 6"></path>
                    </svg></div>
                <h3>فيصل خالد المطرفي</h3>
                <p>مصمم صفحة تسجيل الدخول وانشاء الحساب والملف الشخصي</p>
                <p>مكة المكرمة، المملكة العربية السعودية</p>
                <p> معلومات التواصل</p>
                <p>+966537077092📞</p>
            </div>

            <div class="contact-card">
                <div class="contact-icon"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="4"></circle>
                        <path d="M4 20c0-4 4-6 8-6s8 2 8 6"></path>
                    </svg></div>
                <h3>حامد رائد الأنصاري</h3>
                <p>مصمم صفحة الفنون والطعام</p>
                <p>مكة المكرمة، المملكة العربية السعودية</p>
                <p> معلومات التواصل</p>
                <p>+966540015851📞</p>

            </div>
       

         <div class="contact-card">
                <div class="contact-icon"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="4"></circle>
                        <path d="M4 20c0-4 4-6 8-6s8 2 8 6"></path>
                    </svg></div>
                <h3> أحمد عبدالله العفيف </h3>
                <p>مصمم صفحة الاختبار والمعجم</p>
                <p>مكة المكرمة، المملكة العربية السعودية</p>
                <p> معلومات التواصل</p>
                <p>+966550239251📞</p>

            </div>
       

     <div class="contact-card">
                <div class="contact-icon"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="4"></circle>
                        <path d="M4 20c0-4 4-6 8-6s8 2 8 6"></path>
                    </svg></div>
                <h3>محمد ابراهيم قايد</h3>
                <p>مصمم صفحة التقاليد</p>
                <p>مكة المكرمة، المملكة العربية السعودية</p>
                <p> معلومات التواصل</p>
                <p>+966537768476📞</p>

            </div>
       

     <div class="contact-card">
                <div class="contact-icon"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="4"></circle>
                        <path d="M4 20c0-4 4-6 8-6s8 2 8 6"></path>
                    </svg></div>
                <h3>محمد هندي الصاعدي</h3>
                <p>مصمم صفحة الفعاليات الثقافية والتواصل</p>
                <p>مكة المكرمة، المملكة العربية السعودية</p>
                <p> معلومات التواصل</p>
                <p>+966546155082📞</p>

            </div>
        </div>
    </div>

    <!-- Business Hours Section -->
    <div class="contact-info-section">
        <h3>ساعات العمل</h3>
        <table class="hours-table">
            <tr>
                <td class="day">الأحد - الخميس</td>
                <td class="time">٩:٠٠ ص - ٥:٠٠ م</td>
            </tr>
            <tr>
                <td class="day">الجمعة</td>
                <td class="time">مغلق</td>
            </tr>
            <tr>
                <td class="day">السبت</td>
                <td class="time">مغلق</td>
            </tr>
      
        </table>
    </div>

    <!-- Quick Links Section -->
    <div class="quick-links-section">
        <h3>استكشف ثقافة السعودية</h3>
        <p>اكتشف المزيد عن التراث الغني وتقاليد المملكة العربية السعودية من خلال أقسامنا المميزة</p>

        <div class="quick-links-grid">
            <!-- Traditional Food -->
            <div class="quick-link-card">
                <h4>الطعام التقليدي</h4>
                <p>استكشف التقاليد الغذائية المتنوعة من مناطق المملكة العربية السعودية المختلفة، من الكبسة إلى السليق والحلويات التقليدية.</p>
                <a href="food_ar.php" class="quick-link-btn">استكشف الطعام</a>
            </div>

            <!-- Cultural Traditions -->
            <div class="quick-link-card">
                <h4>التقاليد الثقافية</h4>
                <p>تعرف على عادات السعودية، الاحتفالات، الملابس، والممارسات الاجتماعية التي تعبر عن الهوية الثقافية الغنية للمملكة.</p>
                <a href="traditions_ar.php" class="quick-link-btn">تعلم التقاليد</a>
            </div>

            <!-- Arts & Heritage -->
            <div class="quick-link-card">
                <h4>الفنون التقليدية</h4>
                <p>اكتشف التراث الفني السعودي بما في ذلك الموسيقى التقليدية، الرقص، الحرف اليدوية، والفنون البصرية.</p>
                <a href="arts_ar.php" class="quick-link-btn">عرض الفنون</a>
            </div>

            <!-- History -->
            <div class="quick-link-card">
                <h4>الحضارات القديمة</h4>
                <p>استكشف المعالم التاريخية والحضارات القديمة التي شكلت التاريخ الغني للمملكة العربية السعودية.</p>
                <a href="history_ar.php" class="quick-link-btn">اكتشف التاريخ</a>
            </div>

            <!-- Cultural Events -->
            <div class="quick-link-card">
                <h4>الفعاليات الثقافية</h4>
                <p>تعرف على الفعاليات السعودية العريقة والمحدثة.</p>
                <a href="culture_events_ar.php" class="quick-link-btn">اكتشف الفعاليات</a>
            </div>
        </div>
    </div>

    <!-- Footer -->
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

    <!-- JavaScript -->
    <script>
        // Set active class for current page
        document.addEventListener('DOMContentLoaded', function() {
            // Set active navigation link
            const navLinks = document.querySelectorAll('nav a');
            navLinks.forEach(link => {
                if (link.getAttribute('href') === 'contact_ar.php') {
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
                        // Arabic search suggestions
                        const suggestions = [
                            {title: "الطعام التقليدي", snippet: "تعرف على الكبسة، السليق، وأطباق سعودية أخرى"},
                            {title: "التقاليد الثقافية", snippet: "اكتشف عادات واحتفالات السعودية"},
                            {title: "الحضارات القديمة", snippet: "استكشف المعالم التاريخية"},
                            {title: "الفنون التقليدية", snippet: "الموسيقى، الرقص، والحرف اليدوية السعودية"},
                            {title: "الفعاليات الثقافية", snippet: "تعرف على الفعاليات السعودية العريقة والمحدثة"}
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

        // Toggle search bar function (matching your site)
        function toggleTopSearch() {
            const searchBar = document.getElementById('topSearchBar');
            if (searchBar.style.display === 'flex' || searchBar.style.display === 'block') {
                searchBar.style.display = 'none';
            } else {
                searchBar.style.display = 'block';
                document.getElementById('siteSearchInput').focus();
            }
        }

        // Scroll effect for header
        window.addEventListener('scroll', () => {
            const header = document.getElementById('mainHeader');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>
