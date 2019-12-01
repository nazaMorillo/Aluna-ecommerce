<?php
if (isset( $_POST['txtUser'])) {$txtUser = $_POST['txtUser'];}
if (isset( $_POST['txtPass'])) {$txtPass = $_POST['txtPass'];}

if (!empty($txtUser)){
	$usuarioquery = mysqli_query($conectar, "SELECT usua_id, usua_nombre, usua_tipo FROM usuarios WHERE usua_estado = 1 AND usua_usuario='".$txtUser."' AND usua_password='".$txtPass."'") or die(mysqli_error());
	$usuario = mysqli_fetch_array($usuarioquery, MYSQLI_NUM);
	if (mysqli_num_rows($usuarioquery)==1){
        $_SESSION['UserID']     = $usuario[0] ;
        $_SESSION['UserNomApe'] = $usuario[1] ;
		$_SESSION['UserTipo'] = $usuario[2] ;
        $_SESSION['UserName']=$txtUser;
		echo "<script>document.location='index.php?a=pedidos'</script>";
	}
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">

</head>
<br><br><br>
<div class="card col-xs-12 col-sm-12 col-md-10 col-lg-8 offset-lg-2 offset-md-1">
	<!------------------------ FORMULARIO LOGIN -------------------------------->
	<div class="card-block">
		<form name="frmLogin" method="post" action="index.php?a=login">
		<div class="form-header blue-gradient">		
        	<h3> <i class="fa fa-lock"></i>INGRESO&nbsp;DE&nbsp;USUARIO</h3>
        </div>	
		
        <div class="md-form">
        <i class="fa fa-user prefix"></i>
			<input type="text" id="txtUser" name="txtUser" class="form-control" placeholder="Nombre de usuario" value="<?php if (isset($txtUser)){echo $txtUser;} ?>" required>			
		</div> 
		<div class="md-form">
        <i class="fa fa-lock prefix"></i>
			<input type="password" id="txtPass" name="txtPass" class="form-control" placeholder="Contrase&ntilde;a"  value="<?php if (isset($txtUser)){echo $txtUser;} ?>" required>
		</div>
		<?php if (isset($txtUser) AND !isset($_SESSION['username'])){
			echo '<center> <div class="text-danger error" style="margin-bottom:0px;"><br />Nombre de usuario o contrase&ntilde;a incorrectos.<BR>Intente nuevamente.<br /><br /></div></center>';
		} ?>
		<div class="text-center">
		<button class="btn btn-deep-purple" type=submit>Ingresar</button>
	</form>	
 	<!------------------------ FIN FORMULARIO LOGIN -------------------------------->
	 </div>
</div>

