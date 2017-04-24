<?php

    function __autoload($class_name){
        require_once 'php/'.$class_name.'.php';
    }

    $t = new Radacct();

    foreach ($t->findDateRange("2017-04-14", "2017-04-15") as $key => $value) {
        echo $value['acctstoptime']." <br> ";
    }

?>
