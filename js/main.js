// /js/main.js 

document.addEventListener("DOMContentLoaded", function () {

  const loginBtn = document.getElementById("login-btn");
  if (loginBtn) {
    loginBtn.addEventListener("click", function () {
      const username = document.getElementById("username").value;
      const password = document.getElementById("password").value;

      if (username && password) {
        window.location.href = '/pages/dashboard.php';
      } else {
        alert("Por favor completa todos los campos");
      }
    });
  }

  const logoutBtn = document.getElementById("logout-btn");
  if (logoutBtn) {
    logoutBtn.addEventListener("click", function () {
      window.location.href = '/index.php';
    });
  }

  const menuToggle = document.getElementById("menu-toggle");
  const sidebar = document.getElementById("sidebar");
  if (menuToggle && sidebar) {
    menuToggle.addEventListener("click", function () {
      sidebar.classList.toggle("active");
    });
  }


  const modalCloseButtons = document.querySelectorAll(".modal-close");
  modalCloseButtons.forEach((button) => {
    button.addEventListener("click", function () {
      this.closest(".modal-backdrop").style.display = "none";
    });
  });

  const modals = document.querySelectorAll(".modal-backdrop");
  modals.forEach((modal) => {
    modal.addEventListener("click", function (e) {
      if (e.target === this) {
        this.style.display = "none";
      }
    });
  });

  const filterButtons = document.querySelectorAll(".btn-primary:not(#login-btn)");
  filterButtons.forEach((button) => {
    if (button.textContent.includes("Filtrar") || button.textContent.includes("Generar") || button.textContent.includes("Buscar")) {
      button.addEventListener("click", function () {
        console.log("Filtro aplicado: ", this.textContent);
        alert("Función de filtro ejecutada (demo)");
      });
    }
  });

  const exportButtons = document.querySelectorAll(".btn-primary:not(#login-btn)");
  exportButtons.forEach((button) => {
    if (button.textContent.includes("Exportar") || button.textContent.includes("Imprimir")) {
      button.addEventListener("click", function (e) {
        e.preventDefault();
        console.log("Exportar/Imprimir: ", this.textContent);
        alert("Función de exportación ejecutada (demo)");
      });
    }
  });

});


function toggleClients(element) {
  const clientsList = element.nextElementSibling;
  const icon = element.querySelector("i");
  clientsList.classList.toggle("expanded");
  icon.classList.toggle("fa-chevron-up");
  icon.classList.toggle("fa-chevron-down");
}

function toggleSubmenu(menuId) {
  const submenu = document.getElementById(menuId);
  const chevron = document.getElementById(menuId + "-chevron");
  submenu.classList.toggle("expanded");
  chevron.classList.toggle("fa-chevron-up");
  chevron.classList.toggle("fa-chevron-down");
}

function closeAllModals() {
  const modals = document.querySelectorAll(".modal-backdrop");
  modals.forEach((modal) => {
    modal.style.display = "none";
  });
}

function confirmDelete(type) {
  if (confirm(`¿Estás seguro de que deseas eliminar este ${type}?`)) {
    console.log(`${type} eliminado (demo)`);
    alert(`${type} eliminado correctamente (demo)`);
  }
}