<?php

    function __autoload($class_name){
        require_once '../php/'.$class_name.'.php';
    }

    $cpf = $_POST['cpf'];

    $searchCpf = new Radcheck();

    $array = $searchCpf->findCPF($cpf);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Lista de usuarios</title>
        <style media="screen">
            td{
                display: block;
            }
        </style>
    </head>
    <body>
        <h1>Lista de usuarios</h1>
        <table>
            <tr>
                <td>
                    <?php echo "<b>Id:</b> ".$array['id'] ?>
                    <?php echo "<b>Nome:</b> ".$array['username']?>
                    <?php echo "<b>Quarto:</b> ".$array['value'] ?>
                    <?php echo "<b>Data nascimento:</b> ".$array['dataNascimento'] ?>
                </td>
            </tr>
        </table>
    </body>
</html>
