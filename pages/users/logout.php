<?php

    @session_start();
    @session_destroy();
    header("Location: /V2/index.php");
    die();
?>