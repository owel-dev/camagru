function handleLogout() {
    fetch('/view/include/logout.php', {
        method: 'POST',
        credentials: 'same-origin'
    }).then((response) => {
        if (response.status === 200){
            location.reload();
        } else {
            console.error('Logout Failed');
        }
    }).catch((error) => {
        console.error('Error: ', error);
    });
}

document.addEventListener('DOMContentLoaded', function() {
    var trigger = document.querySelector('.user-profile-icon');
    var toggle = document.querySelector('.user-profile-toggle');

    document.addEventListener('click', function () {
        toggle.style.display = 'none';
    });

    trigger.addEventListener('click', function () {
        if (toggle.style.display === 'none'){
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    toggle.innerHTML = xhr.responseText;
                    toggle.style.display = 'flex';
                }
            }
            var elements = document.getElementsByClassName('welcome-message');
            url = (elements.length > 0) ? 
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