<?php
    require_once("../../config/config.php");
    require_once("../../models/rent_model.php");

    //  Mensaje de inicio
    if (isset($_GET['date_start']) && isset($_GET['date_end']) && isset($_GET['rent_id'])) {
        $uid = $_GET['rent_id'];
        $date_start = $_GET['date_start']. ' 00:00:00.00';
        $date_end = $_GET['date_end'] . ' 00:00:01.00';
        echo "Iniciando!\n";
    } else {
        header("Location: ../../index.php?rent");
        die();
    }
    echo "cargando modelo!\n";
    $rent_class = new rent_model();
    $rent_class->update_sql($uid, $date_start, $date_end);
    echo "Editando el registro!\n";
    
    header("Location: ../../index.php?rent");
    die();
    

?>