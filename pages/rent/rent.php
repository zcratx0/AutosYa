<?php
    $role = '';

    


    //  Si el usuario es un vendedor solo podra ver sus propios vehiculos alquilados
    if ($user_data['role'] == 'Vendedor') {
        $sql = "SELECT rent.ID, rent.VEHICLE_ID, rent.USER_ID, rent.DATE_START, rent.DATE_END, users.NAME, users.LASTNAME, users.EMAIL
        FROM rent
        INNER JOIN USERS WHERE rent.USER_ID = users.ID";    
        $role = 'vendedor';
    }
    //  Si el usuario es un administrador o vendedor podra ver todos los vehiculos
    else if ($user_data['role'] == 'Admin' or $user_data['role'] == 'Encargado'){
        $sql = "SELECT rent.ID, rent.VEHICLE_ID, rent.USER_ID, rent.DATE_START, rent.DATE_END, users.NAME, users.LASTNAME, users.EMAIL
        FROM rent
        INNER JOIN USERS WHERE rent.USER_ID = users.ID";
        $role = 'admin';
    }
    
    $rent_array = array();
    $rent_generic = new generic();
    foreach($rent_generic->execute($sql) as $i) {
        array_push($rent_array, $i);
    }

?>



<table class="centered responsive-table">
    <thead>  
            <th>ID Renta</th>
            <th>ID Vehiculo</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Inicio Alquiler</th>
            <th>Fin Alquiler</th>

    </thead>
    <tbody>
        <?php
            $num = 0;
            foreach($rent_array as $i) {
                $num = $num + 1;
                if($num % 2 == 0){
                    echo "<tr style='background-color:#c9c9c9;'>";
                }
                else{
                    echo "<tr style='background-color:#e8e8e8;'>";
                }
                echo "  <td class='table_s'>$i[ID]</td>";
                echo "  <td class='table_s'>$i[VEHICLE_ID]</td>";
                echo "  <td class='table_s main_table'>$i[NAME]</td>";
                echo "  <td class='table_s'>$i[LASTNAME]</td>";
                echo "  <td class='table_s'>$i[EMAIL]</td>";
                echo "  <td class='table_s'>$i[DATE_START]</td>";
                echo "  <td class='table_s'>$i[DATE_END]</td>";
                echo "  <td style='border-top: 1px solid #000000;border-bottom: 1px solid #000000;border-left: 1px solid #000000;'><form><input type='hidden' name='rent_edit'><input type='hidden' name='rent' value='rent'><input type='hidden' name='id_auto' value='$i[0]'><input type='hidden' name='user_id' value='$i[6]'><button style='top:9px;' class='waves-effect waves-light btn' type='submit'><i class='material-icons'>edit</i></button></form></td>";
                echo "  <td style='border-top: 1px solid #000000;border-bottom: 1px solid #000000;'><form action='$path_rent_delete'><input type='hidden' name='rent_id' value='$i[ID]'><button style='top:9px;' class='waves-effect waves-light btn' type='submit'><i class='material-icons'>delete</i></button></form></td>";
                echo " </tr>";

            }
        ?>
    </tbody>
</table>