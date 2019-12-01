<?php      
    include ("condb.php");    
     $id=$_POST['pid'];
     $estado=$_POST['pedi_estado'];
     $sql="UPDATE pedidos SET pedi_estado=" . $estado . " WHERE pedi_id=" . $id;
     mysqli_query($conectar, $sql) or die($sql . "<br />" . mysql_error());
     header("location: ../index.php?a=verpedido&id=".$id);
?>