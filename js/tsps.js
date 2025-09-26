// /js/tsps.js
document.addEventListener("DOMContentLoaded", function () {
    const addTspBtn = document.getElementById("add-tsp-btn");
    if (addTspBtn) {
        addTspBtn.addEventListener("click", function () {
            closeAllModals();
            document.getElementById("tsp-modal").style.display = "flex";
        });
    }

    const cancelTspBtn = document.getElementById("cancel-tsp");
    if (cancelTspBtn) {
        cancelTspBtn.addEventListener("click", function () {
            document.getElementById("tsp-modal").style.display = "none";
        });
    }
});