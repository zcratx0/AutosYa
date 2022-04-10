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
    public $plate;
    public $vendedor_id;
    public $vehicle_array = array();

    public function constructor($id, $vt, $m, $b, $c, $ps, $pc, $vi, $yr, $ur, $pl) {
        $this->id = $id;
        $this->vehicletype = $vt;
        $this->model = $m;
        $this->brand = $b;
        $this->year = $yr;
        $this->color = $c;
        $this->passenger = $ps;
        $this->price = $pc;
        $this->url = $ur;
        $this->plate = $pl;
        $this->vendedor_id = $vi;
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
            'plate' => $this->plate,
            'vendedor_id' => $this->vendedor_id,
        );
    }

    //  Enviarse a si mismo
    public function request() {
        $this->array_load();
        return $this->vehicle_array;
    }
    //  Crearse en la base de datos.
    public function create_vehicle_sql() {
        $sqlVehicle = "INSERT INTO vehicles SET
            vehicletype = :vehicletype,
            model = :model,
            brand = :brand,
            year = :year,
            price = :price,
            color = :color,
            url = :url,
            plate = :plate,
            passenger = :passenger,
            vendedor_id =:vendedor_id
        ";
        $sqlArray = array(
            'vehicletype' => $this->vehicletype,
            'model' => $this->model,
            'brand' => $this->brand,
            'year' => $this->year,
            'color' => $this->color,
            'price' => $this->price,
            'passenger' => $this->passenger,
            'url' => $this->url,
            'plate' => $this->plate,
            'vendedor_id' => $this->vendedor_id
        );
        $this->execute($sqlVehicle, $sqlArray);
    }
    //  Cargarse en la base de datos.
    public function load_vehicle_sql($id) {
        $sqlVehicles = "SELECT * FROM vehicles WHERE ID = :id ";    //     Buscar por ID e Email por mayor seguridad.
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
            $this->plate = $vehicle[0]['plate'];
            $this->vendedor_id = $vehicle[0]['vendedor_id'];
        }
    }
    //  Checar si esta alquilado

}

?>