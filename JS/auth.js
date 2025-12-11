import { auth } from "./firebase-config.js";
import { createUserWithEmailAndPassword, signInWithEmailAndPassword, updateProfile }
    from "https://www.gstatic.com/firebasejs/10.13.0/firebase-auth.js";

// تحديد الصفحة التي يوجه اليها بعد تسجيل الدخول (الصفحة الرئيسية الصحيحة)
let redirectPage;
// نحدد الصفحة بناءً على لغة الصفحة التي يتم فيها التسجيل/الدخول
if (document.querySelector('html').getAttribute('lang') === 'ar') {
    redirectPage = "arabic.html";
} else {
    redirectPage = "index.html";
}

// انشاء حساب
const signupForm = document.getElementById("signupForm");
if (signupForm) {
    signupForm.addEventListener("submit", async (e) => {
        e.preventDefault();
        const name = document.getElementById("name").value;
        const email = document.getElementById("email").value;
        const pass = document.getElementById("password").value;

        try {
            const userCredential = await createUserWithEmailAndPassword(auth, email, pass);
            await updateProfile(userCredential.user, { displayName: name });

            // استخدام اللغة بناءً على الـ redirectPage
            const messageText = redirectPage === "arabic.html"
                ? "تم إنشاء الحساب! جارٍ التحويل..."
                : "Account created! Redirecting...";

            document.getElementById("message").innerText = messageText;
            setTimeout(() => window.location.href = redirectPage, 1500);
        } catch (err) {
            document.getElementById("message").innerText = err.message;
        }
    });
}

// تسجيل الدخول
const loginForm = document.getElementById("loginForm");
if (loginForm) {
    loginForm.addEventListener("submit", async (e) => {
        e.preventDefault();
        const email = document.getElementById("email").value;
        const pass = document.getElementById("password").value;

        try {
            await signInWithEmailAndPassword(auth, email, pass);

            // استخدام اللغة بناءً على الـ redirectPage
            const messageText = redirectPage === "arabic.html"
                ? "مرحباً! جارٍ التحويل..."
                : "Welcome! Redirecting...";

            document.getElementById("message").innerText = messageText;
            setTimeout(() => window.location.href = redirectPage, 1500);
        } catch (err) {
            document.getElementById("message").innerText = err.message;
        }
    });
}