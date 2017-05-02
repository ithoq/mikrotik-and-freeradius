<?php

    function __autoload($class_name){
        require_once 'php/'.$class_name.'.php';
    }

    $dateInit = $_POST['dataInicial'];
    $dateFinal = $_POST['dataFinal'];

    $radacc = new Radacct();

    $array = $radacc->findDateRange($dateInit,$dateFinal);
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
            <?php foreach ($array as $key => $value) { ?>
            <tr>
                <td>
                    <?php echo "<b>Id:</b> ".$value['radacctid'] ?>
                    <?php echo "<b>Nome:</b> ".$value['username']?>
                    <?php echo "<b>IP:</b> ".$value['nasipaddress'] ?>
                    <?php echo "<b>Horario inicial:</b> ".$value['acctstarttime'] ?>
                    <?php echo  "<b>Horario Final :</b>".$value['acctstoptime'] ?>
                </td>
                <?php } ?>
            </tr>
        </table>
    </body>
</html>
