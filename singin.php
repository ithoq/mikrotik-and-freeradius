<?php

    function __autoload($class_name){
        require_once 'php/'.$class_name.'.php';
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <!-- <link rel="stylesheet" href="css/singin.css">
        <link rel="stylesheet" href="css/materialize.css">
    -->
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <title>Cadastro de clientes</title>
        <script type="text/javascript">
        var txt;
        var person = prompt("Por favor autentique - se");
        if (person == null || person == "") {
            txt = "Cancelado.";
            window.location="index.php";
        }else if(person == 3284){

        } else {
            window.location="index.php";
        }
        </script>
    </head>
    <body>
    <div class="container">
         <div class="conteudo">
             <div class="row">
               <form class="col s12" action="php/singup.php" method="post">
                 <div class="row">
                   <div class="input-field col s12">
                     <input id="username" name="username" placeholder="CPF" type="text" class="validate">
                     <label for="username"></label>
                   </div>
                 </div>
                 <div class="row">
                   <div class="input-field col s12">
                     <input id="password" name="password" placeholder="Room" type="text" class="validate">
                     <label for="password"></label>
                   </div>
                 </div>
                 <div class="row">
                   <div class="input-field col s12">
                     <input id="repassword" name="repassword" placeholder="Re-Room" type="text" class="validate lighten-2">
                     <label for="repassword" class="input-field label"></label>
                   </div>
                 </div>
                 <div class="row">
                   <div class="input-field col s12">
                     <input id="dataNascimento" name="dataNascimento" placeholder="data nascimento" type="text" class="validate lighten-2">
                     <label for="DataNascimento" class="input-field label"></label>
                   </div>
                 </div>
                 <input type="submit"  class="waves-effect waves-light btn btn1" value="Singin"></input>
               </form>

           </div>
         </div>
         <div class="foot">
             <div class="left">
                 <h6>Conecta soluções</h6>
             </div>
             <div class="rigth">
                 <h6>Radius technology</h6>
             </div>
             <div class="both"></div>
         </div>
    </div>
  </body>

</html>
