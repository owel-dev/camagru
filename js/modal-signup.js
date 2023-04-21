document.addEventListener('DOMContentLoaded', function () {
    var userProfile = document.querySelector('.user-profile');
    var modal = document.querySelector('.modal');
    var modal_form = document.querySelector('.modal-form')

    userProfile.addEventListener('click', function () {
            modal.style.display = 'flex';
    });
    modal.addEventListener('click', function () {
            modal.style.display = 'none';
    });
    modal_form.addEventListener('click', function (event) {
            event.stopPropagation();
    });
});