<?php

    class Radacct extends Crud{

        public $table = "radacct";

        public function update($cpf){}
        public function insert(){}

        public function findDateRange($starttime, $stoptime){

            $sql = "SELECT * FROM radacct WHERE acctstoptime BETWEEN :starttime AND :stoptime ORDER BY acctstoptime ASC";

             $stm = Conn::prepare($sql);
             $stm->bindParam(":starttime", $starttime);
             $stm->bindParam(":stoptime", $stoptime);
             $stm->execute();
             return $stm->fetchAll();
        }
    }

?>
