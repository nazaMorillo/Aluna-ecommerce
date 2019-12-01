<?php
include('condb.php'); 
header("Content-Type: application/vnd.ms-excel");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=Listado.xls");

  $lista_ped = mysqli_query($conectar, "SELECT pe.pedi_id, pe.pedi_fecha_compra, u.usua_nombre, u.usua_usuario, pro.prov_nombre, l.loca_nombre, pe.pedi_total, pe.pedi_estado FROM pedidos AS pe JOIN usuarios AS u JOIN localidades AS l JOIN provincias AS pro WHERE pe.usua_id = u.usua_id AND u.loca_id= l.loca_id AND u.prov_id = pro.prov_id ORDER BY pe.pedi_fecha_compra DESC");
	?>
<!DOCTYPE HTML>
<html lang="es">
<head>
	<title> Panel de Control - Tikay</title>
	<meta charset="UTF-8" />
	<meta name="author" content="Jarsolutions" />
	<meta name="description" content="Página Web de Tikay Cosméticos"/>
	<meta name="keywords" content="Tikay " />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  	<meta name="apple-mobile-web-app-capable" content="yes" />
  	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
  	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<body>
<center>
<div class="card col-xs-12 col-sm-12 col-md-12 col-lg-12" style="float:center; margin:0px;padding:0px;" id="ABM nov" >
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="float:center" id="listar nov" >
		<table id="pedlista" name="pedlista" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th><p style="font-size:14px">código</p></th>
                <th><p style="font-size:14px">Fecha</p></th>
                <th><p style="font-size:14px">Nombre</p></th>
                <th><p style="font-size:14px">Usuario</p></th>
                <th><p style="font-size:14px">Provincia</p></th>
                <th><p style="font-size:14px">Ciudad</p></th>
                <th><p style="font-size:14px">Total</p></th>
                <th><p style="font-size:14px">Estado</p></th>
            </tr>
		</thead>
		<tbody>
			<?php 
            while($ped = mysqli_fetch_array($lista_ped , MYSQLI_NUM)){
            ?>
            <tr>
				<td><p style="font-size:11px"><?php echo $ped[0] ?></p></td>
                <td><p style="font-size:11px"><?php echo $ped[1] ?></p></td>
                <td><p style="font-size:11px"><?php echo $ped[2] ?></p></td>
                <td><p style="font-size:11px"><?php echo $ped[3] ?></p></td>
                <td><p style="font-size:11px"><?php echo $ped[4] ?></p></td>
                <td><p style="font-size:11px"><?php echo $ped[5] ?></p></td>
                <td><p style="font-size:11px"><?php echo $ped[6] ?></p></td>
                
			</tr><?php
           } ?>
		</tbody>
        </table>
    </div>
</div>
</center>
</body>
</html>