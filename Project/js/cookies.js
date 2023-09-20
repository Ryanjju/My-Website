document.addEventListener("DOMContentLoaded", function() {
    const loginForm = document.getElementById("login-form");
    const usernameInput = loginForm.querySelector('[name="username"]');

    usernameInput.addEventListener("input", function() {
        localStorage.setItem("username", usernameInput.value);
    });

    const storedUsername = localStorage.getItem("username");

    if (storedUsername) {
        usernameInput.value = storedUsername;
    }
});

window.addEventListener("load", function() {
    const cookieBox = document.getElementById("cookie-box");
    const acceptCookies = document.getElementById("accept-cookies");

    if (!getCookie("accepted-cookies") && !getCookie("remember_login")) {
        cookieBox.style.display = "block";
    } else {
        cookieBox.style.display = "none";
    }

    acceptCookies.addEventListener("click", function() {
        setCookie("accepted-cookies", "true", 365);
        cookieBox.style.display = "none";
    });

    if (getCookie("remember_login")) {
        const usernameInput = document.querySelector('#login-form [name="username"]');
        const passwordInput = document.querySelector('#login-form [name="password"]');
        const submitButton = document.querySelector('#login-form [type="submit"]');

        const storedUsername = getCookie("remember_login_username");
        const storedPassword = getCookie("remember_login_password");

        if (storedUsername && storedPassword) {
            usernameInput.value = storedUsername;
            passwordInput.value = storedPassword;
            submitButton.click();
        }
    }
});

function getCookie(name) {
    if (!document.cookie) {
        return null;
    }

    const cookies = document.cookie.split("; ");
    for (const cookie of cookies) {
        const [cookieName, cookieValue] = cookie.split("=");
        if (decodeURIComponent(cookieName) === name) {
            return decodeURIComponent(cookieValue);
        }
    }
    return null;
}

function setCookie(name, value, days) {
    const date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    const expires = `expires=${date.toUTCString()}`;
    document.cookie = `${encodeURIComponent(name)}=${encodeURIComponent(value)};${expires};path=/`;
}
