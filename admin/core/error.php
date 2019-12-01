<?php
if (isset($_GET['msg'])) {$msg=$_GET['msg'];}else{$msg='<span class="Titulo">Se ha producido un error mientras<br />se intentaba realizar la operacion.</span>';}
if (isset($_GET['det'])) {$det=$_GET['det'];}else{$det="";}
if (isset($_SESSION['error'])){$det=$det.'<br>'.$_SESSION['error'];}
if (isset($det)){$msg=$msg.'<br /><br /><u><i>DETALLES:</i></u> <br />'.$det.'<br /><br />';}
?>

<center>
	<table align="center" width="90%" height="200" cellspacing="1"  class="error">
  		<tr>
    		<td>
    			<div><font color="#003366" size="3" class="Normal">
				<?php echo $msg; echo mysql_error(); ?> </font></div>
			</td>
  		</tr>
	</table>

	<input type="button" onClick="javascript:history.back(1)" value="Volver" class="mBtn Blue"><br><br>
</center>