import { onToggle } from "./toggle.js";

function getCookie(name) {
    const value = "; " + document.cookie;
    const parts = value.split("; " + name + "=");
    if (parts.length === 2) return parts.pop().split(";").shift();
}

function checkLoginStatus() {
    const user = getCookie("user-name");
    const welcomeElement = document.querySelector(".welcome-message");
    const loggedInElement = document.querySelector(".logged-in");
    const loggedOutElement = document.querySelector(".logged-out");

    if (user) {
        welcomeElement.innerText = user + "님 환영합니다!";
        loggedInElement.style.display = "flex";
        loggedOutElement.style.display = "none";
    } else {
        welcomeElement.innerText = "";
        loggedInElement.style.display = "none";
        loggedOutElement.style.display = "flex";
    }
}

document.addEventListener('DOMContentLoaded', function() {
    onToggle('.user-profile-icon', '.auth-options');

    var logoutButton = document.querySelector('.auth-options-logout');
    logoutButton.addEventListener('click', function (){
        document.cookie = "user-name=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        location.reload();
    })
});

checkLoginStatus();