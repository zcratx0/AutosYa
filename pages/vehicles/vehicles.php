<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/V2/models/vehicle_model.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/V2/models/generic.php');
$vehicle_array = array();
      
$class = new generic();
$data = '';

if (isset($_GET['vehicles'])) {
    $data = $_GET['vehicles'];
}

//  Separar si es admin o vendedor


if ($user_data['role'] == 'Vendedor') {
    $sql = "SELECT * FROM VEHICLES WHERE RENT_ID = 20 and (vehicletype LIKE '%$data%' or COLOR  LIKE '%$data%' or PASSENGER  LIKE '%$data%' or BRAND  LIKE '%$data%' or MODEL  LIKE '%$data%' or PRICE  LIKE '%$data%');";
} else {
    $sql = "SELECT * FROM VEHICLES where vehicletype LIKE '%$data%' or COLOR  LIKE '%$data%' or PASSENGER  LIKE '%$data%' or BRAND  LIKE '%$data%' or MODEL  LIKE '%$data%' or PRICE  LIKE '%$data%';";
}


foreach ($class->execute($sql) as $i) {
    $vehicle = new vehicle_model();
    $vehicle->load_vehicle_class($i['id']);
    array_push($vehicle_array, $vehicle->request() );
    
}
?>
<div class="fixed-action-btn">
  <a class="btn-floating btn-large red">
    <i class="large material-icons">mode_edit</i>
  </a>
  <ul>
    <li><a class="btn-floating green modal-trigger" href="#add_vehicle"><i class="material-icons">add_circle</i></a></li>
  </ul>
</div>


    <div id="add_vehicle" class="modal">
        <div class="modal-content">
          <h4>Agregar Vehiculo</h4>
          <?php require("vehicle_data_input.php") ?>
        </div>
    </div>


<table>
    <thead>
        <th>ID </th>
        <th>Modelo</th>
        <th>Marca</th>
        <th>Color</th>
        <th>Pasajeros</th>
        <th>Tipo de Vehiculo</th>
        <th>Precio</th>
        <th>Fecha inicio</th>
        <th>Fecha fin</th>
    </thead>
    <tbody>
        <?php
            foreach( $vehicle_array as $i) {
                    echo "<tr>";
                    echo "  <td>$i[id] </td>";
                    echo "  <td>$i[model] </td>" ;
                    echo "  <td>$i[brand] </td>";
                    echo "  <td>$i[color] </td>";
                    echo "  <td>$i[passenger] </td>";
                    echo "  <td>$i[vehicletype]";
                    echo "  <td>$i[price] </td>";
                    echo "  <td>$i[date_start] </td>";
                    echo "  <td>$i[date_end] </td>";
                    echo "  <td><a class='btn'><i class='smal material-icons'>delete</i></a></td>";
                    echo "<tr>";
            }
        ?>
    </tbody>
</table>
