<?php
    require_once("../../config/config.php");
    require_once("../../models/rent_model.php");

    //  Mensaje de inicio
    if (isset($_GET['date_start']) && isset($_GET['date_end']) && isset($_GET['user_id']) && isset($_GET['vehicle_id'])) {
        $vhid = $_GET['vehicle_id'];
        $uid = $_GET['user_id'];
        $date_start = $_GET['date_start']. ' 00:00:00.00';
        $date_end = $_GET['date_end'] . ' 00:00:01.00';
    } else {
        header("Location: ../../index.php?rent");
        die();
    }
    $rent_class = new rent_model();
    //  Si es administrador
    if (isset($_POST['rent_admin'])) {
        echo "Detectado como administrador!\n";
        $date_start = $_POST['date_start'].' 00:00:00.00';
        echo "Fecha de inicio: $date_start\n";
        echo "Fecha de finalizacion: $date_end\n";
        echo "ID Usuario: $uid\n";

    } else {
        //  Si es un usuario normal
        echo $rent_class->rent($date_start, $date_end, $uid, $vhid);
    }
    header("Location: ../../index.php?rent");
    die();
    
    

?>