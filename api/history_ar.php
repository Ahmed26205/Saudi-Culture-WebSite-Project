<!-- ملف صفحة التاريخ للنسخة العربية من الموقع -->
<!DOCTYPE html>
<?php
session_start();
?>
<!-- صفحة عربية باتجاه من اليمين إلى اليسار -->
<html lang="ar" dir="rtl">

<head>
    <!-- ترميز يدعم العربية -->
    <meta charset="UTF-8" />
    <!-- عرض متجاوب مع شاشات الجوال -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- عنوان التبويب في المتصفح -->
    <title>SaudiCulture - الملامح التاريخية</title>

    <!-- نفس الخطوط المستخدمة في بقية الموقع -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700&family=Almarai:wght@300;400;700&display=swap"
        rel="stylesheet" />
    <!-- ملف التنسيقات الرئيسي -->
    <link rel="stylesheet" href="CSS/styles.css" />
    <link rel="stylesheet" href="CSS/auth.css">
    <!-- ملف الجافاسكربت العام -->
    <script src="JS/script.js" defer></script>
    <link rel="icon" type="image/png" href="images/logo.png">
</head>

<body>
    <!-- شريط علوي مشترك بين الصفحات -->
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

            <button class="lang-btn" onclick="window.location.href='history.php'">EN</button>
        </div>
    </nav>
</header>

    <!-- محتوى صفحة التاريخ -->
    <main>
        <!-- مقدمة الصفحة -->
        <section class="main-visual-section">

            <div class="history-intro" style="padding: 7rem 1rem 3rem; max-width: 900px; margin: 0 auto;">
                <h1 style="text-align:center; margin-bottom:1rem;">الملامح التاريخية للمملكة العربية السعودية</h1>
                <p style="text-align:center; line-height:1.9;">
                    تمتلك المملكة تاريخاً عريقاً تشكل من خلال الحضارات القديمة، وطرق التجارة، وبزوغ الإسلام، ثم مراحل
                    توحيد البلاد
                    وبناء الدولة الحديثة.
                </p>
            </div>
            <!-- Background looping video -->
            <video autoplay muted loop playsinline class="bg-video">
                <source src="videos/history travel.mp4" type="video/mp4">
            </video>
        </section>

        <!-- قسم الخط الزمني للحقب التاريخية -->
        <h2 class="section-title">أهم الحِقب التاريخية</h2>

        <section class="history-timeline">
            <!-- الخطوة 1 -->
            <div class="timeline-item" data-step="1">
                <!-- صورة يسار / نص يمين (في RTL يظهر العكس بصرياً لكن يبقى متناسق) -->
                <div class="timeline-image">
                    <img src="images/madain salah.jpg" alt="الجزيرة العربية قبل الإسلام">
                </div>
                <div class="timeline-content">
                    <span class="era-label">ما قبل الإسلام</span>
                    <h3>الجزيرة العربية قبل الإسلام</h3>
                    <p>
                        شهدت شبه الجزيرة العربية قيام حضارات وطرق تجارة نشطة، وربطت بين الشرق والغرب عبر القوافل
                        والأسواق
                        التاريخية في مختلف المناطق.
                    </p>
                </div>
            </div>

            <!-- الخطوة 2 -->
            <div class="timeline-item" data-step="2">
                <div class="timeline-content">
                    <span class="era-label">القرن السابع الميلادي</span>
                    <h3>الحقبة الإسلامية المبكرة</h3>
                    <p>
                        انطلقت رسالة الإسلام من مكة المكرمة ثم المدينة المنورة، لتصبح المنطقة مركزاً دينياً وحضارياً
                        للعالم الإسلامي عبر القرون.
                    </p>
                </div>
                <div class="timeline-image">
                    <img src="images/after islam.jpg" alt="الحقبة الإسلامية المبكرة">
                </div>
            </div>

            <!-- الخطوة 3 -->
            <div class="timeline-item" data-step="3">
                <div class="timeline-image">
                    <img src="images/new saudi.jpeg" alt="الدول السعودية والدرعية">
                </div>
                <div class="timeline-content">
                    <span class="era-label">القرنان 18–19</span>
                    <h3>الدول السعودية</h3>
                    <p>
                        برزت الدولة السعودية الأولى ثم الثانية انطلاقاً من الدرعية والرياض، وأسهمت في ترسيخ الأمن ووحدة
                        مناطق واسعة من الجزيرة العربية.
                    </p>
                </div>
            </div>

            <!-- الخطوة 4 -->
            <div class="timeline-item" data-step="4">
                <div class="timeline-content">
                    <span class="era-label">القرن العشرون حتى اليوم</span>
                    <h3>المملكة العربية السعودية الحديثة</h3>
                    <p>
                        توحدت المملكة على يد الملك عبدالعزيز آل سعود، واستمرت في بناء دولة عصرية تجمع بين المحافظة على
                        الهوية الدينية والثقافية والانفتاح على التطور.
                    </p>
                </div>
                <div class="timeline-image">
                    <img src="images/saudia.jpg" alt="المملكة العربية السعودية الحديثة">
                </div>
            </div>
        </section>


        <!-- قسم: المناطق والمعالم التاريخية -->
        <section>
