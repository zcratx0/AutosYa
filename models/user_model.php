<?php
    require_once('generic.php');

    class user_model extends generic {
        private $id;
        private $mail;
        private $password;
        private $name;
        private $lastname;
        private $phonenumber;
        private $documenttype;
        private $document;
        private $state;
        private $role;
        private $user_array = array();

        public function constructor($id, $m, $p, $n, $l, $pn, $dt, $d, $s, $r) {
            $this->id = $id;
            $this->mail = $m;
            $this->password = $p;
            $this->name = $n;
            $this->lastname = $l;
            $this->phonenumber = $pn;
            $this->documenttyoe = $dt;
            $this->document = $d;
            $this->state = $s;
            $this->role = $r;
        }

        //  Enviarse a si mismo
        public function array_load() {
            $this->user_array = array(
                'id' => $this->id,
                'mail' => $this->mail,
                'pass' => $this->password,
                'name' => $this->name,
                'lastname' => $this->lastname,
                'phonenumber' => $this->phonenumber,
                'documenttype' => $this->documenttype,
                'document' => $this->document,
                'state' => $this->state,
                'role' => $this->role
            );
        }
        public function request() {
            $this->array_load();
            return $this->user_array;
        }
        
        //  Chequear la contraseña
        public function check_password($pass_to_chekc) {
            return  boolval($pass_to_chekc == $this->password) ? 'true' : 'false';
        }


        //  Crearse en la base de datos.
        public function create_user_sql() {
            $sqlUsers = "INSERT INTO users SET
            email = :mail,
            password = :pass,
            name = :name,
            lastname = :lastname,
            phonenumber = :phonenumber,
            documenttype = :documenttype,
            document = :document,
            state = :state,
            role = :role";
            $sqlUsersArray = array(
                'mail' => $this->mail,
                'pass' => $this->password,
                'name' => $this->name,
                'lastname' => $this->lastname,
                'phonenumber' => $this->phonenumber,
                'documenttype' => $this->documenttype,
                'document' => $this->document,
                'state' => $this->state,
                'role' => $this->role
            );
            $this->execute($sqlUsers, $sqlUsersArray);
        }
        //  Cargar sus datos de la base de datos.
        public function load_user_sql($id, $email) {
            $sqlUser = "SELECT * FROM users WHERE ID = :id AND EMAIL = :email";    //  Buscar por ID e Email por mayor seguridad.
            $sqlArray = array(
                'id' => $id,
                'email' => $email
            );
            if ($this->execute($sqlUser, $sqlArray) < 1) {
                return false;
            } else return ($this->execute($sqlUser, $sqlArray));
        }
        //  Cargarse en la clase.
        public function load_user_class($id, $email) {
            $user = $this->load_user_sql($id, $email);
            if ($user == false) {
                return false;
            } else {
                $this->id = $user[0]['id'];
                $this->mail =  $user[0]['email'];
                $this->password = $user[0]['password'];
                $this->name = $user[0]['name'];
                $this->lastname = $user[0]['lastname'];
                $this->phonenumber = $user[0]['phonenumber'];
                $this->documenttyoe = $user[0]['documenttype'];
                $this->document = $user[0]['document'];
                $this->state = $user[0]['state'];
                $this->role = $user[0]['role'];
            }
            
        }

        //  Actualizar datos.
        public function update_users_sql($newData) {
            $sqlUser = "UPDATE users SET
                email = :mail,
                password = :pass,
                name = :name,
                lastname = :lastname,
                phonenumber = :phonenumber,
                documenttype = :documenttype,
                document = :document,
                role = :role
                where id = :id";
            $this->execute($sqlUsers, $newData);
        }

        
    }
    

?>