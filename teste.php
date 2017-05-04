<?php

    function __autoload($class_name){
        require_once 'php/'.$class_name.'.php';
    }

    $t = new Radacct();
    $radchek = new Radcheck();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
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
      <section>
          <h2>Conexões por data</h2>
          <form class="" action="buscas/connDateUser.php" method="post">
              <input id="dataInicial" type="text" name="dataInicial" value="" placeholder="0000/00/00">
              <input id="dataFinal" type="text" name="dataFinal" value="" placeholder="0000/00/00">
             <button type="submit" name="button">Mostrar</button>
          </form>
      </section>
      <section>
          <h2>Buscar por CPF</h2>
          <form class="" action="buscas/SearchCPF.php" method="post">
              <input type="text" id="cpf" name="cpf" value=""/>
              <button type="submit" name="button">Mostrar</button>
          </form>
      </section>
      <section>
          <h2>Remover cliente</h2>
          <form class="" action="remover.php" method="post">
              <input type="text" name="id" value="" placeholder="#id do cliente">
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