<h2 class="section-title">المعالم التاريخية المصنفة لدى هيئة التراث</h2>
     

        <section class="heritage-list">

            <!-- اللوحة 7: موقع الحِجر (مدائن صالح) -->
<article class="heritage-card">
    <div class="heritage-card-image">
        <img src="images/hegra-place.jpg" alt="موقع الحِجر">
    </div>

    <div class="heritage-card-text">
        <h3>موقع الحِجر – أول مواقع المملكة في لائحة اليونسكو</h3>

        <p>
            يُعد موقع الحِجر الأثري (مدائن صالح) أول موقع سعودي يُسجَّل رسميًا ضمن قائمة التراث العالمي
            لليونسكو، ويُعتبر أحد أهم المواقع الأثرية في شبه الجزيرة العربية لما يحتويه من شواهد حضارية
            تمتد لآلاف السنين.
        </p>

        <p>
            تعود شواهد الحياة البشرية في الحِجر إلى ما قبل الألفية الأولى قبل الميلاد، وقد اشتهر الموقع
            بأكثر من 110 مقبرة نبطية منحوتة في التكوينات الصخرية الضخمة، حيث نحتها الأنباط بعناية فائقة
            لدفن أصحاب المكانة الرفيعة في مجتمعهم، من حكّام وقادة وعسكريين وشخصيات بارزة.
        </p>

        <p>
            تظهر النقوش والكتابات النبطية على واجهات العديد من المقابر، وتكشف تفاصيل مهمة عن
            هوية الشخصيات المدفونة فيها، بما في ذلك أسماؤهم، مهنهم، وظائفهم، وحتى القوانين التي تنظّم
            عملية الدفن، مما يجعل الحِجر مصدرًا تاريخيًا مهمًا لفهم الحضارة النبطية في الجزيرة العربية.
        </p>
    </div>
</article>


            <!-- اللوحة 1: مقصورة السويلم -->
            <article class="heritage-card">
                <div class="heritage-card-image">
                    <img src="images/souq.jpg" alt="مقصورة السويلم">
                </div>
                <div class="heritage-card-text">
                    <h3>مقصورة السويلم</h3>
                    <p>
                        تُعد مقصورة السويلم جزءاً من قصر تاريخي كبير يعود بناؤه إلى بداية القرن الثالث عشر الهجري،
                        وكان لها دور بارز في تاريخ المنطقة، إذ استُخدمت لاستقبال الضيوف وإقامة المجالس والأسواق
                        الشعبية المحيطة بها.
                    </p>
                    <p>
                        تتكون المقصورة من طابقين؛ خصص الطابق الأرضي للطعام والتخزين و«قهوة السويلم» لاستقبال الضيوف،
                        بينما يضم الطابق العلوي عدداً من الغرف السكنية والفراغات الخدمية. وقد خضعت لعمليات ترميم
                        متتالية للحفاظ على طابعها المعماري النجدي لتصبح أحد أبرز المعالم التراثية في المنطقة.
                    </p>
                </div>
            </article>

            <!-- اللوحة 2: قصر شبرا -->
            <article class="heritage-card">
                <div class="heritage-card-image">
                    <img src="images/ksr-shbra-2.jpg" alt="قصر شبرا">
                </div>
                <div class="heritage-card-text">
                    <h3>قصر شبرا</h3>
                    <p>
                        يقع قصر شبرا في مدينة الطائف، وقد استغرقت عملية بنائه شهوراً متتالية من عام 1323هـ، ويُعد من
                        أبرز القصور التاريخية في المملكة. يتميز بطرازه المعماري الفريد الذي يجمع بين الطراز الحجازي
                        والعثماني.
                    </p>
                    <p>
                        يضم القصر عدداً كبيراً من الغرف والقاعات المزخرفة، كما كان مقراً للعديد من الأحداث التاريخية
                        المهمة، وتم تطويره ليصبح معلماً سياحياً ومتحفاً يعرض تاريخ المدينة والمنطقة.
                    </p>
                </div>
            </article>

            <!-- اللوحة 3: جدة التاريخية -->
