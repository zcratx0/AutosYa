<?php
    require("../models/generic.php");
    $generic_class = new generic();
    echo "Creando Base de Datos\n";
    $sql = "CREATE database alquileres_vehiculos; use alquileres_vehiculos;";
    $generic_class->execute($sql);
    echo "Creando tabla usuarios!\n";
    $sql = "CREATE TABLE `alquileres_vehiculos`.`users` (
        `id` INT NOT NULL AUTO_INCREMENT ,
        `name` VARCHAR(64) NOT NULL ,
        `lastname` VARCHAR(64) NOT NULL ,
        `phonenumber` VARCHAR(64) NOT NULL ,
        `email` tinytext  NOT NULL ,
        `documenttype` ENUM('cedula','pasaporte') NOT NULL ,
        `document` VARCHAR(8) NOT NULL ,
        `password` tinytext null,
        `state` ENUM('Activado', 'Desactivado', 'Borrado'),
        `role` ENUM('Usuario', 'Vendedor', 'Encargado', 'Admin'),
        PRIMARY KEY (`id`));";
    
    $generic_class->execute($sql);
    echo "Creando tabla Vehiculos!\n";
    $sql = "CREATE TABLE `alquileres_vehiculos`.`vehicles` ( 
        `id` INT NOT NULL AUTO_INCREMENT ,
        `vehicletype` VARCHAR(64) NOT NULL ,
        `plate` VARCHAR(7) NOT NULL,
        `color` VARCHAR(64) NOT NULL ,
        `passenger` INT(100) NOT NULL ,
        `brand` VARCHAR(64) NOT NULL ,
        `model` VARCHAR(64) NOT NULL ,
        `url` VARCHAR(512) NOT NULL ,
        `price` INT NOT NULL ,
        `year` int(4),
        `vendedor_id` int references users(id),
        `rent_id` int references users(id),
        PRIMARY KEY (`id`));";
    $generic_class->execute($sql);
    echo "Crear tabla de Rentas!\n";
    $sql = "CREATE TABLE `alquileres_vehiculos`.`rent` (
        `id` INT not NULL auto_increment,
        `vehicle_id` int references vehicles(id),
        `user_id` int references users(id),
        `date_start` DATETIME,
        `date_end` DATETIME,
        PRIMARY key (`id`));";
    $generic_class->execute($sql);
    
    echo "Creando usuario ADMINISTRADOR!\n";
    $sql = "INSERT INTO users set email = 'admin@admin.com', password = 'admin', state = 'Activado', role = 'Admin'";
    echo "EMAIL: admin@admin.com \n PASS: admin";
    echo "La base de datos de Alquileres ha sido actualizada!\n";
    

?>