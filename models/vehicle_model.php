<?php
    require_once('generic.php');
    
    class vehicle_model extends generic {
        private $id;
        private $vehicletype;
        private $model;
        private $brand;
        private $color;
        private $passenger;
        private $price;
        private $vendedor_id;
        private $rent_id;
        private $date_start;
        private $date_end;
        
    }

    public constructor($id, $vt, $m, $b, $c, $ps, $pc, $vi, $ri, $ds, $de) {
        $this->id = $id;
        $this->vehicletype = $vt;
        $this->model = $m;
        $this->brand = $b;
        $this->color = $c;
        $this->passenger = $ps;
        $this->price = $pc;
        $this->vendedor_id = $vi;
        $this->rentr_id = $ri;
        $this->date_start = $ds;
        $this->date_end = $de;
    }

    //  Enviarse a si mismo
    public function request() {
        $vehicle = array(
            'id' => $this->id,
            'vehicletype' => $this->vehicletype,
            'model' => $this->model,
            'brand' => $this->brand,
            'color' => $this->color,
            'passenger' => $this->passenger,
            'price' => $this->price,
            'vendedor_id' => $this->vendedor_id,
            'rent_id' => $this->rent_id,
            'date_start' => $this->date_start,
            'date_end' => $this->date_end
        );
        return $vehicle;
    }
    //  Crearse en la base de datos.
    public function create_vehicle_sql() {}
    //  Cargarse en la base de datos.
    public function load_vehicle_sql() {}
    //  Cargarse en la clase.
    public function load_vehicle_class() {}
    //  

?>