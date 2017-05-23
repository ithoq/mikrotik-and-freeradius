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

        public function complement($cpf){

            $sql = "SELECT * FROM radacct WHERE username = :username";

             $stm = Conn::prepare($sql);
             $stm->bindParam(":username", $cpf);
             $stm->execute();
             return $stm->fetch();
        }

        public function ativos(){

            $sql = "SELECT username, date_format(acctstarttime, '%d/%m/%Y %T')
                AS acctstarttime, nasporttype FROM radacct WHERE acctstoptime = 0 ORDER BY acctstarttime; ";

            $stm = Conn::prepare($sql);
            $stm->execute();
            return $stm->fetchAll();
        }

        public function inativos(){

            $sql = "SELECT * FROM $this->table WHERE acctstoptime IS NOT NULL";

            $stm = Conn::prepare($sql);
            $stm->execute();
            return $stm->fetchAll();
        }

        public function mediaDownload(){

            $sql = "SELECT acctinputoctets FROM $this->table";

            $stm = Conn::prepare($sql);
            $stm->execute();
            $down = $stm->fetchAll();

            $qtdTotal = 0;

            foreach ($down as $key => $value) {
                $qtdTotal += $value['acctinputoctets'];
            }

            $total = $qtdTotal/count($down);
            $a = $total/1024;
            return $a/1024;

        }

        public function mediaUpload(){

            $sql = "SELECT acctoutputoctets FROM $this->table";

            $stm = Conn::prepare($sql);
            $stm->execute();
            $down = $stm->fetchAll();

            $qtdTotal = 0;

            foreach ($down as $key => $value) {
                $qtdTotal += $value['acctoutputoctets'];
            }

            $total = $qtdTotal/count($down);
            $a = $total/1024;
            return $a/1024;
        }
    }

?>
