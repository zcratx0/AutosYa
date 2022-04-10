<?php
    require_once("../../config/config.php");
    require_once("../../models/rent_model.php");
    if (isset($_GET['rent_id'])) {
        $rid = $_GET['rent_id'];
    } else {
        header("Location: ../../index.php?rent");
        die();
    }
    $rent_class = new rent_model();
    $rent_class->delete_sql($rid);
    
    header("Location: ../../index.php?rent");
    die();

?>