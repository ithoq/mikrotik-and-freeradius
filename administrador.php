<?php
    function __autoload($class_name){
        require_once 'php/'.$class_name.'.php';
    }

    if(empty($_POST['user']) && empty($_POST['pass'])):
    else:
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $login = new LoginAdmin();

        if($login->login($user,$pass)):
            session_start();
            $_SESSION['user'] = "$user";
            $_SESSION['pass'] = "$pass";
            $t = new Radacct();
            $radchek = new Radcheck();
            // SE ESTIVER LOGADO MOSTRA A PAGINA DE ADM SE NAO SÓ EXIBE UMA MENSAGEM;
            ?>

            <?
        else:
            echo "Administrador não cadastrado!";
        endif;

    endif;

?>
