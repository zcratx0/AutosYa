<?php
    try {
        require_once('../../config/config.php');
        $config = true;
        require('../../models/generic.php');
    }  catch (Exception $e) {

    }
    
    $vehicle_class = new generic();
    $i = '';

    if (isset($_GET['vehicleid'])) {
        
        $sql = "DELETE FROM vehicles WHERE id = :id";
        $i = $_GET['vehicleid'];
        $sqlArray = array(
            'id' => $i
        );
        $vehicle_class->execute($sql, $sqlArray);
        header("Location: ../../index.php?vehicles");
        die();
    }

?>