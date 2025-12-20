<!-- ملف الفنون HTML  للواجهة العربية لموقع SaudiCulture -->
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

            <button class="lang-btn" onclick="window.location.href='arts.php'">EN</button>
        </div>
    </nav>
</header>


    <section class="main-visual-section">
        <video autoplay muted loop playsinline class="bg-video">
            <source src="videos/Arts_vid.mp4" type="video/mp4">
        </video>

        <div class="main-visual-content">
            <div style="padding: 7rem 1rem 3rem; max-width: 596px; margin: 0 auto;">
                <h1 style="text-align:center; margin-bottom:1rem;">الفنون التقليدية في المملكة العربية السعودية</h1>
                <p style="text-align:center; line-height:1.7;">هنا يمكنك استكشاف فنوننا التقليدية والتعرف عليها</p>
            </div>
        </div>
    </section>

    <section>
        <h2 style="text-align: center; margin-top: 40px;">معرض الفنون التقليدية</h2>
    </section>

    <div class="arts-container">

        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="images/Al-Fajari_art.jpg" alt="الفجري هو فن غناء بحري تقليدي">
                </div>
                <div class="flip-card-back">
                    <h3>فن الفجري</h3>
                    <p>الفجري هو نوع من الغناء البحري التقليدي وفن شعبي قديم اشتهر في دول الخليج العربي. يستمد اسمه من
                        آلة "الفجري" أو "الجحل" الفخارية، وهي الأداة الأساسية المستخدمة في أداء هذا الفن.</p>
                </div>
            </div>
        </div>

        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="images/Al_Qatt al_Asiri_art.jpg"
                        alt="القط العسيري فن تقليدي للنقش والزخرفة في منطقة عسير">
                </div>
                <div class="flip-card-back">
                    <h3>القط العسيري</h3>
                    <p>القط العسيري هو فن تقليدي للنقش والزخرفة في منطقة عسير جنوب غرب المملكة العربية السعودية. يعتمد
                        على رسم أشكال هندسية ونباتية باستخدام الألوان الأساسية مباشرة على الجدران الداخلية للمنازل
                        ومناطق الاستقبال.</p>
                </div>
            </div>
        </div>

        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="images/Majas Art.jpg" alt="فن المجس هو شكل من أشكال الغناء الشعبي الحجازي التقليدي">
                </div>
                <div class="flip-card-back">
                    <h3>فن المجس</h3>
                    <p>فن المجس هو شكل من أشكال الغناء الشعبي الحجازي التقليدي القديم. عُرف في البداية بإنشاد الرعاة، ثم
                        تطور ليسمى الإنشاد المتقن، وتطور لاحقاً ليشمل المقامات، حتى أصبح يُعرف أخيراً باسم المجس.</p>
                </div>
            </div>
        </div>

        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="images/الصحاف.jpg" alt="vessel carved from the wood ">
                </div>
                <div class="flip-card-back">
                    <h3>الصِّحاف</h3>
                    <p>صناعة الصِّحاف في السعودية، هي مهنة تتميز بها مناطق وقرى جنوب المملكة العربية السعودية، والصحاف جمع صحفة، وهي إناء منحوت من خشب شجرة الغرب، دائري الشكل، يوضع الطعام فيه للأكل، وتستخدم في المناسبات كالزواج، حيث كان الرجل لا يتزوج إلا إذا كانت الصحاف في بيته، وهي من مستلزمات البيت الضرورية.</p>
                </div>
            </div>
        </div>

        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="images/السدو.jpg" alt="حرفة تقليدية">
                </div>
                <div class="flip-card-back">
                    <h3>السدو</h3>
                    <p>نشأت حرفة السدو التقليدية بين القبائل العربية في شبه الجزيرة العربية القديمة. ساهمت تقنيات الحرف
                        اليدوية في المملكة في نموها لتصبح واحدة من أشهر الفنون التقليدية في تاريخ المملكة. يتم الاحتفاء
                        بها الآن إعلامياً وتعد من عوامل الجذب الشهيرة في المهرجانات التراثية والثقافية.</p>
                </div>
            </div>
        </div>

        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="images/Pottery.jpeg" alt="حرفة تقليدية">
                </div>
                <div class="flip-card-back">
                    <h3>فخار دوغة</h3>
                    <p>مصنع دوغة للفخار في الأحساء هو أحد أقدم مراكز الحرف التقليدية في المملكة العربية السعودية، حيث
                        يمتد تاريخه لأكثر من 600 عام. يقف شاهداً حياً على التراث الثقافي العميق للمنطقة وبراعة الأجيال
                        التي أتقنت فن صناعة الفخار.</p>
                </div>
            </div>
        </div>

        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="images/Al_Khoos.jpeg" alt="نسيج النخيل المعروف بالخوص">
                </div>
                <div class="flip-card-back">
                    <h3>الخوص</h3>
                    <p>نسيج النخيل، المعروف باسم الخوص، هو أحد أقدم الحرف اليدوية في المملكة، حيث يمارسه الحرفيون في
                        واحة الأحساء - موطن أكبر واحة نخيل في العالم وموقع التراث العالمي لليونسكو.</p>
                </div>
            </div>
        </div>

        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="images/Mud_Houses.jpg" alt="البيوت الطينية">
                </div>
                <div class="flip-card-back">
                    <h3>البيوت الطينية</h3>
                    <p>تعكس البيوت الطينية في المملكة العربية السعودية أحد أقدم المفاهيم المعمارية التي بنيت عليها
                        المنازل والحصون والقصور. تعتمد هذه الإنشاءات على استخدام الطين، وهو مادة شائعة في معظم عمليات
                        البناء. يستخدم الطين للجدران الداخلية والخارجية ويعمل كمادة رابطة بين القواعد الحجرية، ويخلط مع
                        التبن لمنع التشقق.</p>
                </div>
            </div>
        </div>

        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="images/Rose_Cultivation.jpg" alt="الورود">
                </div>
                <div class="flip-card-back">
                    <h3>زراعة الورد</h3>
                    <p>تعد زراعة الورد في المملكة العربية السعودية من الزراعات المنتشرة، بدءاً من مرحلة غرس الشتلات
                        وصولاً
                        إلى تصنيع منتجات الورد النهائية، مثل العطور والزيوت العطرية.</p>
                </div>
            </div>
        </div>

        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="images/Al-Qallaleef.jpeg" alt="سفن خشبية تقليدية">
                </div>
                <div class="flip-card-back">
                    <h3>القلاليف</h3>
                    <p>القلاليف هي حرفة صناعة السفن الخشبية التقليدية في المنطقة الشرقية من المملكة العربية السعودية.
                        تعتبر جزءاً من مهنة النجارة، ويسمى الحرفي الماهر في هذه التجارة "القلاف". كانت السفن تُصنع
                        بأحجام صغيرة ومتوسطة لتناسب الإبحار في الخليج العربي، واستخدمها البحارة للنقل البحري والتجارة
                        ورحلات الغوص للبحث عن اللؤلؤ الطبيعي.</p>
                </div>
            </div>
        </div>

        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="images/Mishlah.jpg" alt="بشت تقليدي">
                </div>
                <div class="flip-card-back">
                    <h3>البشت</h3>
                    <p>البشت أو المشلح هو أحد الأسماء المحلية للعباءة العربية التقليدية. هو رداء خارجي فضفاض مفتوح من
                        الأمام ويحمل دلالات ثقافية واجتماعية في الخليج والمناطق العربية. يرتديه الناس عادة خلال
                        المناسبات الخاصة والاحتفالات والأعياد.</p>
                </div>
            </div>
        </div>

        <div class="flip-card">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="images/the Rababah.jpg" alt="الربابة آلة موسيقية بدائية">
              </div>
              <div class="flip-card-back">
                <h3>الربابة</h3>
                <p>تُعد الربابة آلة موسيقية بدائية، عُرفت تاريخياً في المناطق الشمالية من المملكة العربية السعودية. وقد كانت رفيقاً للبدو أثناء تجمعاتهم واحتفالاتهم. وحتى يومنا هذا، تظل الربابة جزءاً لا يتجزأ من ثقافة الموسيقى الشعبية في المهرجانات والاحتفالات الوطنية داخل المملكة وخارجها.</p>
              </div>
            </div>
        </div>

        
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="images/الدباغة .jpeg" alt="جلدة">
                </div>
                <div class="flip-card-back">
                    <h3>الدباغة</h3>
                    <p>حرفة الدباغة هي عملية تحويل جلد الحيوان بعد سلخه إلى منتج (الجلود) الذي يستخدم في صناعة أدوات متعددة، وتعدّ الماشية هي المصدر الرئيسي للجلود، وعملية الدباغة تحفظ الجلد من التعفن وتعطيه مرونة ومتانة.</p>
                </div>
            </div>
        </div>

        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="images/السبح.jpg" alt=" السُّبَح">
                </div>
                <div class="flip-card-back">
                    <h3>صناعة السُّبَح</h3>
                    <p>صناعة السُّبَح في السعودية، هي إحدى المهن التاريخية في المملكة العربية السعودية، اشتُهرت في عدد من مناطقها، خاصة منطقتي مكة المكرمة والمدينة المنورة، كانت تختص بجمع حبات الخرَز، بعد استخراج موادها الأولية من الأشجار أو من بعض الأحجار الكريمة، ثم نظمها في خيوطٍ مخصصة لذلك، وتعد هذه الصناعة من المهن التي تستلزم المهارة والدقة لدى من يمارسونها، الذين عُرفوا بـ"السُّبَحِيّة".</p>
                </div>
            </div>
        </div>

        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="images/Saudi_Arabia-_Sword.jpg" alt="خنجر سعودي">
                </div>
                <div class="flip-card-back">
                    <h3>الخنجر السعودي</h3>
                    <p>خنجر سعودي أو جنبية سعودية هو نوع من الخناجر العربية، التي تُصنع في مناطق المملكة العربية السعودية تُصنع الخناجر بشكل تقليدي في مناطق الجنوبية للسعودية. والأحساء. وتكون بعضها مقوسة ومستقيمة. يعد الخنجر السعودي أو الجنبية من أهم الرموز الثقافية السعودية، حيث يستخدم في الأعراس والمناسبات الوطنية في نجران.</p>
                </div>
            </div>
        </div>



    </div>


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

</body>

</html>