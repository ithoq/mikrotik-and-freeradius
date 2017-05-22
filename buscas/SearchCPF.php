<?php

    function __autoload($class_name){
        require_once '../php/'.$class_name.'.php';
    }

    $array = array();

    if(empty($_POST['cpf']) && empty($_POST['rom']) ):
    elseif(!empty($_POST['cpf']) && !empty($_POST['room'])):
        $searchCpf = new Radcheck();
        $room = $_POST['room'];
        $array = $searchCpf->findRoom($room);
    elseif(empty($_POST['room']) && !empty($_POST['cpf'])):
        $searchCpf = new Radcheck();
        $cpf = $_POST['cpf'];
        $array = $searchCpf->findCPF($cpf);
    endif;


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Usuario</title>
        <style media="screen">
            td{
                display: block;
            }
        </style>
    </head>
    <body>
        <h1>Usuario encontrado</h1>
        <table>
            <tr>
                <td>
                    <?php echo "<b>Id:</b> ".$array['id'] ?>
                    <?php echo "<b>CPF:</b> ".$array['username']?>
                    <?php echo "<b>Quarto:</b> ".$array['value'] ?>
                    <?php echo "<b>Data nascimento:</b> ".$array['dataNascimento'] ?>
                </td>
            </tr>
        </table>
    </body>
</html>
