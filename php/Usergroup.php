<?php

    class Usergroup extends Crud{

        public $table = "usergroup";

        public function update($id){}

        public function insert(){

            $user = new Usuario();
            $group = new Radgroupcheck();

            $sql = "INSERT INTO usergroup (username, groupname)
                 VALUES (:username, :groupname)";

            $stm = Conn::prepare($sql);
            $stm->bindParam(":username", $user->username);
            $stm->bindParam(":groupname", $group->groupname);
            return $stm->execute();
        }
    }

?>
