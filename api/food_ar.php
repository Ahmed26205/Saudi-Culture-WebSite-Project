<!-- ملف الطعام HTML  للواجهة العربية لموقع SaudiCulture -->
<!DOCTYPE html>
<?php
session_start();
?>
<!-- الصفحة باللغة العربية وباتجاه من اليمين لليسار -->
<html lang="ar" dir="rtl">

<head>
    <!-- ترميز يدعم اللغة العربية -->
    <meta charset="UTF-8" />
    <!-- ضبط العرض ليكون متجاوباً مع شاشات الجوال -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- عنوان الصفحة في شريط المتصفح -->
    <title>SaudiCulture - صفحة الطعام (عربي)</title>

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

            <button class="lang-btn" onclick="window.location.href='food.php'">EN</button>
        </div>
    </nav>
</header>

    <section class="main-visual-section">
        <video autoplay muted loop playsinline class="bg-video">
            <source src="videos/Saudi Food.mov" type="video/mp4">
        </video>

        <div class="main-visual-content">
            <div style="padding: 7rem 1rem 3rem; max-width: 650px; margin: 0 auto;">
                <h1 style="text-align:center; margin-bottom:1rem;">الأكلات الشعبية السعودية</h1>
                <p style="text-align:center; line-height:1.7;">هنا يمكنك التعرف على أطباقنا التقليدية الأصيلة من مختلف
                    مناطق مملكتنا الحبيبة.</p>
            </div>
        </div>
    </section>

    <section class="region-section bg-central">
        <div class="food-container">
            <h2 class="text-central">أكلات المنطقة الوسطى</h2>

            <div class="food-grid">
                <div class="card">
                    <img src="images/Jareesh_Food.jpeg" alt="صورة الجريش">
                    <h3>الجريش</h3>
                    <p style="text-align:right">
                        الجريش هو سيد السفرة السعودية، يتكون من القمح المجروش (اللقيمي) المطبوخ مع اللبن والمرق حتى يصبح
                        قوامه كريمياً ناعماً. يُزين عادة بـ "المسمنة" (كشنة البصل والبهارات) ويقدم كطبق رئيسي في
                        المناسبات.
                    </p>
                </div>

                <div class="card">
                    <img src="images/Al-Qursan_food.jpeg" alt="صورة القرصان">
                    <h3>القرصان</h3>
                    <p style="text-align:right">
                        من أشهر الأطباق النجدية، يتكون من رقائق خبز البر الرقيقة جداً، تُشرب بمرق اللحم والخضروات الغني
                        بالبهارات مثل الليمون الأسود والقرفة. يعتبر طبقاً صحياً ومشبّعاً يجمع بين النشويات والبروتين
                        والخضار.
                    </p>
                </div>

                <div class="card">
                    <img src="images/Klija_food.jpeg" alt="صورة الكليجا">
                    <h3>الكليجا</h3>
                    <p style="text-align:right">
                        قرص حلوى تشتهر به منطقة القصيم، يتميز بقشرته المقرمشة وحشوته الغنية بدبس التمر والهيل والقرفة
                        والليمون الأسود. تعتبر الكليجا رفيقة القهوة السعودية الأولى، ويمكن تخزينها لفترات طويلة دون أن
                        تفسد.
                    </p>
                </div>

                <div class="card">
                    <img src="images/Hanini_food.jpeg" alt="صورة الحنيني">
                    <h3>الحنيني</h3>
                    <p style="text-align:right">
                        الحنيني هو الحلوى الشتوية الرسمية في نجد. يُصنع من مزيج التمر منزوع النوى وخبز البر الأسمر، حيث
                        يُفرمان معاً ويطبخان مع السمن البلدي والهيل. يمد الجسم بطاقة ودفء كبيرين في أيام البرد القارس.
                    </p>
                </div>

                <div class="card">
                    <img src="images/Shakshuka_food.jpg" alt="صورة الشكشوكة">
                    <h3>الشكشوكة</h3>
                    <p style="text-align:right">
                        طبق إفطار شعبي محبب، يتكون ببساطة من البيض المطبوخ في صلصة من الطماطم الطازجة، البصل، الفلفل،
                        والبهارات. تقدم عادة ساخنة مع الخبز والشاي وتعتبر بداية ممتازة لليوم.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="region-section bg-northern">
        <div class="food-container">
            <h2 class="text-northern">أكلات المنطقة الشمالية</h2>

            <div class="food-grid">
                <div class="card">
                    <img src="images/8-chicken-kabsa-web.jpg" alt="صورة الكبسة">
                    <h3>الكبسة</h3>
                    <p style="text-align:right">
                        الرمز الأول للمطبخ السعودي عالمياً. تتكون أساساً من الأرز طويل الحبة المطهو مع اللحم أو الدجاج،
                        وتكتسب نكهتها المميزة من خلطة بهارات الكبسة والليمون المجفف (اللومي). تقدم في الغداء والعشاء
                        وتزين بالمكسرات والزبيب.
                    </p>
                </div>

                <div class="card">
                    <img src="images/Marqooq.jpg" alt="صورة المرقوق">
                    <h3>المرقوق</h3>
                    <p style="text-align:right">
                        يعتمد هذا الطبق على عجين البر الذي يُرق حتى يصبح رقيقاً جداً، ثم يُطبخ داخل مرق اللحم والخضروات
                        حتى يتشبع بالنكهة. يختلف عن القرصان بأن العجين يوضع نيئاً ليطبخ مع المرق، مما يعطيه قواماً طرياً
                        ولذيذاً.
                    </p>
                </div>

                <div class="card">
                    <img src="images/Mansaf.jpeg" alt="صورة المنسف">
                    <h3>المنسف</h3>
                    <p style="text-align:right">
                        طبق ذو مكانة خاصة في الشمال (تبوك والجوف). يتكون من اللحم المطبوخ بالجميد (اللبن المجفف)، ويقدم
                        فوق خبز الشراك والأرز، ثم يُشرب بصلصة الجميد الكثيفة. هو رمز للكرم والضيافة البدوية الأصيلة.
                    </p>
                </div>

                <div class="card">
                    <img src="images/Mufattah.jpg" alt="صورة المفطح">
                    <h3>المفطح</h3>
                    <p style="text-align:right">
                        وليمة المناسبات الكبرى والأعياد. عبارة عن خروف كامل يُطبخ حتى يصبح اللحم طرياً جداً، ويقدم فوق
                        تلال من الأرز البشاور أو البسمتي المزين بالبيض المسلوق والمكرونة والكبدة والمكسرات والزبيب.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <section class="region-section bg-western">
        <div class="food-container">
            <h2 class="text-western">أكلات المنطقة الغربية</h2>

            <div class="food-grid">
                <div class="card">
                    <img src="images/Saleeg_food.jpg" alt="صورة السليق">
                    <h3>السليق</h3>
                    <p style="text-align:right">
                        يُلقب بـ "الريزوتو العربي". طبق حجازي (طائفي) شهير مكون من الأرز المصري المطبوخ بالحليب ومرق
                        الدجاج والسمن المستكة، مما يعطيه قواماً كريمياً أبيض. يقدم عادة مع الدجاج المحمر وسلطة الدقس
                        الحارة.
                    </p>
                </div>

                <div class="card">
                    <img src="images/Sayadiyah_food.jpeg" alt="صورة الصيادية">
                    <h3>الصيادية</h3>
                    <p style="text-align:right">
                        طبق المناطق الساحلية (جدة وينبع). يتميز بلون الأرز البني الغامق الذي يكتسبه من حمس البصل حتى
                        الاحمرار الشديد، ويطبخ مع السمك الطازج والبهارات الخاصة، ويقدم مع صلصة الحمر (التمر الهندي).
                    </p>

                </div>

                <div class="card">
                    <img src="images/Dibyaza_food.webp" alt="صورة الدبيازة">
                    <h3>الدبيازة</h3>
                    <p style="text-align:right">
                        الطبق الاحتفالي صباح العيد في مكة والمدينة. هي نوع من المربى الساخن الغني جداً، تُصنع من قمر
                        الدين (المشمش المجفف) والمكسرات المحمصة والتين والقلائد، وتُعد رمزاً للفرح والاجتماع العائلي.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <section class="region-section bg-eastern">
        <div class="food-container">
            <h2 class="text-eastern">أكلات المنطقة الشرقية</h2>

            <div class="food-grid">
                <div class="card">
                    <img src="images/Balaleet.jpg" alt="صورة البلاليط">
                    <h3>البلاليط</h3>
                    <p style="text-align:right">
                        فطور صباحي يجمع بين المالح والحلو بذكاء. يتكون من الشعيرية المحلاة بالسكر والزعفران والهيل،
                        ويعلوها قرص من البيض المقلي المالح. تشتهر جداً في الخليج والشرقية خاصة في صباح العيد.
                    </p>
                </div>

                <div class="card">
                    <img src="images/Tharid.png" alt="صورة الثريد">
                    <h3>الثريد</h3>
                    <p style="text-align:right">
                        يُعرف أيضاً بـ "التشريبة". هو عبارة عن خبز الرقاق الذي يُقطع ويُسقى بمرق اللحم والخضروات (الكوسا
                        والبطاطس) حتى يلين تماماً. طبق سهل الهضم ومحبب جداً خاصة في شهر رمضان المبارك.
                    </p>
                </div>

                <div class="card">
                    <img src="images/Sago.jpg" alt="صورة الساقو">
                    <h3>الساقو</h3>
                    <p style="text-align:right">
                        حلوى خليجية تراثية ذات قوام هلامي مميز، تُصنع من حبوب الساقو (النشا) التي تُنقع وتطبخ مع السكر
                        المحروق (الكراميل)، الزعفران، الهيل، وماء الورد، وتزين بالمكسرات.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <section class="region-section bg-southern">
        <div class="food-container">
            <h2 class="text-southern">أكلات المنطقة الجنوبية</h2>

            <div class="food-grid">
                <div class="card">
                    <img src="images/Areeka_ food.jpg" alt="صورة العريكة">
                    <h3>العريكة</h3>
                    <p style="text-align:right">
                        وجبة طاقة متكاملة، تتكون من عجينة البر المشوية والسائلة، تُعرك (تخلط) جيداً مع التمر المهروس، ثم
                        تُصب في إناء وتزين بحفرة في المنتصف تملأ بالسمن والعسل، وتزين بالتمر وحبات البركة.
                    </p>
                </div>

                <div class="card">
                    <img src="images/Mashghoutha_food.jpg" alt="صورة المشغوثة">
                    <h3>المشغوثة</h3>
                    <p style="text-align:right">
                        أكلة شتوية بامتياز توفر الدفء. قوامها يشبه الشوربة الثقيلة، وتصنع بإضافة الدقيق تدريجياً إلى
                        اللبن المغلي مع التحريك المستمر، وتقدم ساخنة مع السمن والعسل والتمر.
                    </p>
                </div>

                <div class="card">
                    <img src="images/Aseedah.jpg" alt="صورة العصيدة">
                    <h3>العصيدة</h3>
                    <p style="text-align:right">
                        كتلة متماسكة من دقيق البر المطبوخ بالماء المغلي، تحتاج لقوة بدنية في تحضيرها لضمان عدم تكتل
                        الدقيق. تقدم عادة في إناء كبير مع حفرة في الوسط للمرق واللحم، أو تقدم كتحلية مع العسل والسمن.
                    </p>
                </div>

                <div class="card">
                    <img src="images/Haneeth.jpg" alt="صورة الحنيذ">
                    <h3>الحنيذ</h3>
                    <p style="text-align:right">
                        من أقدم وألذ طرق طهي اللحم في تهامة وعسير. يتم طهي اللحم في حفرة (التنور) مبطنة بأغصان شجر المرخ
                        أو السلع، مما يمنح اللحم نكهة تدخين فريدة وقواماً طرياً جداً يتساقط من العظم.
                    </p>
                </div>

            </div>
        </div>
    </section>
    
     <section style="max-width: 1000px; margin: 3rem auto; padding: 0 1rem 4rem;">
        <h2 class="section-title">اختبر معلوماتك هنا</h2>

        <div class="main-visual-content">
            <div class="action-buttons">
                <input type="button" value="ابدأ الاختبار" onclick="window.location.href='quiz_ar.php'">
            </div>
        </div>
    </section>




    <!-- تذييل الصفحة: حقوق النشر وبيانات التواصل -->
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

    </script>
</body>

</html>