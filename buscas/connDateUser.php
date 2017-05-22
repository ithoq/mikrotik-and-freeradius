<?php

    function __autoload($class_name){
        require_once '../php/'.$class_name.'.php';
    }

    $dataIni = $_POST['dataIni'];
    $dataFin = $_POST['dataFin'];

    $radacc = new Radacct();

    $array = $radacc->findDateRange($dataIni,$dataFin);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Lista de usuarios</title>
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
        <h1>Lista de usuarios</h1>

        <table>
          <tr>
            <th>ID</th>
            <th>CPF</th>
            <th>IP INTERNO</th>
            <th>INICIO SESSÃO</th>
            <th>FIM SESSÃO</th>
          </tr>
          <tr>
              <?php foreach ($array as $key => $value) { ?>
            <td><?php echo $value['radacctid'] ?></td>
            <td><?php echo $value['username']?></td>
            <td><?php echo $value['nasipaddress'] ?></td>
            <td><?php echo $value['acctstarttime'] ?></td>
            <td><?php echo $value['acctstoptime'] ?></td>
          </tr>
              <?php } ?>
        </table>
    </body>
</html>
