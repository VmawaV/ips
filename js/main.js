document.addEventListener("DOMContentLoaded", function () {
  // Login functionality
  document.getElementById("login-btn").addEventListener("click", function () {
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    if (username && password) {
      document.getElementById("login-screen").style.display = "none";
      document.getElementById("app").style.display = "flex";
    } else {
      alert("Por favor completa todos los campos");
    }
  });

  // Logout functionality
  document.getElementById("logout-btn").addEventListener("click", function () {
    document.getElementById("login-screen").style.display = "flex";
    document.getElementById("app").style.display = "none";
  });

  // Toggle sidebar on mobile
  const menuToggle = document.getElementById("menu-toggle");
  const sidebar = document.getElementById("sidebar");

  menuToggle.addEventListener("click", function () {
    sidebar.classList.toggle("active");
  });

  // Navigation
  const menuItems = document.querySelectorAll(".sidebar-menu a");
  const sections = document.querySelectorAll(".section");
  const sectionTitle = document.getElementById("section-title");

  menuItems.forEach((item) => {
    item.addEventListener("click", function (e) {
      e.preventDefault();

      // Remove active class from all items
      menuItems.forEach((i) => i.classList.remove("active"));
      // Add active class to clicked item
      this.classList.add("active");

      // Hide all sections
      sections.forEach((s) => {
        s.classList.remove("active");
        s.style.display = "none";
      });

      // Show selected section
      const sectionId = this.getAttribute("data-section") + "-section";
      const targetSection = document.getElementById(sectionId);
      if (targetSection) {
        targetSection.style.display = "block";
        targetSection.classList.add("active");
      }

      // Update section title
      const spanText = this.querySelector("span");
      sectionTitle.textContent = spanText
        ? spanText.textContent
        : this.textContent.trim();

      // Close sidebar on mobile after selection
      if (window.innerWidth < 992) {
        sidebar.classList.remove("active");
      }

      // Close all open submenus when navigating
      closeAllSubmenus();
    });
  });

  // TSP Modal
  document.getElementById("add-tsp-btn").addEventListener("click", function () {
    closeAllModals();
    document.getElementById("tsp-modal").style.display = "flex";
  });

  document.getElementById("cancel-tsp").addEventListener("click", function () {
    document.getElementById("tsp-modal").style.display = "none";
  });

  // Company Modal
  document.getElementById("add-company-btn").addEventListener(
    "click",
    function () {
      closeAllModals();
      document.getElementById("company-modal").style.display = "flex";
    },
  );

  document.getElementById("cancel-company").addEventListener(
    "click",
    function () {
      document.getElementById("company-modal").style.display = "none";
    },
  );

  // Client Modal
  document.getElementById("add-client-btn").addEventListener(
    "click",
    function () {
      closeAllModals();
      document.getElementById("client-modal").style.display = "flex";
    },
  );

  document.getElementById("cancel-client").addEventListener(
    "click",
    function () {
      document.getElementById("client-modal").style.display = "none";
    },
  );

  // User Modal
  document.getElementById("add-user-btn").addEventListener(
    "click",
    function () {
      closeAllModals();
      document.getElementById("user-modal").style.display = "flex";
    },
  );

  document.getElementById("cancel-user").addEventListener("click", function () {
    document.getElementById("user-modal").style.display = "none";
  });

  // DID Admin Modal
  document.getElementById("add-did-admin-btn").addEventListener(
    "click",
    function () {
      closeAllModals();
      document.getElementById("did-modal").style.display = "flex";
    },
  );

  document.getElementById("cancel-did").addEventListener("click", function () {
    document.getElementById("did-modal").style.display = "none";
  });

  // Close modals when clicking on close button
  const modalCloseButtons = document.querySelectorAll(".modal-close");
  modalCloseButtons.forEach((button) => {
    button.addEventListener("click", function () {
      this.closest(".modal-backdrop").style.display = "none";
    });
  });

  // Close modals when clicking outside
  const modals = document.querySelectorAll(".modal-backdrop");
  modals.forEach((modal) => {
    modal.addEventListener("click", function (e) {
      if (e.target === this) {
        this.style.display = "none";
      }
    });
  });

  // Add functionality to filter buttons
  const filterButtons = document.querySelectorAll(
    ".btn-primary:not(#login-btn)",
  );
  filterButtons.forEach((button) => {
    if (
      button.textContent.includes("Filtrar") ||
      button.textContent.includes("Generar") ||
      button.textContent.includes("Buscar")
    ) {
      button.addEventListener("click", function () {
        console.log("Filtro aplicado: ", this.textContent);
        alert("Función de filtro ejecutada (demo)");
      });
    }
  });

  // Add functionality to export buttons
  const exportButtons = document.querySelectorAll(
    ".btn-primary:not(#login-btn)",
  );
  exportButtons.forEach((button) => {
    if (
      button.textContent.includes("Exportar") ||
      button.textContent.includes("Imprimir")
    ) {
      button.addEventListener("click", function (e) {
        e.preventDefault();
        console.log("Exportar/Imprimir: ", this.textContent);
        alert("Función de exportación ejecutada (demo)");
      });
    }
  });
});

// Toggle clients list
function toggleClients(element) {
  const clientsList = element.nextElementSibling;
  const icon = element.querySelector("i");

  clientsList.classList.toggle("expanded");

  if (clientsList.classList.contains("expanded")) {
    icon.classList.remove("fa-chevron-down");
    icon.classList.add("fa-chevron-up");
  } else {
    icon.classList.remove("fa-chevron-up");
    icon.classList.add("fa-chevron-down");
  }
}

// Toggle submenus
function toggleSubmenu(menuId) {
  const submenu = document.getElementById(menuId);
  const chevron = document.getElementById(menuId + "-chevron");

  submenu.classList.toggle("expanded");

  if (submenu.classList.contains("expanded")) {
    chevron.classList.remove("fa-chevron-down");
    chevron.classList.add("fa-chevron-up");
  } else {
    chevron.classList.remove("fa-chevron-up");
    chevron.classList.add("fa-chevron-down");
  }
}

// Close all submenus
function closeAllSubmenus() {
  const submenus = document.querySelectorAll(".submenu");
  const chevrons = document.querySelectorAll(
    ".menu-toggle-btn i.fa-chevron-up",
  );

  submenus.forEach((submenu) => {
    submenu.classList.remove("expanded");
  });

  chevrons.forEach((chevron) => {
    chevron.classList.remove("fa-chevron-up");
    chevron.classList.add("fa-chevron-down");
  });
}

// Close all modals
function closeAllModals() {
  const modals = document.querySelectorAll(".modal-backdrop");
  modals.forEach((modal) => {
    modal.style.display = "none";
  });
}

// Confirm delete function
function confirmDelete(type) {
  if (confirm(`¿Estás seguro de que deseas eliminar este ${type}?`)) {
    console.log(`${type} eliminado (demo)`);
    alert(`${type} eliminado correctamente (demo)`);
  }
}
