import { auth } from "./firebase-config.js";
import { createUserWithEmailAndPassword, signInWithEmailAndPassword, updateProfile }
    from "https://www.gstatic.com/firebasejs/10.13.0/firebase-auth.js";

// تحديد الصفحة التي يوجه اليها بعد تسجيل الدخول
let redirectPage = window.pageLang === "ar" ? "arabic.html" : "index.html";

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
            document.getElementById("message").innerText = window.pageLang === "ar"
                ? "تم إنشاء الحساب! جارٍ التحويل..."
                : "Account created! Redirecting...";
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
            document.getElementById("message").innerText = window.pageLang === "ar"
                ? "مرحباً! جارٍ التحويل..."
                : "Welcome! Redirecting...";
            setTimeout(() => window.location.href = redirectPage, 1500);
        } catch (err) {
            document.getElementById("message").innerText = err.message;
        }
    });
}
