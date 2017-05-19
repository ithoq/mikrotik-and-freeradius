<?php

    function __autoload($class_name){
        require_once $class_name.'.php';
    }

    $cpf = $_POST['cpf'];
    $radcheck = new Radcheck();
    $dados = $radcheck->findCPF($cpf);

    if(empty($_POST['cpf']) || empty($_POST['room']) || empty($_POST['data'])):
    else:
        $user = $_POST['cpf'];
        $room = $_POST['room'];
        $data = $_POST['data'];

        $valida = new ValidaCPF();

        if($valida->validaCPF($cpf)):
            $radcheck->username = $user;
            $radcheck->value = $room;
            $radcheck->dataNascimento = $data;
            $radcheck->update($cpf);
            echo "Usuario alterado com sucesso!";
        else:
            echo "CPF INVALIDO!";
        endif;
    endif;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Alterar cadastro</title>
    </head>
    <body>
        <h2>Alterar cadastro</h2>
        <section>
            <label for="">CPF: <?php echo $dados['username'] ?> </label>
            <label for="">Room: <?php echo $dados['value'] ?> </label>
            <label for="">Data de nascimento: <?php echo $dados['dataNascimento'] ?> </label>
        </section>
        <hr>
        <section>
            <form class="" action="alterar.php" method="post">
                <label for="">CPF: <input id="cpf" type="text" name="cpf" value=""> </label>
                <label for="">ROOM: <input id="room" type="text" name="room" value=""> </label>
                <label for="">DATA DE NASCIMENTO: <input id="data" type="text" name="data" value=""> </label>
                <button type="submit" name="button">Alterar</button>
            </form>
        </section>
    </body>
</html>
