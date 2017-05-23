<?php

    function __autoload($class_name){
        require_once $class_name.'.php';
    }

    $id = $_POST['id'];
    $radcheck = new Radcheck();

    $usuario = $radcheck->find($id)['username'];

    if($radcheck->delete($id)){
        echo "Usuario: ".$usuario. " deletado com sucesso!";
    }else{
        echo "Não foi possivel deletar";
    }
?>
