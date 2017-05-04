<?php

    abstract class Crud extends Conn{

        public $table;

        abstract function insert();
        abstract function update($cpf);

        public function find($id){

            $sql = "SELECT * FROM $this->table WHERE id = :id";
            $stm = Conn::prepare($sql);
            $stm->bindParam(":id", $id);
            $stm->execute();
            return $stm->fetch();
        }

        public function findAll(){

            $sql = "SELECT * FROM $this->table";
            $stm = Conn::prepare($sql);
            $stm->execute();
            return $stm->fetchAll();
        }

        public function delete($cpf){
            $sql = "DELETE FROM $this->table WHERE username = :username";
            $stm = Conn::prepare($sql);
            $stm->bindParam(":username", $cpf);
            return $stm->execute();
        }

    }

?>
