<?php

class LoginAdmin extends Crud{

    public function update($id){}
    public function insert(){}

    public function login($user, $pass){

        $sql = "SELECT username, password FROM loginAdmin WHERE username = :username AND password = :password";

        $stm = Conn::prepare($sql);
        $stm->bindParam(":username", $user);
        $stm->bindParam(":password", $pass);
        $stm->execute();
        return $stm->fetch();
    }

}

?>
