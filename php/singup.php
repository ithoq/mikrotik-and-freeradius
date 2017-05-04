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

        $validaCPF = new ValidaCPF();
        if(!$validaCPF->validaCPF($username)):
            echo "CPF inválido!<br>";
            ?>
            <script type="text/javascript">
            sleep(1500);
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
                <script type="text/javascript">
                sleep(2);
                    window.location="../singin.php";
                </script>
                    <a href="../singin.php"><label>Se não for redirecionado automaticamente, clique aqui</label></a>

                <?php
            else:
                $user->insert();
                echo "Usuario cadastrado com sucesso!";

                ?>

                <script type="text/javascript">
                    sleep(2000);
                    window.location="../singin.php";
                </script>
                    <a href="../singin.php"><label>Se não for redirecionado automaticamente, clique aqui</label></a>

                <?php

            endif;
        endif;
    endif;
?>
