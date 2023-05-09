function handleModal(event) {
    var modal = document.querySelector('.modal');
    var modal_div = document.querySelector('.modal-div');

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            modal.style.display = 'flex';
            modal_div.innerHTML = xhr.responseText;
        }
    }
    var url = `/view/include/${event.target.id}.php`;
    xhr.open('GET', url, true);
    xhr.send(); 
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