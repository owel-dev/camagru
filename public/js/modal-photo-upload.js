document.addEventListener('DOMContentLoaded', function () {
    var trigger = document.querySelector('.photo-upload-button');
    var modal = document.querySelector('.modal-photo-upload');
    var modal_form = document.querySelector('.modal-photo-upload form')

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