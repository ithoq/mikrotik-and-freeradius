<?php

    function __autoload($class_name){
        require_once $class_name.'.php';
    }

     $username = $_POST['username'];
     $password = $_POST['password'];
     $repassword = $_POST['repassword'];
     $dataNascimento = $_POST['dataNascimento'];

     if($username == null || $password == null || $repassword == null):
        echo $username." ".$password." ".$repassword;
        ?>
        <?php
    elseif ($password != $repassword):
        ?>
        <?php
    else:

        $validaCPF = new ValidaCPF();
        if(!$validaCPF->validaCPF($username)):
            echo "CPF inválido!<br>";
            ?>

            <?php
        else:

            $user = new Radcheck();

            $user->username = $username;
            $user->attribute = "Password";
            $user->op = "==";
            $user->value = $password;
            $user->dataNascimento = $dataNascimento;

            $exist = false;

            $user->table = "radcheck";

            foreach ($user->findAll() as $key => $value) {
                if($username == $value['username']):
                    $exist = true;
                endif;
            }

            if($exist == true):
                echo "O usuario já existe<br>";
                ?>
                <?php
            else:
                $user->insert();
                echo "Usuario cadastrado com sucesso!";

                ?>
                <?php

            endif;
        endif;
    endif;
?>
