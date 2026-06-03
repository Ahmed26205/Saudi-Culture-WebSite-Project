<!DOCTYPE html>
<?php
session_start();
?>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SaudiCulture - التقاليد السعودية</title>

    <!-- نفس الخطوط مثل باقي الموقع -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Almarai:wght@300;400;700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="CSS/styles.css" />
    <link rel="stylesheet" href="CSS/auth.css" />

    <script src="JS/script.js" defer></script>
    <link rel="icon" type="image/png" href="images/logo.png">
</head>

<body>
    <!-- الهيدر -->
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

            <button class="lang-btn" onclick="window.location.href='traditions.php'">EN</button>
        </div>
    </nav>
</header>

    <main>
        <!-- الهيرو مع الفيديو -->
        <section class="main-visual-section">
            <video autoplay muted loop playsinline class="bg-video">
                <source src="videos/Saudi culture.mp4" type="video/mp4" />
                المتصفح لا يدعم عرض الفيديو.
            </video>

            <div class="main-visual-content">
                <span class="traditions-tagline">التقاليد السعودية</span>
                <h1>الثقافة في الحياة اليومية</h1>
                <p>
                    تقوم الثقافة السعودية على الإيمان، الأسرة، الضيافة، والاعتزاز بالهوية.
                    ورغم اختلاف العادات بين مناطق المملكة، تبقى القيم المشتركة واضحة في أسلوب
                    التحية، اللباس، المناسبات الاجتماعية، ونمط الحياة اليومي.
                </p>
            </div>
        </section>

        <!-- الأقسام الرئيسية (نص + صورة) -->
        <section class="traditions-container">
            <h2 style="text-align:center;">أبرز التقاليد في المملكة</h2>
            <p style="text-align:center; max-width:800px; margin:0.5rem auto;">
                تستعرض الأقسام التالية بعضًا من أهم التقاليد السعودية، من الضيافة بالقهوة العربية
                إلى الاحتفالات العائلية، مروراً بالتحية واللباس التقليدي.
            </p>

            <div class="traditions-grid">
                <!-- 1 - الضيافة -->
                <article class="traditions-item">
                    <div class="traditions-image">
                        <img src="images/saudi_hospitality.jpg" alt="الضيافة السعودية والقهوة العربية" />
                    </div>
                    <div class="traditions-text">
                        <h2>الضيافة والقهوة العربية</h2>
                        <p>
                            تُعد الضيافة إحدى أعمق القيم في المجتمع السعودي. يبدأ استقبال الضيف
                            بتقديم القهوة العربية والتمر كرمز احترام وتقدير.
                        </p>
                        <ul>
                            <li>صبّ القهوة في فناجيل صغيرة كدليل ترحيب.</li>
                            <li>إشعار الضيف بأنه بين أهله وناسه.</li>
                            <li>تقديم الولائم في المناسبات والزيارات المهمة.</li>
                        </ul>
                    </div>
                </article>

                <!-- 2 - التحية والآداب -->
                <article class="traditions-item">
                    <div class="traditions-image">
                        <img src="images/saudi_greeting.jpg" alt="التحية السعودية" />
                    </div>
                    <div class="traditions-text">
                        <h2>التحية والآداب الاجتماعية</h2>
                        <p>
                            تبدأ التحية بقول «السلام عليكم»، ويتبعها السؤال عن الصحة والأهل،
                            تعبيراً عن الاهتمام وصلة الرحم.
                        </p>
                        <ul>
                            <li>إظهار الاحترام للكبار في الكلام والجلوس.</li>
                            <li>الزيارات المستمرة بين العائلة والأقارب.</li>
                            <li>الجلسات العائلية في “المجالس” التقليدية.</li>
                        </ul>
                    </div>
                </article>

                <!-- 3 - اللباس -->
                <article class="traditions-item">
                    <div class="traditions-image">
                        <img src="images/traditional_clothing.jpg" alt="اللباس التقليدي السعودي" />
                    </div>
                    <div class="traditions-text">
                        <h2>اللباس التقليدي</h2>
                        <p>
                            يتميز اللباس السعودي بالحشمة والوقار، ويختلف في التفاصيل حسب المنطقة.
                            لكنه يبقى حاضراً بقوة في المناسبات والأعياد.
                        </p>
                        <ul>
                            <li>الرجال: الثوب، الشماغ أو الغترة، والبشت.</li>
                            <li>النساء: العباءة بتصاميم مختلفة حسب المنطقة.</li>
                            <li>الزي الوطني رمز للفخر والانتماء.</li>
                        </ul>
                    </div>
                </article>

                <!-- 4 - الاحتفالات -->
                <article class="traditions-item">
                    <div class="traditions-image">
                        <img src="images/saudi_celebration.jpg" alt="احتفال سعودي" />
                    </div>
                    <div class="traditions-text">
                        <h2>المناسبات والاحتفالات</h2>
                        <p>
                            تُعد المناسبات الدينية والاجتماعية جزءاً مهماً من حياة السعوديين،
                            وتتميز بالبهجة والتجمعات العائلية.
                        </p>
                        <ul>
                            <li>صلاة العيد وزيارة الأقارب.</li>
                            <li>العيدية للأطفال في صباح العيد.</li>
                            <li>ليلة الحناء قبل الزفاف في كثير من المناطق.</li>
                        </ul>
                    </div>
                </article>
            </div>
        </section>

        <!-- معلومات إضافية -->
        <section class="traditions-container" style="margin-top: 3.5rem;">
            <h2 style="text-align:center;">معلومات إضافية عن التقاليد السعودية</h2>
            <p style="text-align:center; max-width:850px; margin:0.5rem auto 2rem; line-height:1.9;">
                تعكس التقاليد السعودية ارتباطاً عميقاً بين الماضي والحاضر. فهي تُظهر قيم الكرم،
                احترام الكبار، تماسك الأسرة، والتنوع الثقافي بين المناطق. وعلى الرغم من التطور
                الكبير، ما تزال هذه القيم جزءاً أساسياً من الهوية السعودية.
            </p>

            <div class="traditions-grid" style="gap: 2rem;">
                <!-- احترام الكبار -->
                <article class="traditions-item">
                    <div class="traditions-image">
                        <img src="images/respect_elders.jpg" alt="احترام الكبار" />
                    </div>
                    <div class="traditions-text">
                        <h2>احترام الكبار</h2>
                        <p>
                            يُعد احترام كبار السن أحد أهم القيم في المجتمع السعودي، ويظهر في طريقة
                            الحديث، ترتيب الجلوس، وطريقة التعامل اليومية.
                        </p>
                        <ul>
                            <li>تقديم الكبار في السلام والمجالس.</li>
                            <li>الاستماع لنصائحهم وخبراتهم.</li>
                            <li>استخدام لغة مهذبة ومحترمة.</li>
                        </ul>
                    </div>
                </article>

                <!-- الاجتماعات العائلية -->
                <article class="traditions-item">
                    <div class="traditions-image">
                        <img src="images/family_gathering.jpg" alt="اجتماع عائلي" />
                    </div>
                    <div class="traditions-text">
                        <h2>الاجتماعات العائلية</h2>
                        <p>
                            تُعد الزيارات العائلية جزءاً أساسياً من حياة السعوديين، خصوصاً في الإجازات
                            والمناسبات، حيث تُعزز الروابط وتُحافظ على صلة الرحم.
                        </p>
                        <ul>
                            <li>اجتماعات نهاية الأسبوع.</li>
                            <li>تقاسم الأحاديث والذكريات في المجلس.</li>
                            <li>الاهتمام بالأقارب والحرص على زيارتهم.</li>
                        </ul>
                    </div>
                </article>
            </div>
        </section>

        <!-- بطاقات تفاعلية: كلمات + عبارات + أمثال -->
        <section class="traditions-container traditions-expressions">
            <h2 style="text-align:center;">كلمات وعبارات وأمثال من التقاليد السعودية</h2>
            <p style="text-align:center; max-width:800px; margin:0.5rem auto 2rem; line-height:1.9;">
                هذه الكلمات والعبارات والأمثال تُستخدم كثيراً في الحياة اليومية، وتعكس الضيافة
                والأخلاق والحكمة الشعبية. قراءتها تساعد في الإجابة عن جزء من أسئلة الكويز المتعلقة
                بالمفردات والتعابير الشعبية.
            </p>

            <div class="traditions-expression-grid">
                <!-- بطاقة الكلمات -->
                <article class="traditions-expression-card">
                    <div class="traditions-expression-tag">كلمات</div>
                    <h3>كلمات من حياة السعوديين</h3>
                    <p>مفردات تُستخدم في البيوت والمجالس:</p>
                    <ul>
                        <li><strong>دلة</strong> – إناء القهوة العربية التقليدية.</li>
                        <li><strong>مجلس</strong> – غرفة استقبال الضيوف واجتماعات العائلة.</li>
                        <li><strong>عقال</strong> – الحبل الأسود الذي يثبت الشماغ أو الغترة.</li>
                    </ul>
                </article>

                <!-- بطاقة العبارات -->
                <article class="traditions-expression-card">
                    <div class="traditions-expression-tag traditions-expression-tag-alt">عبارات</div>
                    <h3>عبارات ترحيب واحترام</h3>
                    <p>تقال كثيراً في التحية والزيارات:</p>
                    <ul>
                        <li><strong>حياك الله</strong> – ترحيب ومعناها “الله يحيي قدومك”.</li>
                        <li><strong>تشرفنا</strong> – تعبير احترام عند التعارف.</li>
                        <li><strong>بيض الله وجهك</strong> – دعاء يدل على الشكر والامتنان.</li>
                    </ul>
                </article>

                <!-- بطاقة الأمثال -->
                <article class="traditions-expression-card">
                    <div class="traditions-expression-tag traditions-expression-tag-proverb">أمثال</div>
                    <h3>أمثال سعودية شعبية</h3>
                    <p>أقوال مختصرة تحمل حكماً وتجارب:</p>
                    <ul>
                        <li>
                            <strong>الجار قبل الدار</strong><br />
                            يوصي بحسن اختيار الجار قبل اختيار المنزل.
                        </li>
                        <li>
                            <strong>من جرب المجرب حلت به الندامة</strong><br />
                            من يكرر الخطأ نفسه يتعرض للندم.
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
                <input type="button" value="ابدأ الاختبار" onclick="window.location.href='quiz.php'">
             </div>
        
    
    
            </div>
    
    </main>

    <!-- الفوتر -->
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
<<<<<<< HEAD
    <!-- سكربت تغيير شكل الهيدر عند التمرير (إضافة/إزالة فئة scrolled) -->
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

=======
>>>>>>> c3a28db8a15445241c3b273eea38babe3ba68708
</body>

</html>