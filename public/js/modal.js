export function onModal(triggerSelector, modalSelector, modalFormSelector) {
    var trigger = document.querySelector(triggerSelector);
    var modal = document.querySelector(modalSelector);
    var modalForm = document.querySelector(modalFormSelector);

    trigger.addEventListener('click', function (event) {
        event.stopPropagation();
        if (modal.style.display == 'none')
            modal.style.display = 'flex';
        else
            modal.style.display = 'none';
    });

    modal.addEventListener('click', function (event) {
        event.stopPropagation();
        modal.style.display = 'none';
    });

    modalForm.addEventListener('click', function (event) {
        event.stopPropagation();
    });
}