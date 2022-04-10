<?php
    require_once($path_generic);
    require_once($path_user_model);
    $user_array = array();
    $class = new generic();
    $data = '';

    $sql = "select * FROM USERS WHERE ID LIKE '%$data%' or NAME LIKE '%$data%' or LASTNAME LIKE '%$data%' or PHONENUMBER LIKE '%$data%' or EMAIL LIKE '%$data%' or DOCUMENTTYPE LIKE '%$data%' or DOCUMENT LIKE '%$data%' or STATE LIKE '%$data%' or `role` LIKE '%$data%';";

    foreach ($class->execute($sql) as $i) {
        $user = new user_model();
        $user->load_user_class($i['id'], $i['email']);
        array_push($user_array, $user->request());

    }
?>

<table class="centered responsive-table">
    <thead>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>APELLIDO</th>
        <th>EMAIL</th>
        <th>DOCUMENTO</th>
        <th>TIPO</th>
        <th>ESTADO</th>
        <th>ROLE</th>
    </thead>
    <tbody>
            
    <?php
        $num = 0;
        foreach ($user_array as $i) {
            $num = $num + 1;
            if($num % 2 == 0){
                echo "<tr style='background-color:#c9c9c9;'>";
            }
            else{
                echo "<tr style='background-color:#e8e8e8;'>";
            }
            echo "  <td class='table_s'>$i[id]</td>";
            echo "  <td class='table_s main_table'>$i[name]</td>";
            echo "  <td class='table_s'>$i[lastname]</td>";
            echo "  <td class='table_s'>$i[mail]</td>";
            echo "  <td class='table_s'>$i[document]</td>";
            echo "  <td class='table_s'>$i[documenttype]</td>";
            echo "  <td class='table_s'>$i[state]</td>";
            echo "  <td class='table_s'>$i[role]</td>";
            echo "  <td style='border-top: 1px solid #000000;border-bottom: 1px solid #000000;border-left: 1px solid #000000;'><form><input type='hidden' name='users' value='users'><input type='hidden' name='userid' value='$i[id]'><input type='hidden' name='useremail' value='$i[mail]'><button style='top:9px;' class='waves-effect waves-light btn' type='submit'><i class='material-icons'>edit</i></button></form></td>";
            echo "  <td style='border-top: 1px solid #000000;border-bottom: 1px solid #000000;'><form action='$path_user_delete'><input type='hidden' name='userid' value='$i[id]'><input type='hidden' name='useremail' value='$i[mail]'><button style='top:9px;' class='waves-effect waves-light btn' type='submit'><i class='material-icons'>delete</i></button></form></td>";
            echo "</tr>";
            
        }
    ?>
    
    
    </tbody>
</table>

<style>
            .table_s{
                border: 1px solid #000000;
            }

            .main_table{
                background-color: #cce1f0;
            }
        </style>