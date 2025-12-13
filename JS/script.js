// Toggle mobile menu functionality
function toggleMobileMenu() {
    const nav = document.querySelector('#mainHeader nav');
    nav.classList.toggle('active');
}

// Initialize mobile menu button
document.addEventListener('DOMContentLoaded', () => {

    const header = document.getElementById('mainHeader');
    const mobileMenuBtn = document.createElement('button');
    mobileMenuBtn.className = 'mobile-menu-btn';
    mobileMenuBtn.setAttribute('aria-label', 'Toggle mobile menu');
    mobileMenuBtn.innerHTML = `
        <span></span>
        <span></span>
        <span></span>
    `;

    // Insert button before nav
    const nav = header.querySelector('nav');
    header.insertBefore(mobileMenuBtn, nav);

    // Add click event
    mobileMenuBtn.addEventListener('click', toggleMobileMenu);

    // Close menu when clicking outside
    document.addEventListener('click', (e) => {
        if (!nav.contains(e.target) &&
            !mobileMenuBtn.contains(e.target) &&
            nav.classList.contains('active')) {

            nav.classList.remove('active');
        }
    });

    // Show/Hide the button depending on screen size
    function handleMenuDisplay() {
        if (window.innerWidth > 768) {
            mobileMenuBtn.style.display = "none";   // إخفاء الزر
            nav.classList.remove('active');         // إغلاق القائمة
        } else {
            mobileMenuBtn.style.display = "block";  // إظهار الزر
        }
    }

    // Apply at load
    handleMenuDisplay();

    // Apply when resizing window
    window.addEventListener('resize', handleMenuDisplay);
});

// Toggle top search bar visibility
function toggleTopSearch() {
    const bar = document.getElementById("topSearchBar");
    bar.style.display = bar.style.display === "block" ? "none" : "block";
}

function toggleTopSearch() {
  const searchBar = document.getElementById("topSearchBar");
  if (!searchBar) return;

  const isOpen = searchBar.style.display === "block";
  searchBar.style.display = isOpen ? "none" : "block";

  if (!isOpen) {
    const input = document.getElementById("siteSearchInput");
    if (input) input.focus();
  }
}

// ====== Search inside ALL sections on the current page ======
// ====== 1) Create stable IDs for sections on EVERY page ======
function slugify(text) {
  return (text || "")
    .toString()
    .trim()
    .toLowerCase()
    .replace(/[\u064B-\u065F]/g, "")           // remove Arabic tashkeel
    .replace(/[^\w\u0600-\u06FF]+/g, "-")      // keep arabic/word chars, others -> -
    .replace(/-+/g, "-")
    .replace(/^-|-$/g, "");
}

function assignSearchIds(root = document) {
  const blocks = root.querySelectorAll(
    "section, article, .card, .heritage-card, .timeline-item, .traditions-item, .flip-card"
  );

  blocks.forEach((el, i) => {
    // pick a title for the block (most of your content uses h2/h3 inside cards/sections)
    const h = el.querySelector("h2, h3, h4");
    if (!h) return;

    if (!el.id) {
      const base = slugify(h.textContent) || `sec-${i}`;
      el.id = base;
    }
  });
}

// Run on current page so it can be jumped-to by hash
document.addEventListener("DOMContentLoaded", () => {
  assignSearchIds(document);

  // If we arrived with #hash, scroll after IDs are created
  if (location.hash) {
    const id = location.hash.slice(1);
    const target = document.getElementById(id);
    if (target) target.scrollIntoView({ behavior: "smooth", block: "start" });
  }
});


