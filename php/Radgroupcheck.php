<?php


    class Radgroupcheck extends Crud{

        public $table = "radgroupcheck";

        public $groupname;
        public $attribute;
        public $op;
        public $value;

        public function insert(){

            $sql = "INSERT INTO radgroupcheck (groupname,attribute,op,value)
                VALUES (:groupname, :attribute, :op, :value)";

            $stm = Conn::prepare($sql);
            $stm->bindParam(":groupname", $this->groupname);
            $stm->bindParam(":attribute", $this->attribute);
            $stm->bindParam(":op", $this->op);
            $stm->bindParam(":value", $this->value);
            return $stm->execute();
        }

        public function update($id){}
    }

?>
