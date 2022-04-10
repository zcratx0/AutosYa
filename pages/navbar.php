<?php
  @session_start();
	require_once('config/config.php');
  	require_once($path_user_model);
	//	Activar la nav dependiendo del metodo get
	function activeNav($p) {
		$page_nav = '';
		if (ISSET($_GET[$p])) {
			echo 'active';	
		}
	}
	

 	$i = new user_model();
  	//  Iniciar el array de datos
  	$user_data = $i->request();


	//	Si esta logueado, cargar sus datos
  	if (isset($_SESSION['email']) && isset($_SESSION['id']) && isset($_SESSION['loged'])) {
  	    $i->load_user_class($_SESSION['id'], $_SESSION['email']);
  	    $user_data = $i->request();
  	}

	  
	//	Si no esta logueado loguearlo
	if (isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password'])) {
		$i->load_user_class(NULL, $_POST['email']);
		if ($i->check_password($_POST['password']) == 'true') {
			$_SESSION['loged'] = true;
			$user_data = $i->request();
			$_SESSION['email'] = $user_data['mail'];
			$_SESSION['id'] = $user_data['id'];
		} else {
			$login_failed = true;
		}
	}
	
	//	Registrar
	if (isset($_POST['register'])) {
		
		$i->constructor(NULL, $_POST['email'], $_POST['password'], $_POST['name'], $_POST['lastname'], $_POST['phonenumber'], $_POST['documenttype'], $_POST['document'], 'Activado', 'Usuario');
		//	Revisar si el correo ya existe
		if ($i->load_user_sql_email($i->request()['mail'])) {
			$register_failed = 'EmailUsed';
		} else {
		//	Crear el usuario en la base de datos
			$i->create_user_sql();
		}
	}


	  
?>
<header>
  <nav class="nav-extended">
      <div class="nav-wrapper blue">
        <a href="index.php" style="margin-left:10px;" class="brand-logo">AutosYA!</a>
        <a href="#" data-target="mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <?php  if(isset($_SESSION['loged']) && $_SESSION['loged'] == true) : ?>
            <li><a class="modal-trigger" href="#edit">Editar perfil</a></li>
            <li><a class=""  href="<?php echo $path_Logout; ?>">Log out</a></li>
          <?php else : ?>
            <li><a class="modal-trigger"  href="#login">Login</a></li>
            <li><a class="modal-trigger"  href="#register">Register</a></li>
          <?php endif; ?>
        </ul>
      </div>
      <div class="nav-content blue">
        <ul class="tabs tabs-transparent">
			<!-- NAV de la pagina -->
            <li class="tab"><a class="<?php activeNav('search'); ?>" href="#search">Pagina Principal</a></li>
            <?php if(isset($_SESSION['email'])) : ?>
              <?php if ($user_data['role'] == 'Admin' OR $user_data['role'] == 'Encargado') : ?>
                <li class="tab right "><a class="<?php activeNav('users'); ?>" href="#users">Usuarios</a></li>
              <?php endif; ?>
              <?php if ($user_data['role'] == 'Admin' OR $user_data['role'] == 'Encargado' OR $user_data['role'] == 'Vendedor') : ?>
                <li class="tab right "><a class="<?php activeNav('vehicles'); ?>" href="#vehicles">Vehiculos</a></li>
              <?php endif; ?>
              <?php if ($user_data['role'] == 'Admin' OR $user_data['role'] == 'Encargado' OR $user_data['role'] == 'Vendedor') : ?>
                <li class="tab right "><a class="<?php activeNav('rent'); ?>" href="#rent">Alquileres</a></li>
              <?php endif; ?>
            <?php endif; ?>
        </ul>
      </div>
    </nav>
  
	
	<!-- Version Movile -->
  	<ul class="sidenav" id="mobile">
  	  <?php  if(isset($_SESSION['loged']) && $_SESSION['loged'] == true) : ?>
  	    <li><a class="modal-trigger" href="#edit">Editar perfil</a></li>
  	  <?php else : ?>
  	    <li><a class="modal-trigger"  href="#login">Login</a></li>
  	    <li><a class="modal-trigger"  href="#register">Register</a></li>
  	  <?php endif; ?>
  	</ul>

  <!-- Tabs -->
  <div id="search" class="col s12">
    <?php 
		$search_Attribute = 'search' ;
    	require($path_Search);
		require("pages/main_page.php");
	?>
  </div>
  <?php if ($user_data['role'] == 'Admin' OR $user_data['role'] == 'Encargado' OR $user_data['role'] == 'Vendedor') : ?>
  <div id="vehicles">
    <?php 
		$search_Attribute = 'vehicles' ;
    	require($path_Search);
    	require($path_Vehicles);
    ?>
  </div>
  <div id="rent">
    <?php 
		$search_Attribute = 'rent' ;
    	require($path_Search);
    ?>
  </div>
  <?php endif; ?>
  <?php if ($user_data['role'] == 'Admin' OR $user_data['role'] == 'Encargado' ) : ?>
  <div id="users">
    <?php 
		$search_Attribute = 'users' ;
    	require($path_Search);
    ?>
  </div>
  <?php endif; ?>
    


  </header>


<body>

  <!--Modals -->

    <?php  if(isset($_SESSION['loged']) && $_SESSION['loged'] == true) : ?>
      <div id="edit" class="modal">
        <div class="modal-content">
          <h4>Editar Perfil</h4>
          <?php require($path_EditProfile)?>
        </div>
      </div>
    <?php else : ?>
      <div id="login" class="modal">
        <div class="modal-content">
          <h4>Login</h4>
          <?php require($path_Login) ?>
        </div>
      </div>
      <div id="register" class="modal">
        <div class="modal-content">
          <h4>Register</h4>
          <?php require($path_Register)?>
        </div>
      </div>
    <?php endif; ?>
    

</body>
