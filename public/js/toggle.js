export function onToggle(triggerSelector, toggleSelector) {
    var trigger = document.querySelector(triggerSelector);
    var toggle = document.querySelector(toggleSelector);

    trigger.addEventListener('click', function (event) {
        event.stopPropagation();
        if (toggle.style.display == 'none')
            toggle.style.display = 'flex';
        else
            toggle.style.display = 'none';
    });

    toggle.addEventListener('click', function (event) {
        event.stopPropagation();
    });

    document.addEventListener('click', function () {
        toggle.style.display = 'none';
    });    
}