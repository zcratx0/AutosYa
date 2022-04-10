<?php
  @session_start();
	require_once('config/config.php');
  require_once($path_user_model);
  require_once($path_vehicle_model);
	//	Activar la nav dependiendo del metodo get
	function activeNav($p) {
		$page_nav = '';
		if (ISSET($_GET[$p]) OR ISSET($_POST[$p])) {
			echo 'active';	
		}
	}
	

 	$i = new user_model();
  	//  Iniciar el array de datos
  	$user_data = $i->request();
  $vehicle_new = new vehicle_model();



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
	
	//	Registrar Usuario
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
//  Crea el vehiculo  
if (isset($_POST['createVehicle'])) {
	$vehicle_new = new vehicle_model();	
  $vehicle_new->constructor(NULL, $_POST['vehicletype'], $_POST['model'], $_POST['brand'], $_POST['color'], $_POST['passenger'], $_POST['price'], $_POST['vendedor_id'], $_POST['year'], $_POST['url'], $_POST['plate']);
  //    Crear el vehiculo
  $vehicle_new->create_vehicle_sql();
  header("Location: index.php?vehicles");
  die();
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
            <li><a class="logoutbtn"  href="<?php echo $path_Logout; ?>">Log out</a></li>
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
                <li class="tab right "><a class="<?php activeNav('vehicles'); activeNav('createVehicle'); activeNav('vehicleid') ?>" href="#vehicles">Vehiculos</a></li>
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
      require($path_rent);
    ?>
  </div>
  <?php endif; ?>
  <?php if ($user_data['role'] == 'Admin' OR $user_data['role'] == 'Encargado' ) : ?>
  <div id="users">
    <?php 
		$search_Attribute = 'users' ;
    	require($path_Search);
		  require($path_Users2);
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
    <?php
	//	Cargar datos de los usuarios para modificarlos.
		if (isset($_GET['userid']) && isset($_GET['useremail']))	:
			$user_data_edit = new user_model();
			$user_data_edit->load_user_class($_GET['userid'], $_GET['useremail']);
			$user_data = $user_data_edit->request();
	?>
		<div id='user_edit' class='modal'>
			<div class='modal-content'>
				<h4>Editar Perfil</h4>
	<?php require($path_EditProfile); ?>
			</div>
		</div>
	<?php endif; ?>
	
  <?php
  //  Editar vehiculo  ?>



  <?php
  //  Form para editar autos
    if (isset($_GET['vehicleid']))	:
  ?>
    <div id='vehicle_edit' class='modal'>
      <div class='modal-content'>
        <h4>Editar Vehiculo</h4>
        <form action="" method="post">
            <?php require($path_VehiclesDataInput) ?>
            <input type="submit">
        </form>
      </div>
    </div>
  <?php endif; ?>





  <?php
  //  Form para alquilar autos
    if (isset($_GET['id_auto']))	:
      $rent_vehicle_date = date('Y-m-d');
  ?>
    <div id='vehicle_rent' class='modal'>
      <div class='modal-content'>
        <h4>Alquilar Vehiculo</h4>
          <?php if (isset($_GET['id_auto'])) : ?>
            <form action="<?php echo $path_rentVehicle; ?>" method="get">
            <input type="hidden" name="rent_admin" value="">
          <?php endif; ?>
          <?php if (isset($_GET['rent_edit'])) : ?>
            <form action="<?php echo $path_rentEdit; ?>" method="get">
            <input type="hidden" name="rent_edit" value="">
          <?php endif; ?>
          
            <input type="hidden" name="vehicle_id" value="<?php echo $_GET['id_auto'] ?>">
            <input type="hidden" name="user_id" value="<?php echo $user_data['id']; ?>">
          <?php require($path_rentDataInput); ?>
            <input type="submit">
        </form>
      </div>
    </div>
  <?php endif; ?>

</body>
