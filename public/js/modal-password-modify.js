document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('form-password-find');
    const formError = document.getElementById('form-password-find-error');

    form.addEventListener('submit', (e) => {
        e.preventDefault();

        const formNameInput = form.elements['form-name'];
        const formNameValue= formNameInput.value;

        const xhr = new XMLHttpRequest();
        xhr.open('GET', `/view/include/modal-password-mofidy.php?form-name=${formNameValue}`, true);

        xhr.onload = () => {
            if (xhr.status >= 200 && xhr.status < 400) {
                form.remove();
            } else {
                formError.innerHTML = "올바르지 않은 아이디입니다!";
            }
        }
    });
});