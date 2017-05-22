<?php

    function __autoload($class_name){
        require_once 'php/'.$class_name.'.php';
    }

    $rad = new Radacct();

    $array = $rad->ativos();
    $inativos = $rad->inativos();

    $mediaDownload = $rad->mediaDownload();
    $mediaUpload = $rad->mediaUpload();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Dashboard</title>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">

        google.charts.load("current", {packages:["corechart"]});
              google.charts.setOnLoadCallback(drawChart);
              function drawChart() {
                var data = google.visualization.arrayToDataTable([
                  ['Task', 'Hours per Day'],
                  ['Ativos',     <?=count($array)?>],
                  ['Inativos',      <?=count($inativos)?>]
                ]);

                var options = {
                  title: 'Clientes',
                  is3D: true,
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                chart.draw(data, options);
              }
        </script>
        <link rel="stylesheet" href="css/administrador.css">
    </head>
    <body>
        <div class="content">
            <section id="float-left">
                <div id="top-dash">
                    <h1>Dashboard</h1>
                    <div id="logo">

                    </div>
                    <h2>Client name</h2>
                </div>
                <div id="menu-dash">
                    <ul>
                        <li id="home">Home</li>
                        <li id="cad">Cadastro</li>
                        <li id="rem">Remover</li>
                        <li id="atu">Atualizar</li>
                        <li id="bus">Buscas</li>
                    </ul>
                </div>
                <div id="bottom">
                </div>
            </section>
            <section>
                <section id="float-rigth">
                    <div id="top-grap">
                        <div id="grap-left">
                            <div id="piechart_3d" style="width: 420px; height: 220px;"></div>
                        </div>
                        <div class="line-vert"></div>
                        <div id="grap-rigth">
                            <div id="up">
                                <h1>Upload</h1>
                                <h3><?php echo sprintf("%3.3f", $mediaUpload)." MB" ?></h3>
                            </div>
                            <div id="down">
                                <h1>Download</h1>
                                <h3><?php echo sprintf("%3.3f", $mediaDownload)." MB" ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="line-hori"></div>
                    <div id="semi-bottom-grap">
                        <div id="cadastro" class="">
                            <h1>Cadastro de usuarios</h1>

                            <form class="" action="php/singup.php" method="post" target="_blank">
                                <input id="username" type="number" name="username" placeholder="CPF" value="">
                                <input id="password" type="number" name="password" placeholder="ROOM" value="">
                                <input id="repassword" type="number" name="repassword" placeholder="RE-ROOM" placeholder="RE-ROOM" value="">
                                <input id="dataNascimento" type="date" name="dataNascimento" value="">
                                <button type="submit" name="button">cadastrar</button>
                            </form>
                        </div>
                        <div id="remover" class="">
                            <h1>Remover cliente</h1>

                            <form class="" action="php/remover.php" method="post">
                                <input id="cpf" type="text" name="cpf" placeholder="CPF" value="">
                                <br>
                                <button type="submit" name="button">remover</button>
                            </form>
                        </div>
                        <div id="atualizar" class="">
                            <h1>Atualizar cliente</h1>

                            <form class="" action="php/alterar.php" method="post" target="_blank">
                                <input id="cpf" type="text" name="cpf" placeholder="CPF" value="">
                                <br>
                                <button type="submit" name="button">Atualizar</button>
                            </form>
                        </div>
                        <div id="busca" class="">
                            <h1>Busca por data</h1>

                            <form class="" action="buscas/connDateUser.php" method="post" target="_blank">
                                <input id="dataIni" type="date" name="dataIni" value="">
                                <input id="dataFin" type="date" name="dataFin" value="">
                                <button type="submit" name="button">buscar</button>
                            </form>

                            <h1>Busca por cliente</h1>

                            <form class="" action="buscas/SearchCPF.php" method="post" target="_blank">
                                <input id="cpf" type="text" name="cpf" placeholder="CPF" value>
                                <button type="submit" name="button">procurar</button>
                            </form>
                        </div>
                    </div>
                </section>
            </section>
        </div>
        <script type="text/javascript">

            document.getElementById('home').onclick = function(){home()};
            document.getElementById('cad').onclick = function(){cad()};
            document.getElementById('rem').onclick = function(){rem()};
            document.getElementById('atu').onclick = function(){atu()};
            document.getElementById('bus').onclick = function(){bus()};

            function home() {
                document.getElementById('cadastro').style.visibility = 'hidden';
                document.getElementById('remover').style.visibility = 'hidden';
                document.getElementById('atualizar').style.visibility = 'hidden';
                document.getElementById('busca').style.visibility = 'hidden';
            }

            function cad(){
                document.getElementById('cadastro').style.visibility = 'visible';
                document.getElementById('remover').style.visibility = 'hidden';
                document.getElementById('atualizar').style.visibility = 'hidden';
                document.getElementById('busca').style.visibility = 'hidden';
            }

            function rem() {
                document.getElementById('cadastro').style.visibility = 'hidden';
                document.getElementById('remover').style.visibility = 'visible';
                document.getElementById('atualizar').style.visibility = 'hidden';
                document.getElementById('busca').style.visibility = 'hidden';
            }

            function atu() {
                document.getElementById('cadastro').style.visibility = 'hidden';
                document.getElementById('remover').style.visibility = 'hidden';
                document.getElementById('atualizar').style.visibility = 'visible';
                document.getElementById('busca').style.visibility = 'hidden';
            }

            function bus() {
                document.getElementById('cadastro').style.visibility = 'hidden';
                document.getElementById('remover').style.visibility = 'hidden';
                document.getElementById('atualizar').style.visibility = 'hidden';
                document.getElementById('busca').style.visibility = 'visible';
            }

        </script>
    </body>
</html>
