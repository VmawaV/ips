<!DOCTYPE html>
<html lang="es">

<head>
  <?php
  require_once './inc/inc_head.php';
  ?>
  <title>Safe Communications IPS - Iniciar Sesión</title>
</head>

<body>

  <div id="login-screen" class="login-container">
    <div class="login-box">
      <div class="login-header">
        <h1><i class="fas fa-shield-alt"></i> Safe Communications IPS</h1>
        <p>Portal de Administración Segura</p>
      </div>
      <div class="login-body">
        <div class="form-group">
          <label for="username">Usuario</label>
          <input type="text" id="username" class="form-control" placeholder="Ingresa tu usuario">
        </div>
        <div class="form-group">
          <label for="password">Contraseña</label>
          <input type="password" id="password" class="form-control" placeholder="Ingresa tu contraseña">
        </div>
        <button id="login-btn" class="btn btn-primary" style="width: 100%; justify-content: center;">
          <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
        </button>
      </div>
      <div class="login-footer">
        Sistema seguro de comunicaciones para Grupo IPS
      </div>
    </div>
  </div>


  <?php

  ?>
  <script src="/js/main.js" defer></script>

</body>

</html>