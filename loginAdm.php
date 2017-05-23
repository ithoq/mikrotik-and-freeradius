
<!DOCTYPE html>
<meta charset="utf-8">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Página de login para o TomTicket.">
    <meta name="author" content="TomTicket">

    <link rel="shortcut icon" href="http://www.isq.pt/wp-content/uploads/sites/78/2016/10/Inspecoes-Tecnicas-Entypo_e73e359_256.png">

    <title>CONECTA TECNOLOGIA - CONECTA TECNOLOGIA</title>

    <!-- Bootstrap core CSS -->
    <link href="https://s3.amazonaws.com/tomticket-assets/third-party/btsp3/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://conectagoias.tomticket.com/helpdesk/stylelogin" rel="stylesheet">

</head>

<body class="login">

<div class="container">

    <div class="text-center"><img src="https://tomticket-assets.s3.amazonaws.com/logotipo-departamento/25648.png" class="logotipo"></div>
    <br>
    <form class="form-signin" role="form" method="post" action="adminn.php">
        <input type="hidden" name="id" value=""/>
        <input type="hidden" name="ep" value=""/>
        <input type="hidden" name="account" value="924096P18012017105152"/>
        <h4 class="form-signin-heading text-center">Login</h4>

        <input type="text" class="form-control login-field" name="user" value="" placeholder="Username"
               required autofocus>


        <input type="password" class="form-control" name="pass" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
    </form>

    <br>

</div> <!-- /container -->

<footer class="footer">
    <div class="container">
    </div>
</footer>

<script src="https://d3sp7qnmxop1ri.cloudfront.net/third-party/jquery/jquery-1.10.2.min.js"></script>
<script>
    jQuery.fn.preventDoubleSubmission = function () {
        $(this).on('submit', function (e) {
            var $form = $(this);

            if ($form.data('submitted') === true) {
                // Previously submitted - don't submit again
                e.preventDefault();
            } else {
                // Mark it so that the next submit can be ignored
                $form.data('submitted', true);
            }
        });

        // Keep chainability
        return this;
    };
    $('form').preventDoubleSubmission();
</script>

</body>
</html>
