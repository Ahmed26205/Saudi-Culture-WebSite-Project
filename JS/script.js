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