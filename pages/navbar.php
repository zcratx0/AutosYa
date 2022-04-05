<?php

  @session_start();




?>
<header>
  <nav class="nav-extended">
      <div class="nav-wrapper">
        <a href="#" class="brand-logo">Logo</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <?php  if(isset($_SESSION['loged']) && $_SESSION['loged'] == true) : ?>
            <li><a class="modal-trigger" href="#edit">Editar perfil</a></li>
          <?php else : ?>
            <li><a class="modal-trigger"  href="#login">Login</a></li>
            <li><a class="modal-trigger"  href="#register">Register</a></li>
          <?php endif; ?>
        </ul>
      </div>
      <div class="nav-content">
        <ul class="tabs tabs-transparent">
            <li class="tab"><a href="#test1">Pagina Principal</a></li>
            <li class="tab"><a class="active" href="#search">Buscar</a></li>
        </ul>
      </div>
    </nav>
          
  <div id="search" class="col s12">
    <?php require("search.php"); ?>
  </div>

    <?php  if(isset($_SESSION['loged']) && $_SESSION['loged'] == true) : ?>
      <div id="edit" class="modal">
        <div class="modal-content">
          <h4>Editar Perfil</h4>
          <?php require("edit_Profile.php")?>
        </div>
      </div>

    <?php else : ?>
      <div id="login" class="modal">
        <div class="modal-content">
          <h4>Login</h4>
          <?php require("login.php") ?>
        </div>
      </div>

      <div id="register" class="modal">
        <div class="modal-content">
          <h4>Register</h4>
          <?php require("register.php")?>
        </div>
      </div>
    <?php endif; ?>
</header>