// ====== 2) Global search (all pages) -> go to page + section ======
document.addEventListener("DOMContentLoaded", async () => {
  const topBar = document.getElementById("topSearchBar");
  if (!topBar) return;

  const input = topBar.querySelector("input");
  const box = document.getElementById("topSearchSuggestions");
  if (!input || !box) return;

  // Add your pages here (EN + AR). You already have these pages like history/traditions/food/arts. :contentReference[oaicite:0]{index=0} :contentReference[oaicite:1]{index=1} :contentReference[oaicite:2]{index=2}
  const pages = [
    "history.php", "traditions.php", "food.php", "arts.php",
    "history_ar.php", "traditions_ar.php", "food_ar.php", "arts_ar.php"
  ];

  const index = [];

  for (const url of pages) {
    try {
      const res = await fetch(url);
      const html = await res.text();
      const doc = new DOMParser().parseFromString(html, "text/html");

      // Create IDs inside fetched doc (same logic as real pages)
      assignSearchIds(doc);

      const blocks = doc.querySelectorAll(
        "section, article, .card, .heritage-card, .timeline-item, .traditions-item, .flip-card"
      );

      blocks.forEach((el) => {
        const h = el.querySelector("h2, h3, h4");
        if (!h || !el.id) return;

        const title = h.textContent.trim();
        const text = (el.textContent || "").replace(/\s+/g, " ").trim();

        if (title.length < 2) return;

        index.push({
          title,
          text,
          url,
          id: el.id
        });
      });
    } catch (e) {
      // ignore missing pages in local server
    }
  }

  let activeIndex = -1;
  let current = [];

  function normalize(s) {
    return (s || "").toLowerCase().trim();
  }

  function snippet(text, q) {
    const t = text;
    const pos = normalize(t).indexOf(normalize(q));
    if (pos === -1) return t.slice(0, 120) + (t.length > 120 ? "..." : "");
    const start = Math.max(0, pos - 35);
    const end = Math.min(t.length, pos + 85);
    return (start ? "..." : "") + t.slice(start, end) + (end < t.length ? "..." : "");
  }

  function hide() {
    box.classList.remove("show");
    box.innerHTML = "";
    activeIndex = -1;
    current = [];
  }

  function render(results, q) {
    current = results.slice(0, 8);
    activeIndex = -1;

    if (!q || !current.length) return hide();

    box.innerHTML = current.map((r, i) => `
      <div class="item" data-idx="${i}">
        <div class="title">${r.title}</div>
        <div class="snippet">${snippet(r.text, q)}</div>
      </div>
    `).join("");

    box.classList.add("show");
  }

  function search(q) {
    const query = normalize(q);
    if (!query) return [];
    return index.filter(item =>
      normalize(item.title).includes(query) || normalize(item.text).includes(query)
    );
  }

  function goTo(i) {
    const r = current[i];
    if (!r) return;

    // ✅ go to exact section: page#id
    window.location.href = `${r.url}#${r.id}`;
  }

  // typing -> show suggestions
  input.addEventListener("input", () => {
    render(search(input.value), input.value);
  });

  // click on suggestion -> go to section
  box.addEventListener("click", (e) => {
    const item = e.target.closest(".item");
    if (!item) return;
    goTo(Number(item.dataset.idx));
  });

  // keyboard navigation
  input.addEventListener("keydown", (e) => {
    if (!box.classList.contains("show")) return;

    const items = Array.from(box.querySelectorAll(".item"));
    if (!items.length) return;

    if (e.key === "ArrowDown") {
      e.preventDefault();
      activeIndex = Math.min(activeIndex + 1, items.length - 1);
    } else if (e.key === "ArrowUp") {
      e.preventDefault();
      activeIndex = Math.max(activeIndex - 1, 0);
    } else if (e.key === "Enter") {
      e.preventDefault();
      if (activeIndex >= 0) return goTo(activeIndex);
      return goTo(0);
    } else if (e.key === "Escape") {
      hide();
      return;
    } else {
      return;
    }

    items.forEach((it, idx) => it.classList.toggle("active", idx === activeIndex));
  });

  // close when clicking outside
  document.addEventListener("click", (e) => {
    if (topBar.contains(e.target)) return;
    hide();
  });
});


document.addEventListener("DOMContentLoaded", () => {
  const isRTL = document.documentElement.dir === "rtl";

  /* ==== Poets Swiper (Each poet shows and hides one after the other) ==== */
  if (document.querySelector(".poets-swiper")) {
    new Swiper(".poets-swiper", {
      loop: true,
      spaceBetween: 24,
      effect: "fade",  // For fade effect
      autoplay: {
        delay: 3000,  // Change every 2 seconds
        disableOnInteraction: false,  // Continue autoplay even when user interacts
      },
      pagination: {
        el: ".poets-swiper .swiper-pagination",
        clickable: true,
      },
    });
  }

  /* ==== Regions Swiper (Auto scroll every 2 seconds) ==== */
  if (document.querySelector(".regions-swiper")) {
  new Swiper(".regions-swiper", {
  loop: true,
  spaceBetween: 20,

  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },

  breakpoints: {
    0:    { slidesPerView: 2 },   // جوال
    600:  { slidesPerView: 3 },   // تابلت
    900:  { slidesPerView: 4 },   // لابتوب
    1200: { slidesPerView: 5  }    // شاشة كبيرة
  },

      pagination: {
        el: ".regions-swiper .swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".regions-swiper .swiper-button-next",
        prevEl: ".regions-swiper .swiper-button-prev",
      },
    });
  }
});