document.addEventListener('DOMContentLoaded', function () {
    var trigger = document.querySelector('.user-profile-icon');
    var modal = document.querySelector('.auth-options');

    trigger.addEventListener('click', function (event) {
        event.stopPropagation();
        if (modal.style.display == 'none')
            modal.style.display = 'flex';
        else
            modal.style.display = 'none';
    });

    modal.addEventListener('click', function (event) {
        event.stopPropagation();
    });

    document.addEventListener('click', function () {
        modal.style.display = 'none';
    });
});

document.addEventListener('DOMContentLoaded', function () {
    var trigger = document.querySelector('.auth-options-signup');
    var modal = document.querySelector('.signup-modal');
    var modal_form = document.querySelector('.signup-modal form')

    trigger.addEventListener('click', function () {
        modal.style.display = 'flex';
    });
    modal.addEventListener('click', function () {
        modal.style.display = 'none';
    });
    modal_form.addEventListener('click', function (event) {
        event.stopPropagation();
    });
});

document.addEventListener('DOMContentLoaded', function () {
    var trigger = document.querySelector('.auth-options-signin');
    var modal = document.querySelector('.signin-modal');
    var modal_form = document.querySelector('.signin-modal form')

    trigger.addEventListener('click', function () {
        modal.style.display = 'flex';
    });
    modal.addEventListener('click', function () {
        modal.style.display = 'none';
    });
    modal_form.addEventListener('click', function (event) {
        event.stopPropagation();
    });
});