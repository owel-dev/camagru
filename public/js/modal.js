function handleModal(event) {
    var modal = document.querySelector('.modal');
    var modal_div = document.querySelector('.modal-div');

    if (modal.style.display === 'none'){
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                modal_div.innerHTML = xhr.responseText;
                modal.style.display = 'flex';
            }
        }
        
        var url = `/view/include/${event.target.id}.php`;
        xhr.open('GET', url, true);
        xhr.send();
    } else {
        modal_div.innerHTML = '';
        modal.style.display = 'none';
    }
};

document.addEventListener('DOMContentLoaded', function() {
    var modal = document.querySelector('.modal');
    var modal_div = document.querySelector('.modal-div');

    modal_div.addEventListener('click', function (event) {
        event.stopPropagation();
    });

    modal.addEventListener('click', function (event) {
        event.stopPropagation();
        modal_div.innerHTML = '';
        modal.style.display = 'none';
    });
});