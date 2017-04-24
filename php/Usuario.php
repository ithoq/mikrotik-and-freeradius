<?php

    class Usuario extends Crud{

        public $table = 'radcheck';

        public $username;
        public $lastname;
        public $room;
        public $document;
        public $attribute;
        public $op;
        public $value;

        public function insert(){

            $sql = "INSERT INTO $this->table(username,attribute,op,value)
                VALUES (:username, :attribute, :op, :value)";

            $stm = Conn::prepare($sql);
            $stm->bindParam(":username", $this->username);
            $stm->bindParam(":attribute", $this->attribute);
            $stm->bindParam(":op", $this->op);
            $stm->bindParam(":value", $this->value);
            return $stm->execute();
        }

        public function update($id){}
    }

?>
