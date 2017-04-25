<?php

    function __autoload($class_name){
        require_once 'php/'.$class_name.'.php';
    }

    $id = $_POST['id'];
    $radcheck = new Radcheck();

    $usuario = $radcheck->find($id)['username'];

    if($radcheck->delete($id)){
        echo $usuario. " deletado com sucesso!";
        ?>
            <a href="teste.php">Voltar</a>
        <?php
    }else{
        echo "Não foi possivel deletar";
        ?>
            <a href="teste.php">Voltar</a>
        <?php
    }
?>
