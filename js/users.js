// /js/users.js
document.addEventListener("DOMContentLoaded", function () {
    const addUserBtn = document.getElementById("add-user-btn");
    if (addUserBtn) {
        addUserBtn.addEventListener("click", function () {
            closeAllModals();
            document.getElementById("user-modal").style.display = "flex";
        });
    }

    const cancelUserBtn = document.getElementById("cancel-user");
    if (cancelUserBtn) {
        cancelUserBtn.addEventListener("click", function () {
            document.getElementById("user-modal").style.display = "none";
        });
    }
});