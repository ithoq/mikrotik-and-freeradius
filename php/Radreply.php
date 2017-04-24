<?php

    class Radreply extends Crud{

        public $table = "radreply";

        public $attribute;
        public $value;

        public function update($id){}

        public function insert(){

            $user = new Usuario();

            $sql = "INSERT INTO radreply(username, attribute, value)
                VALUES (:username, :attribute, :value)";

            $stm = Conn::prepare($sql);
            $stm->bindParam(":username", $user->username);
            $stm->bindParam(":attribute", $attribute);
            $stm->bindParam(":value", $value);
            return $stm->execute();
        }

    }


?>