<article class="heritage-card">
    <div class="heritage-card-image">
        <img src="images/Jeddah.jpg" alt="جدة التاريخية">
    </div>

    <div class="heritage-card-text">
        <h3>جدة التاريخية</h3>

        <p>
            تحتفظ منطقة جدة التاريخية بالطابع التقليدي للعمارة والذي يعتبر مزيجاً متناغماً بين المناخ 
            والتقاليد الاجتماعية للسكان. كان سور جدة، والذي تمت إزالته عام 1947م، يحتوي أبواباً عديدة 
            مثل باب مكة، وباب المدينة، وباب المغاربة، وغيرها.
        </p>

        <p>
            استخدم السكان حجر الكاشور الجيري المرجاني كمادة أساسية لبناء المنطقة، بالإضافة إلى الحجارة 
            المجلوبة من الجبال القريبة من جدة. كما كانت البيوت تتكون من عدة طوابق، حيث خُصص الطابق الأرضي 
            للضيوف واستقبالهم، بينما خُصصت الطوابق العلوية لأهل البيت.
        </p>

        <p>
            تميزت تصاميم البيوت بـ "الرواشن" التي تغطي مساحات واسعة من واجهات المباني، وتتنوع أحجامها 
            بحسب الحالة الاقتصادية لأهل المنزل. وقد ظل نمط البناء التقليدي سائداً في جدة حتى بدأ آل زينل 
            بتشييد دارهم باستخدام الإسمنت والحديد المسلح.
        </p>
    </div>
</article>
<!-- اللوحة 4: قرية الأطاولة -->
<article class="heritage-card">
    <div class="heritage-card-image">
        <img src="images/atawala.jpg" alt="قرية الأطاولة">
    </div>

    <div class="heritage-card-text">
        <h3>قرية الأطاولة</h3>

        <p>
            تقع قرية الأطاولة في محافظة القرى شمال مدينة الباحة، وتبعد عنها نحو 32 كيلومتراً،
            وتُعد من القرى التراثية التي ما زالت تحتفظ بالعديد من مبانيها القديمة ذات الطراز
            المعماري المميز.
        </p>

        <p>
            تضم القرية عدداً من المباني التراثية ذات التصميم النادر في فن البناء، من أبرزها
            حصن دماس الذي يرتفع بناؤه لأكثر من خمسة عشر متراً، كما تتكون معظم بيوت القرية من
            طابق أو طابقين، في حين تتألف الحصون من عدة طوابق شُيِّدت جدرانها باستخدام الحجارة
            المشذبة بعناية.
        </p>

        <p>
            يوجد في القرية سوق قديم كان يتوافد إليه أهالي المنطقة وما حولها للتبادل التجاري
            وبيع السلع المحلية، مما جعل الأطاولة نقطة التقاء اجتماعية وتجارية مهمة في تاريخ
            منطقة الباحة.
        </p>
    </div>
</article>


<!-- اللوحة 5: قصر المصمك -->
<article class="heritage-card">
    <div class="heritage-card-image">
        <img src="images/mosamq.jpg" alt="قصر المصمك">
    </div>

    <div class="heritage-card-text">
        <h3>قصر المصمك</h3>

        <p>
            يقع قصر المصمك في وسط مدينة الرياض، داخل أسوار دروازات الرياض القديمة، وكان يُعرف
            في الأصل باسم "قصر المسمك" نسبة إلى سماكة جدرانه وارتفاع أسواره. بني القصر في عهد
            الإمام عبدالله بن فيصل بن تركي آل سعود – طيّب الله ثراه – ويعد أحد أبرز المعالم
            الوطنية في المملكة العربية السعودية.
        </p>

        <p>
            شهد القصر معركة استرداد الرياض بقيادة جلالة الملك عبدالعزيز – طيّب الله ثراه –
            ولا يزال باب القصر يحتفظ بآثار تلك المعركة، حيث ما زال رأس حربة ابن جلوي عالقاً فيه
            حتى اليوم. ويُعد المصمك رمزاً أساسياً في تاريخ توحيد المملكة ومعلماً بارزاً للزوار.
        </p>

        <p>
            يحتوي القصر حالياً على متحف مُخصص لعرض قصة توحيد المملكة، وتم تصميمه ليضم ستة أجزاء
            رئيسية: بوابة القصر في الجهة الغربية، المسجد على يسار المدخل، المجلس (الديوانية)
            أمام المدخل، البئر في الجهة الشمالية الشرقية، الأبراج في كل ركن من أركانه الأربعة،
            والفناء الداخلي المحاط بغرف ذات أعمدة مترابطة.
        </p>

        <p>
            كما ضم القصر ثلاث وحدات سكنية؛ الأولى خصصت لسكن الحاكم، والثانية كانت بيتاً للمال،
            والثالثة لإقامة الضيوف، مما يجعله نموذجاً فريداً من العمارة النجدية التراثية.
        </p>
    </div>
</article>

