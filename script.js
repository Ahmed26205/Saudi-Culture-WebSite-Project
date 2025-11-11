// Toggle mobile menu functionality
function toggleMobileMenu() {
    const nav = document.querySelector('#mainHeader nav');
    nav.classList.toggle('active');
}

// Initialize mobile menu button
document.addEventListener('DOMContentLoaded', () => {
    // Create and add mobile menu button
    const header = document.getElementById('mainHeader');
    const mobileMenuBtn = document.createElement('button');
    mobileMenuBtn.className = 'mobile-menu-btn';
    mobileMenuBtn.setAttribute('aria-label', 'Toggle mobile menu');
    mobileMenuBtn.innerHTML = `
        <span></span>
        <span></span>
        <span></span>
    `;
    
    // Insert before nav
    const nav = header.querySelector('nav');
    header.insertBefore(mobileMenuBtn, nav);

    // Add click event
    mobileMenuBtn.addEventListener('click', toggleMobileMenu);

    // Close menu when clicking outside
    document.addEventListener('click', (e) => {
        const nav = document.querySelector('#mainHeader nav');
        const mobileBtn = document.querySelector('.mobile-menu-btn');
        
        if (!nav.contains(e.target) && !mobileBtn.contains(e.target) && nav.classList.contains('active')) {
            nav.classList.remove('active');
        }
    });

    // Close menu when window is resized above mobile breakpoint
    window.addEventListener('resize', () => {
        if (window.innerWidth > 768) {
            document.querySelector('#mainHeader nav').classList.remove('active');
        }
    });
});