document.addEventListener('DOMContentLoaded', function () {
    var trigger = document.querySelector('.user-profile');
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