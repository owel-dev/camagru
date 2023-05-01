import { onModal } from "./modal.js";

document.addEventListener('DOMContentLoaded', function() {
    onModal('.auth-options-signin', '.modal-signin', '.modal-signin form');
});