<!-- اللوحة 6: قلعة أعيرف -->
<article class="heritage-card">
    <div class="heritage-card-image">
        <img src="images/aref qasle.jpg" alt="قلعة أعيرف">
    </div>

    <div class="heritage-card-text">
        <h3>قلعة أعيرف</h3>

        <p>
            تقع قلعة أعيرف في وسط مدينة حائل على قمّة جبل مرتفع يشرف على المنطقة بالكامل،
            وتعدّ واحدة من أبرز مواقع التراث العمراني في المنطقة الشمالية.
        </p>

        <p>
            تميّزت القلعة بموقعها الاستراتيجي الذي جعلها نقطة مراقبة وحماية، حيث كان يتم
            الاستفادة من ارتفاع الجبل لرصد التحركات في محيط المدينة. وقد استخدمت القلعة
            على مرّ التاريخ لأغراض دفاعية وإدارية.
        </p>

        <p>
            تُعد القلعة اليوم رمزاً تراثياً مهماً يعكس فن العمارة التقليدية في حائل،
            وتستقطب الزوار والمهتمين بتاريخ المنطقة، كما يقام حولها عدد من الفعاليات
            والأنشطة الثقافية والسياحية.
        </p>
    </div>
</article>


        </section>


        <!-- قسم: معلومات سريعة "هل تعلم؟" -->
        <section style="max-width: 1000px; margin: 3rem auto; padding: 0 1rem 4rem;">
            <h2 class="section-title">هل تعلم؟</h2>
            <ul style="line-height: 1.9;">
                <li>تعد بعض مناطق المملكة من أقدم الممرات التجارية في شبه الجزيرة العربية.</li>
                <li>الدرعية مسجلة كموقع تراث عالمي في اليونسكو بسبب أهميتها التاريخية.</li>
                <li>مكة والمدينة استقبلتا الحجاج والزوار من مختلف أنحاء العالم عبر قرون طويلة.</li>
                <li>هل تعلم أن مدينة العُلا تعد من أقدم المستوطنات البشرية في الجزيرة العربية، وموطن حضارة دادان ولحيان؟</li>

<li>هل تعلم أن مدائن صالح (الحِجر) هي أول موقع سعودي يُسجّل في قائمة اليونسكو للتراث العالمي؟</li>

<li>هل تعلم أن طريق البخور التاريخي كان يمتد من جنوب الجزيرة العربية حتى البحر الأبيض المتوسط؟</li>

<li>هل تعلم أن الدرعية تُعدّ مهد الدولة السعودية الأولى، وأن حي الطريف فيها مسجّل في اليونسكو؟</li>

<li>هل تعلم أن قصر سلوى في الدرعية تبلغ مساحته أكثر من 10,000 متر مربع وكان يعد أهم مباني الحكم في الدولة السعودية الأولى؟</li>

<li>هل تعلم أن قلعة تبوك يعود تاريخها إلى أكثر من 350 سنة، وكانت محطة مهمة على طريق الحج الشامي؟</li>

<li>هل تعلم أن قرية ذي عين التراثية بُنيت قبل نحو 400 سنة وتشتهر ببيوتها الحجرية البيضاء ونخيلها الطبيعي؟</li>

<li>هل تعلم أن سوق عكاظ كان أهم أسواق العرب قبل الإسلام، ومركزاً أدبياً تُقدم فيه الخطب والقصائد؟</li>

<li>هل تعلم أن واحة الأحساء هي أكبر واحة نخيل طبيعية في العالم ومسجلة ضمن اليونسكو؟</li>

<li>هل تعلم أن ميناء جدة التاريخي كان أهم منفذ بحري للحجاج والتجار القادمين إلى الحجاز منذ مئات السنين؟</li>

<li>هل تعلم أن قلعة أعيرف في حائل كانت تستخدم كنقطة مراقبة استراتيجية تُشرف على المدينة من أعلى الجبل؟</li>

<li>هل تعلم أن قرية الأطاولة تُعد واحدة من أقدم القرى التراثية في منطقة الباحة وتضم حصوناً عمرانية نادرة؟</li>

<li>هل تعلم أن قصر المصمك كان نقطة البداية لتوحيد المملكة العربية السعودية على يد الملك عبدالعزيز رحمه الله؟</li>

            </ul>
        </section>
    </main>

    <section style="max-width: 1000px; margin: 3rem auto; padding: 0 1rem 4rem;">
        <h2 class="section-title">اختبر معلوماتك هنا</h2>

        <div class="main-visual-content">
            <div class="action-buttons">
                <input type="button" value="ابدأ الاختبار" onclick="window.location.href='quiz_ar.php'">
            </div>
        </div>
    </section>

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

    <!-- سكربت تغيير خلفية الهيدر عند التمرير -->
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