<?php
    require_once($path_generic);
	require_once($path_vehicle_model);
    $data = '';
    if (isset($_GET['search'])) {
        $data = $_GET['search'];
    }
    $min = 0;
    $max = 8;
    if (isset($_GET['search_max'])) {
        $max = $_GET['search_max'];
    }
    if (isset($_GET['search_paginator'])) {
        $min = $_GET['search_paginator']*$max-$max;
        $max = $min+$max;
    }
    $sqltotal = "SELECT count(ID) FROM VEHICLES where vehicletype LIKE '%$data%' or COLOR  LIKE '%$data%' or PASSENGER  LIKE '%$data%' or BRAND  LIKE '%$data%' or MODEL  LIKE '%$data%'  or YEAR LIKE '%$data%' or PRICE  LIKE '%$data%'";
    $sql = "SELECT * FROM VEHICLES where vehicletype LIKE '%$data%' or COLOR  LIKE '%$data%' or PASSENGER  LIKE '%$data%' or BRAND  LIKE '%$data%' or MODEL  LIKE '%$data%'  or YEAR LIKE '%$data%' or PRICE  LIKE '%$data%' limit $min,$max;";
    // Crear un array de autos
    $vehicle_array = array();
    $class = new generic();
    $count_vehicle_total = $class->execute($sqltotal);
    foreach ($class->execute($sql) as $i) {
        $vehicle = new vehicle_model();
        $vehicle->load_vehicle_class($i['id']);
        array_push($vehicle_array, $vehicle->request() );

    }

?>

    <main>
        <h2 class="center">Modelos mas alquilados</h2>
        <hr style="margin-left:12px;margin-right:12px;">
        <div class="row s12">
            <?php 
                foreach( $vehicle_array as $i) {
                    $car = $i;
                    require($path_VehiclesCard);
                }
            ?>
        </div>

    </main>
    <?php require_once($path_Footer) ?>
