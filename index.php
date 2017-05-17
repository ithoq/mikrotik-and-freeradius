<?php
/*
   $mac=$_POST['mac'];
   $ip=$_POST['ip'];
   $username=$_POST['username'];
   $linklogin=$_POST['link-login'];
   $linkorig=$_POST['link-orig'];
   $error=$_POST['error'];
   $chapid=$_POST['chap-id'];
   $chapchallenge=$_POST['chap-challenge'];
   $linkloginonly=$_POST['link-login-only'];
   $linkorigesc=$_POST['link-orig-esc'];
   $macesc=$_POST['mac-esc'];
*/
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/master.css">
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <title>Login Hotspot</title>
    </head>
    <body>
        <!-- $(if chap-id) -->

    	<form name="sendin" action="<?php echo $linkloginonly; ?>" method="post">
    		<input type="hidden" name="username" />
    		<input type="hidden" name="password" />
    		<input type="hidden" name="dst" value="<?php echo $linkorig; ?>" />
    		<input type="hidden" name="popup" value="true" />
    	</form>

    	<script type="text/javascript" src="md5.js"></script>
    	<script type="text/javascript">
    	    function doLogin() {
                <?php if(strlen($chapid) < 1) echo "return true;\n"; ?>
    		    document.sendin.username.value = document.login.username.value;
    		    document.sendin.password.value = hexMD5('<?php echo $chapid; ?>' + document.login.password.value + '<?php echo $chapchallenge; ?>');
    		    document.sendin.submit();
    		    return false;
    	    }
    	</script>
    <!-- $(endif) -->
    <div class="container">
         <div class="conteudo">
             <div class="row">

               <img id="logo" src="img/h10.png" alt="Hotel 10">

               <form name="login" action="<?php echo $linkloginonly; ?>" method="post" onSubmit="return doLogin()" >
    			<input type="hidden" name="dst" value="<?php echo $linkorig; ?>" />
    			<input type="hidden" name="popup" value="true" />

                <div class="form">
    			<table width="100" style="background-color: #ffffff">
    				<tr><td align="right"></td>
    				<td><input style="width: 200px" name="username" placeholder="Documento / ID number" type="text" value=""/></td>
    				</tr>
    				<tr><td align="right"></td>
    				<td><input style="width: 200px" placeholder="Apartamento / Room number" name="password" type="password"/></td>
    				</tr>
    				<tr><td> </td>
    				<td><input id="submit" style="width: 218px;" type="submit" value="ACESSAR | ACCESS" /></td>
    				</tr>
    			</table>
                </div>
                <div class="terms">
                    <h6>Read the contract here &nbsp<a href="#"> Terms of services</a> </h6>
                    <h6>Leia o contrato aqui &nbsp<a href="#"> Termos de serviços</a> </h6>
                </div>
    		</form>
        </div>
        <script type="text/javascript">

    	    function doLogin() {
                <?php if(strlen($chapid) < 1) echo "return true;\n"; ?>
        		document.sendin.username.value = document.login.username.value;
        		document.sendin.password.value = hexMD5('<?php echo $chapid; ?>' + document.login.password.value + '<?php echo $chapchallenge; ?>');
        		document.sendin.submit();
        		return false;
    	    }
    	</script>
    </div>
</div> <!-- Conteudo -->

    </div>
  </body>

</html>
