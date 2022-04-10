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
    $sql = "SELECT * FROM VEHICLES WHERE vendedor_id = $user_data[id] and (vehicletype LIKE '%$data%' or COLOR  LIKE '%$data%' or PASSENGER  LIKE '%$data%' or BRAND  LIKE '%$data%' or MODEL  LIKE '%$data%' or PRICE  LIKE '%$data%');";
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
          <form action="" method='post'>
            <?php require("vehicle_data_input.php") ?>
            <input type="submit" name="createVehicle">
          </form>
        </div>
    </div>

        <style>
            .table_s{
                border: 1px solid #000000;
            }

            .main_table{
                background-color: #cce1f0;
            }
        </style>
    
<table class="centered responsive-table">
    <thead>
        <th>ID </th>
        <th>Modelo</th>
        <th>Marca</th>
        <th>Color</th>
        <th>Placa</th>
        <th>Pasajeros</th>
        <th>Tipo de Vehiculo</th>
        <th>Precio</th>
        <th>Vendedor_id</th>
    </thead>
    <tbody>
        <?php
            $num = 0;
            foreach ($vehicle_array as $i) {
                $num = $num + 1;
                if($num % 2 == 0){
                    echo "<tr style='background-color:#c9c9c9;'>";
                }
                else{
                    echo "<tr style='background-color:#e8e8e8;'>";
                }
                    echo "  <td class='table_s'>$i[id] </td>";
                    echo "  <td class='table_s'>$i[model] </td>";
                    echo "  <td class='table_s'>$i[brand] </td>";
                    echo "  <td class='table_s'>$i[color] </td>";
                    echo "  <td class='table_s'>$i[plate] </td>";
                    echo "  <td class='table_s'>$i[passenger] </td>";
                    echo "  <td class='table_s'>$i[vehicletype]";
                    echo "  <td class='table_s'>$i[price] </td>";
                    echo "  <td class='table_s'>$i[vendedor_id] </td>";
                    echo "  <td style='border-top: 1px solid #000000;border-bottom: 1px solid #000000;border-left: 1px solid #000000;'><form><input type='hidden' name='vehicleid' value='$i[id]'><button style='top:9px;' class='waves-effect waves-light btn' type='submit'><i class='material-icons'>edit</i></button></form></td>";
                    echo "  <td style='border-top: 1px solid #000000;border-bottom: 1px solid #000000;border-right: 1px solid #000000;'> <form action='$path_vehicle_delete'><input type='hidden' name='vehicleid' value='$i[id]'><button style='top:9px;' class='waves-effect waves-light btn' type='submit'><i class='material-icons'>delete</i></button></form></td>";
                    echo "</tr>";
            }
        ?>
    </tbody>
</table>
