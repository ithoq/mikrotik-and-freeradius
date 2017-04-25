<?php

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



?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/master.css">
        <link rel="stylesheet" href="css/materialize.css">

        <meta name="viewport" content="width=device-width, user-scalable=no">
        <title>Radius</title>
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
    	<!--
    	    function doLogin() {
                    <?php if(strlen($chapid) < 1) echo "return true;\n"; ?>
    		document.sendin.username.value = document.login.username.value;
    		document.sendin.password.value = hexMD5('<?php echo $chapid; ?>' + document.login.password.value + '<?php echo $chapchallenge; ?>');
    		document.sendin.submit();
    		return false;
    	    }
    	//-->
    	</script>
    <!-- $(endif) -->
    <div class="container">
          <div class="img">
                <img class="responsive-img" src="img/wifi.png">
          </div>
         <div class="conteudo">
             <div class="row">
               <form name="login" action="<?php echo $linkloginonly; ?>" method="post" onSubmit="return doLogin()" >
                    <input type="hidden" name="dst" value="<?php echo $linkorig; ?>" />
        			<input type="hidden" name="popup" value="true" />
                 <div class="row">
                   <div class="input-field col s12">
                     <input id="username" placeholder="Username" name="username" type="text" class="input-field">
                     <label for="username"></label>
                   </div>
                 </div>
                 <div class="row">
                   <div class="input-field col s12">
                     <input id="password" placeholder="Password" name="password" type="password" class="">
                     <label for="password"></label>
                   </div>
                 </div>
                 <input type="submit" class="waves-effect waves-light btn" value="Login"></input>
                 <a href="singin.php"> <button type="button"  class="waves-effect waves-light btn btn1" value="Singin">Singin</button></a>
                 <a href="#"> <button type="button"  class="waves-effect waves-light btn btn2" value="Singin">Login with facebook</button></a>
               </form>
<!--
           <form name="login" action="<?php echo $linkloginonly; ?>" method="post" onSubmit="return doLogin()" >
			<input type="hidden" name="dst" value="<?php echo $linkorig; ?>" />
			<input type="hidden" name="popup" value="true" />

			<table width="100" style="background-color: #ffffff">
				<tr><td align="right">login</td>
				<td><input style="width: 80px" name="username" type="text" value="<?php echo $username; ?>"/></td>
				</tr>
				<tr><td align="right">password</td>
				<td><input style="width: 80px" name="password" type="password"/></td>
				</tr>
				<tr><td> </td>
				<td><input type="submit" value="OK" /></td>
				</tr>
			</table>
		</form>
-->
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
