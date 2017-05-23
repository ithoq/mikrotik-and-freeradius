<?php

    class Radcheck extends Crud{

        public $table = 'radcheck';

        public $username;
        public $lastname;
        public $room;
        public $dataNascimento;
        public $attribute;
        public $op;
        public $value;

        public function insert(){

            $sql = "INSERT INTO $this->table(username,attribute,op,value,dataNascimento)
                VALUES (:username, :attribute, :op, :value, :dataNascimento)";

            $stm = Conn::prepare($sql);
            $stm->bindParam(":username", $this->username);
            $stm->bindParam(":attribute", $this->attribute);
            $stm->bindParam(":op", $this->op);
            $stm->bindParam(":value", $this->value);
            $stm->bindParam(":dataNascimento", $this->dataNascimento);
            return $stm->execute();
        }

        public function update($cpf){
            $sql = "UPDATE $this->table SET username = :username, value = :value,
            dataNascimento = :dataNascimento WHERE username = :cpf";

            $stm = Conn::prepare($sql);
            $stm->bindParam(":username", $cpf);
            $stm->bindParam(":value", $this->value);
            $stm->bindParam(":dataNascimento", $this->dataNascimento);
            $stm->bindParam(":cpf", $cpf);
            return $stm->execute();
        }

        public function findCPF($cpf){

            $sql = "SELECT * FROM $this->table WHERE username = :username";
            $stm = Conn::prepare($sql);
            $stm->bindParam(":username", $cpf);
            $stm->execute();
            return $stm->fetch();
        }

        public function findRoom($value){

            $sql = "SELECT * FROM $this->table WHERE value = :value";
            $stm = Conn::prepare($sql);
            $stm->bindParam(":value", $value);
            $stm->execute();
            return $stm->fetch();
        }

    }

?>
