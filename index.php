
<head>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yes</title>
</head>
<body>
    <?php require_once('pages/navbar.php'); ?>
</body>

<script type="text/javascript" src="js/materialize.js"></script>
<script>
    M.AutoInit();
    $('.logoutbtn').click(function(e) {
        if (confirm('¿Seguro que quieres desconectarte?')) {

        } else {
            e.preventDefault();
        }
    });
	<?php if (isset($login_failed) && $login_failed == true): ?>$
		$('#login').modal('open');
        $login_failed = false;
	<?php endif; ?>
    
	<?php if (isset($register_failed) && $register_failed == true): ?>$
		$('#register').modal('open');
        $register_failed = false;
	<?php endif; ?>

	<?php if (isset($_GET['userid']) && isset($_GET['useremail'])): ?>$
		$('#user_edit').modal('open');
	<?php endif; ?>
    <?php if (isset($_GET['id_auto'])) :?>$
		$('#vehicle_rent').modal('open');
	<?php endif; ?>
    
    <?php if (isset($_GET['vehicleid'])) :?>$
		$('#vehicle_edit').modal('open');
	<?php endif; ?>
</script>


