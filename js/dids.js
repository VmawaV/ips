// /js/dids.js
document.addEventListener("DOMContentLoaded", function () {
    const addDidBtn = document.getElementById("add-did-admin-btn");
    if (addDidBtn) {
        addDidBtn.addEventListener("click", function () {
            closeAllModals(); 
            document.getElementById("did-modal").style.display = "flex";
        });
    }

    const cancelDidBtn = document.getElementById("cancel-did");
    if (cancelDidBtn) {
        cancelDidBtn.addEventListener("click", function () {
            document.getElementById("did-modal").style.display = "none";
        });
    }
});