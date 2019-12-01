<?php  //SUBIR IMAGENES

include("condb.php");
include("funciones.php");

//------------------------------------ VALIDACIONES -----------------------------------------------------
$_SESSION['error']='';

if(!isset($_POST['cod']) OR $_POST['cod']==""){
  $_SESSION['error']="Error: no se especific&oacute; un c&oacute;digo v&aacute;lido.";
}

//CHEQUEO QUE EL ARCHIVO NO EXCEDA EL PESO PERMITIDO
if($_FILES['archivo']['size']>67108864){
  $_SESSION['error']="El archivo que intenta subir supera el peso m&aacute;ximo permitido (64 mb). Peso del archivo: ".$_FILES['archivo']['size'];
}

if ($_SESSION['error']!='') {header("location: ../index.php?a=error");die;}

if(!isset($_POST['mod']) OR $_POST['mod']==""){$mod='1';}else{$mod=$_POST['mod'];}

$id=$_POST['cod'];
$dir=$_POST['dir'];
$cantmax=0;
if(isset($_POST['cantmax'])){$cantmax=$_POST['cantmax'];}
//-------------------------------------------------------------------------------------------------------

if($mod!='1'){
    $imgDEL=$_POST['imgDEL'];

    //MODO ELIMINAR IMAGEN ---------------------------------------------
    $dirBase="../../images/".$dir."/";
    unlink($dirBase."thu/".$imgDEL);
    unlink($dirBase."mid/".$imgDEL);
    unlink($dirBase."big/".$imgDEL);
}else{
  $pos=$_POST['pos'];

  if (isset($_POST['nomFile'])) {$nomFile=StrFileUrl($_POST['nomFile'], True);}else{$nomFile=$id.'_'.$pos;}

  //GUARDO LA IMAGEN
  SubirImagenRedim(230,160,$dir,$nomFile,'thu'); //THU
  SubirImagenRedim(280,165,$dir,$nomFile,'mid'); //MID
  SubirImagenRedim(500,300,$dir,$nomFile,'big'); //BIG
}

//VUELVO A PAGINA DE CARGA DE IMAGENES
header("location: ../index.php?a=imgAdmin&cod=".$id.'&dir='.$dir.'&cantmax='.$cantmax);


//******************************************************************************************************************************************************
//************************ ADMINISTRACION DE IMÁGENES SUBIDAS AL SERVIDOR ******************************************************************************
//******************************************************************************************************************************************************

function SubirImagenRedim($newWidth, $newHeight=0, $NomSubDir='',$NomFile='',$size='big') {

  if (!isset($newHeight) or $newHeight==0){$newHeight=$newWidth;}
  //CONTROLO LOS DIRECTORIOS -----------------------
  $dirBase="../../images/".$NomSubDir."/";
  $dirReal="";
  switch (strtoupper($size)) {
    case "THU":
      $dirReal=$dirBase."thu/";
      break;
    case "MID":
      $dirReal=$dirBase."mid/";
      break;
    case "BIG":
      $dirReal=$dirBase."big/";
      break;
  }
  //------------------------------------------------

  if (!file_exists($dirBase)){mkdir($dirBase);}
  if (!file_exists($dirReal)){mkdir($dirReal);}
  $nomFile=$dirReal.StrFileUrl($NomFile).".jpg";

  $info=getimagesize($_FILES['archivo']['tmp_name']);
  $widthORI = $info[0];
  $heightORI=$info[1];

  //CALCULO TAMAÑOS DE WIDTH Y HEIGHT IDEALES ---------------------
  if ($heightORI < $widthORI){
      // *** La imagen es más ancha que alta (apaisada)
  	$optimalWidth = $newWidth;
  	$optimalHeight= $newWidth * ($heightORI / $widthORI);
  }elseif ($heightORI > $widthORI){
      // *** La imagen es más alta que ancha (normal)
  	$optimalWidth = $newHeight * ($widthORI / $heightORI);
  	$optimalHeight= $newHeight;
  }else{
      // *** La imagen es cuadrada
  	if ($newHeight < $newWidth) {
  		$optimalWidth = $newWidth;
  		$optimalHeight= $newWidth * ($heightORI / $widthORI);
  	} else if ($newHeight > $newWidth) {
  		$optimalWidth = $newHeight * ($widthORI / $heightORI);
  		$optimalHeight= $newHeight;
  	} else {
  		$optimalWidth = $newWidth;
  		$optimalHeight= $newHeight;
  	}
  }
  //--------------------------------------------------------------------

  //CREO EL LIENZO PARA GUARDAR LA IMAGEN ------------------------------
  $imagen = imagecreatetruecolor($optimalWidth, $optimalHeight);

  //RE-CHEQUEO EL TIPO DE EXTENSION PARA CREAR LA IMAGEN ---------------
  switch($info['mime']){
      case "image/jpg":
          $imagenTMP = imagecreatefromjpeg($_FILES['archivo']['tmp_name']);
      break;

      case "image/jpeg":
          $imagenTMP = imagecreatefromjpeg($_FILES['archivo']['tmp_name']);
      break;

      case "image/gif":
          $imagenTMP = imagecreatefromgif($_FILES['archivo']['tmp_name']);
      break;

      case "image/png":
          $imagenTMP = imagecreatefrompng($_FILES['archivo']['tmp_name']);
      break;
  }

  //CHEQUEO QUE LA IMAGEN NO EXISTA, SI EXISTE LA BORRO ----------
  if(file_exists($nomFile)){unlink($nomFile);}

  //GUARDO LA IMAGEN
  imagecopyresampled($imagen, $imagenTMP, 0, 0, 0, 0, $optimalWidth, $optimalHeight, $info[0], $info[1]);
  imagejpeg($imagen, $nomFile, 100);
}
?>