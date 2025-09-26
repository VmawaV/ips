// /js/clients.js
document.addEventListener("DOMContentLoaded", function () {
    const addClientBtn = document.getElementById("add-client-btn");
    if (addClientBtn) {
        addClientBtn.addEventListener("click", function () {
            closeAllModals();
            document.getElementById("client-modal").style.display = "flex";
        });
    }

    const cancelClientBtn = document.getElementById("cancel-client");
    if (cancelClientBtn) {
        cancelClientBtn.addEventListener("click", function () {
            document.getElementById("client-modal").style.display = "none";
        });
    }
});