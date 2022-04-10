<?php
require_once('generic.php');
    
class vehicle_model extends generic {
    public $id;
    public $vehicletype;
    public $model;
    public $year;
    public $brand;
    public $color;
    public $passenger;
    public $price;
    public $url;
    public $vendedor_id;
    public $rent_id;
    public $date_start;
    public $date_end;
    public $vehicle_array = array();

    public function constructor($id, $vt, $m, $b, $c, $ps, $pc, $vi, $ri, $ds, $de, $yr, $ur) {
        $this->id = $id;
        $this->vehicletype = $vt;
        $this->model = $m;
        $this->brand = $b;
        $this->year = $yr;
        $this->color = $c;
        $this->passenger = $ps;
        $this->price = $pc;
        $this->url = $ur;
        $this->vendedor_id = $vi;
        $this->rent_id = $ri;
        $this->date_start = $ds;
        $this->date_end = $de;
    }

    public function array_load() {
        $this->vehicle_array = array(
            'id' => $this->id,
            'vehicletype' => $this->vehicletype,
            'model' => $this->model,
            'year' => $this->year,
            'brand' => $this->brand,
            'color' => $this->color,
            'passenger' => $this->passenger,
            'price' => $this->price,
            'url' => $this->url,
            'vendedor_id' => $this->vendedor_id,
            'rent_id' => $this->rent_id,
            'date_start' => $this->date_start,
            'date_end' => $this->date_end
        );
    }

    //  Enviarse a si mismo
    public function request() {
        $this->array_load();
        return $this->vehicle_array;
    }
    //  Crearse en la base de datos.
    public function create_vehicle_sql($m, $b, $c, $pc, $ps, $vid, $rid, $yr, $ur) {
        $sqlVehicle = "INSERT INTO vehicles SET
            model = :model,
            brand = :brand,
            year = :year,
            price = :price,
            color = :color,
            url = :url,
            passenger = :vehicletype
        ";
        $sqlArray = array(
            'model' => $m,
            'brand' => $b,
            'year' => $yr,
            'color' => $c,
            'price' => $pc,
            'url' => $ur,
            'passenger' => $ps
        );
        if ($this->execute($sqlVehicle, $sqlArray) < 1)  {
            return false;
        } else return ($this->execute($sqlVehicle, $sqlArray));
    }
    //  Cargarse en la base de datos.
    public function load_vehicle_sql($id) {
        $sqlVehicles = "SELECT * FROM vehicles WHERE ID = :id ";    //  Buscar por ID e Email por mayor seguridad.
        $sqlArray = array(
            'id' => $id,
        );
        if ($this->execute($sqlVehicles, $sqlArray) < 1) {
            return false;
        } else return ($this->execute($sqlVehicles, $sqlArray));
    }
    //  Cargarse en la clase.
    public function load_vehicle_class($id) {
        $vehicle = $this->load_vehicle_sql($id);
        if ($vehicle == false) {
            return false;
        } else {
            $this->id = $vehicle[0]['id'];
            $this->vehicletype = $vehicle[0]['vehicletype'];
            $this->model = $vehicle[0]['model'];
            $this->brand = $vehicle[0]['brand'];
            $this->year = $vehicle[0]['year'];
            $this->color = $vehicle[0]['color'];
            $this->passenger = $vehicle[0]['passenger'];
            $this->price = $vehicle[0]['price'];
            $this->url = $vehicle[0]['url'];
            $this->vendedor_id = $vehicle[0]['vendedor_id'];
            $this->rent_id = $vehicle[0]['rent_id'];
            $this->date_start = $vehicle[0]['date_start'];
            $this->date_end = $vehicle[0]['date_end'];
        }
    }
}
    //  

?>