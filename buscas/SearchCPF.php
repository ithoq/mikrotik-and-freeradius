<?php

    function __autoload($class_name){
        require_once '../php/'.$class_name.'.php';
    }

    $array = array();
    if(empty($_POST['cpf']) && empty($_POST['rom']) ):
    elseif(!empty($_POST['cpf'])):
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
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            }

            td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            }

            tr:nth-child(even) {
            background-color: #dddddd;
            }
        </style>
    </head>
    <body>
        <h1>Usuario encontrado</h1>
        <table>
          <tr>
            <th>ID</th>
            <th>CPF</th>
            <th>ROOM</th>
            <th>DATA DE NASCIMENTO</th>
          </tr>
          <tr>
            <td><?php echo $array['id'] ?></td>
            <td><?php echo $array['username']?></td>
            <td><?php echo $array['value'] ?></td>
            <td><?php echo $array['dataNascimento'] ?></td>
          </tr>
        </table>
    </body>
</html>
