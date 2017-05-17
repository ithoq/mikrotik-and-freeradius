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
            <!DOCTYPE html>
            <html>
              <head>
                <meta charset="utf-8">
                <link rel="stylesheet" href="css/administrador.css">
                <title>Pagina de administração</title>
                <style media="screen">
                    td{
                        display: block;
                    }
                </style>
              </head>
              <body>
                  <h1>Pagina de administração</h1>
                  <a href="singin.php"> <button type="button" name="button">Cadastrar usuario</button> </a>
                  <section id="date">
                      <h2>Conexões por data</h2>
                      <form class="" action="buscas/connDateUser.php" method="post" target="_blank">
                          <input id="dataInicial" type="text" name="dataInicial" value="" placeholder="0000-00-00">
                          <input id="dataFinal" type="text" name="dataFinal" value="" placeholder="0000-00-00">
                         <button type="submit" name="button">Mostrar</button>
                      </form>
                  </section>
                  <section>
                      <h2>Buscar por CPF</h2>
                      <form class="" action="buscas/SearchCPF.php" method="post" target="_blank">
                          <input type="text" id="cpf" name="cpf" value="" placeholder="CPF"/>
                          <button type="submit" name="button">Mostrar</button>
                      </form>
                  </section>
                  <section>
                      <h2>Alterar cadastro cliente</h2>
                      <form class="" action="alterar.php" method="post" target="_blank">
                          <input id="cpf" type="text" placeholder="CPF" name="cpf" value="">
                          <button type="submit" name="button">Alterar</button>
                      </form>
                  </section>
                  <section>
                      <h2>Remover cliente</h2>
                      <form class="" action="remover.php" method="post" target="_blank">
                          <input type="text" name="id" value="" placeholder="CPF">
                          <button type="submit" name="button">Remover</button>
                      </form>
                  </section>
                  <hr>
                  <h2>Tabela de clientes</h2>
                  <section>
                      <table>
                          <tr>
                              <?php foreach ($radchek->findAll() as $key => $value) {
                                ?>
                              <td><?php echo "<b>id-></b> ".$value['id'].": <b>CPF:</b> ".$value['username']
                                    ." <b>Quarto: </b> ".$value['value']." <b>Data Nascimento: </b>".$value['dataNascimento'] ; }?> </td>
                          </tr>
                      </table>
                  </section>
              </body>
            </html>
            <?
        else:
            echo "Administrador não cadastrado!";
        endif;

    endif;

?>
