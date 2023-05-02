function getCookie(name) {
    const value = "; " + document.cookie;
    const parts = value.split("; " + name + "=");
    if (parts.length === 2) return parts.pop().split(";").shift();
}

function checkLoginStatus() {
    const user = getCookie("user-name");
    const welcomeElement = document.querySelector(".welcome-message");

    welcomeElement.innerText = user ? 
        welcomeElement.innerText = user + "님 환영합니다!" :
        '';
}

document.addEventListener('DOMContentLoaded', function() {
    var trigger = document.querySelector('.user-profile-icon');
    var toggle = document.querySelector('.user-profile-toggle');

    toggle.addEventListener('click', function (event) {
        event.stopPropagation();
    });

    document.addEventListener('click', function () {
        toggle.style.display = 'none';
    });

    trigger.addEventListener('click', function (event) {
        event.stopPropagation();

        if (toggle.style.display === 'none'){
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    toggle.innerHTML = xhr.responseText;
                    toggle.style.display = 'flex';
                }
            }

            var url = getCookie("user-name") ? 
                'view/include/toggle-logged-in.php' :
                'view/include/toggle-logged-out.php';
            xhr.open('GET', url, true);
            xhr.send();
        } else {
            toggle.innerHTML = '';
            toggle.style.display = 'none';
        }
    });
});

checkLoginStatus();