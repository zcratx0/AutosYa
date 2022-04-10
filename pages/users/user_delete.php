<?php

    try {
        require_once('../../config/config.php');
        $config = true;
        require('../../models/generic.php');
    }  catch (Exception $e) {

    }
    
    $user_class = new generic();
    $i = '';

    if (isset($_GET['userid']) && isset($_GET['useremail'])) {
        
        $sql = "DELETE FROM users WHERE id = :id";
        $i = $_GET['userid'];
        $sqlArray = array(
            'id' => $i
        );
        $user_class->execute($sql, $sqlArray);
        header("Location: ../../index.php?users");
        die();
    }
?>