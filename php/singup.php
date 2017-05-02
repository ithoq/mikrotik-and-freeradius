<?php

    function __autoload($class_name){
        require_once $class_name.'.php';
    }

     $username = $_POST['username'];
     $password = $_POST['password'];
     $repassword = $_POST['repassword'];

     if($username == null || $password == null || $repassword == null):
        echo $username." ".$password." ".$repassword;
        ?>
        <script type="text/javascript">
            alert("Campos obrigatorio");
            window.location="../singin.php";
        </script>
            <a href="../singin.php"><label>Se não for redirecionado automaticamente, clique aqui</label></a>

        <?php
    elseif ($password != $repassword):
        ?>

        <script type="text/javascript">
            alert("As senhas não conferem!");
            window.location="../singin.php";
        </script>
        <a href="../singin.php"><label>Se não for redirecionado automaticamente, clique aqui</label></a>
        <?php
    else:

        $user = new Radcheck();

        $user->username = $username;
        $user->attribute = "Password";
        $user->op = "==";
        $user->value = $password;

        $exist = false;

        $user->table = "radcheck";

        foreach ($user->findAll() as $key => $value) {
            if($username == $value['username']):
                $exist = true;
            endif;
        }

        if($exist == true):
            echo "O usuario já existe";
        else:
            $user->insert();
            echo "Usuario cadastrado com sucesso!";

            ?>

            <script type="text/javascript">

            </script>

            <?php

        endif;

    endif;
?>
