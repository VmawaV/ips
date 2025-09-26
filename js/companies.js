// /js/companies.js
document.addEventListener("DOMContentLoaded", function () {
    const addCompanyBtn = document.getElementById("add-company-btn");
    if (addCompanyBtn) {
        addCompanyBtn.addEventListener("click", function () {
            closeAllModals();
            document.getElementById("company-modal").style.display = "flex";
        });
    }

    const cancelCompanyBtn = document.getElementById("cancel-company");
    if (cancelCompanyBtn) {
        cancelCompanyBtn.addEventListener("click", function () {
            document.getElementById("company-modal").style.display = "none";
        });
    }
});