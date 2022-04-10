<?php
    require_once('generic.php');
    class rent_model extends generic {
        public $date_start;
        public $date_end;
        public $user_id;
        public $vehicle_id;
        //  CONSTRUCTOR

        //  ARRAY


        //  REQUEST

        //  Crear un alquiler.


        //  Borrar un alquiler.
        public function delete_sql($rid) {
            $sqlDelete = "DELETE from RENT WHERE ID = :id";
            $sqlArray = array(
                'id' => $rid
            );
            $this->execute($sqlDelete, $sqlArray);
        }
        //  Moficiar alquileres.
        public function update_sql($rid, $ds, $dn) {
            $sqlUpdate = "UPDATE RENT  set date_end = CAST(:dn  AS DATETIME), date_start = CAST(:ds  AS DATETIME) WHERE ID = :id;";
            $sqlArray = array(
                'id' => $rid,
                'ds' => $ds,
                'dn' => $dn );
            $this->execute($sqlUpdate, $sqlArray);
        }


        //  Checkar rent
        
        public function rent_check() {
            return strtotime($this->date_end) <= strtotime(date('Y-m-d h:i:s'));
        }
        //  Admin
        public function rent_sql($date_start, $date_end, $user_id, $vehicle_id) {
            echo "Accediendo a la base de datos\n";
            $sqlInsert = "INSERT INTO rent SET
                date_start = cast(:dates as DATETIME),
                date_end = cast(:daten as DATETIME),
                vehicle_id = :vid,
                user_id = :uid;
                ";
            $sqlArray = array(
                "daten" => $date_end,
                "dates" => $date_start,
                "uid" => $user_id,
                'vid' => $vehicle_id
            );
            echo "Actualizando valores\n";
            $this->execute($sqlInsert, $sqlArray);
            echo "Valores actualizados\n";
            return "Vehiculo modificado!";
        }



        //  User
        public function rent($ds, $dn, $uid, $vhid) {
            if ($this->rent_check()) {
                if (strtotime($ds) < strtotime(date('Y-m-d').'00:00:00.000')) return 'La fecha de alquiler ya paso!';
                if (strtotime($dn) < strtotime(date('Y-m-d').'00:00:00.000')) return 'La fecha de alquiler ya paso!';
                $this->rent_sql($ds, $dn, $uid, $vhid);
                return "Vehiculo alquilado para desde el $ds hasta el  $dn";
            }
            else {
                return "Ya esta alquilado!";
            }
        }
    }


?>