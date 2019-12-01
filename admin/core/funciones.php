<?php
include("condb.php");

/*-------------------------------------------------------------------*/
function GenArray($query) {
  if(mysql_num_rows($query)>0){
    while($row=mysql_fetch_array($query)){$Resp[$row[0]]=$row[1];}
  }else{$Resp=false;}
  return $Resp;
}

function devPaises(){$q=mysql_query("SELECT pais_id, pais_nombre FROM paises ORDER BY pais_nombre"); return GenArray($q);}
function devProvincias($idPais=13){$q=mysql_query("SELECT prov_id, prov_nombre FROM provincias WHERE pais_id=$idPais ORDER BY prov_nombre"); return GenArray($q);}

function devPosPublicidad(){$Resp[1]="En la derecha";$Resp[2]="En el pie de la pagina";return $Resp;}
function devBooleano(){$Resp[0]="No";$Resp[1]="Si";return $Resp;}

function genOptionsSelect($Array, $idSel=NULL){
  $encontrado=0;
  if (isset($Array)){
    $opciones="";
    foreach ($Array as $id => $dsc )  {
       if (isset($idSel) AND $idSel==$id) {$sel=" selected";$encontrado=1;}else{$sel="";}
       $opciones.='<option value="'.$id.'" '.$sel.'>'.$dsc.'</option>';
    }
    echo '<option value="" ';
    if ($encontrado==0) {echo " selected";}
    echo '>- Seleccione una opci&oacute;n -</option>';
    echo $opciones;
  }
}

function BuscarEnArray($Array, $idSel){
  $resp="";
  if (isset($Array) and $Array!=false){
    foreach ($Array as $id => $dsc )  {
       if (isset($idSel) AND $idSel==$id) {$resp=$dsc;}
    }
  }
  return $resp;
}

/*-------------------------------------------------------------------*/
function select_provincias($prov_id,$disabled){
    if ($disabled=='1' or $disabled=='True'){$dis = ' disabled';}else{$dis='';}
	echo '<select class="TextBox" style="padding: 0px;"'.$dis.' name="prov_id" id="prov_id" onchange="actualiza_combo(this, \'loca_id\')">';

        $query=mysql_query("SELECT * FROM provincias ORDER BY prov_nombre ASC");
        if(mysql_num_rows($query)>0){
            echo '<option value="0">-- Seleccione una provincia --</option>';
            while($prov=mysql_fetch_array($query)){
            	echo '<option value="' . $prov['prov_id'] . '" ';
                if($prov_id!=0){
            	    if($prov_id==$prov['prov_id']){
            		    echo 'selected="true"';
            	    }
                }
            	echo '>' . htmlspecialchars($prov['prov_nombre']) . '</option>';
            }
        }else{
            echo '<option value="0">-- Provincias no definidas --</option>';
        }

    echo '</select>';
}

/*-------------------------------------------------------------------*/
function select_localidades($loca_id, $prov_id,$disabled=0){
    if ($disabled=='1' or $disabled=='True'){$dis = ' disabled';}else{$dis='';}
	echo '<select class="TextBox" style="padding: 0px;"'.$dis.' name="loc" id="loc">';

		if($prov_id!=0){
			$query=mysql_query("SELECT loca_id, loca_nombre FROM localidades WHERE prov_id = ".$prov_id." ORDER BY loca_nombre ASC");
			if(mysql_num_rows($query)>0){
				while($loca=mysql_fetch_array($query)){
					echo '<option value="' . $loca['loca_id'] . '" ';
					if($loca_id==$loca['loca_id']){
						echo 'selected="true"';
					}
					echo '>' . htmlspecialchars(ucwords(strtolower($loca['loca_nombre']))) . '</option>';
				}
			}else{
				echo '<option value="0">-- Localidades no definidas --</option>';
			}
		}else{
			echo '<option value="0">- Seleccione primero una provincia -</option>';
		}

    echo '</select>';
}

/*-------------------------------------------------------------------*/
function nombre_pais($pais_id){
	$query=mysql_query("SELECT pais_nombre FROM paises WHERE pais_id=" . $pais_id);
	if(mysql_num_rows($query)>0){
		$pais=mysql_fetch_array($query);
		return $pais['pais_nombre'];
	}else{
		return "No definido.";
	}
}

/*-------------------------------------------------------------------*/
function nombre_paisdeprov($prov_id){
	$query=mysql_query("SELECT pais_nombre FROM paises
	INNER JOIN provincias ON paises.pais_id=provincias.pais_id
	WHERE prov_id=" . $prov_id);
	if(mysql_num_rows($query)>0){
		$dsc=mysql_fetch_array($query);
		return $dsc['pais_nombre'];
	}else{
		return "No definido.";
	}
}

/*-------------------------------------------------------------------*/
function nombre_provdeloc($loca_id){
	$query=mysql_query("SELECT provincias.prov_nombre FROM provincias
	INNER JOIN localidades ON provincias.prov_id=localidades.prov_id
	WHERE loca_id=" . $loca_id);
	if(mysql_num_rows($query)>0){
		$prov=mysql_fetch_array($query);
		return $prov['prov_nombre'];
	}else{
		return "No definido.";
	}
}

/*-------------------------------------------------------------------*/
function nombre_provincia($prov_id){
	$query=mysql_query("SELECT prov_nombre FROM provincias WHERE prov_id=" . $prov_id);
	if(mysql_num_rows($query)>0){
		$prov=mysql_fetch_array($query);
		return $prov['prov_nombre'];
	}else{
		return "No definido.";
	}
}

/*-------------------------------------------------------------------*/
function nombre_localidad($loca_id){
	$query=mysql_query("SELECT loca_nombre FROM localidades WHERE loca_id=" . $loca_id);
	if(mysql_num_rows($query)>0){
		$loca=mysql_fetch_array($query);
		return $loca['loca_nombre'];
	}else{
		return "No definido.";
	}
}

/*-------------------------------------------------------------------*/
/*-------------------------------------------------------------------*/

function RFecha ($fecha)
{
  if (!empty ($fecha) && $fecha!="0000-00-00" && $fecha!="00-00-0000") {
    $anio = substr ($fecha,0,4);
    $mes = substr($fecha,5,2);
    $dia = substr($fecha,8,2);
    $fecnue= "$dia/$mes/$anio";}
  else {$fecnue= "---";}
  return $fecnue;
}

function GFecha ($fecha)
{
  if (!empty ($fecha) && $fecha!="0000/00/00" && $fecha!="00/00/0000") {
    $anio = substr ($fecha,6,4);
    $mes = substr($fecha,3,2);
    $dia = substr($fecha,0,2);
    $fecnue= "$anio/$mes/$dia";
  }
  return $fecnue;
}

function MCad ($texto) {
	if (empty($texto)) {return ("---");}
	else {return ($texto);}
}

function CutText($txt, $long)
{
	$Tmp = substr ($txt,0, $long);
	if (strlen($txt) > $long) {$Tmp.="...";}
	return $Tmp;
}

function StrLongDate($fecha){
  $resp = NombreDia(strtotime($fecha));
  $resp = $resp.' '.date('d', strtotime($fecha));
  $resp = $resp.' de '.NombreMes($fecha);
  $resp = $resp.' de '.date('Y', strtotime($fecha));
  return $resp;
}
function NombreDia ($fecha) {
    switch(date('w',$fecha))
	{
	case "0": return "Domingo";break;
	case "1": return "Lunes";break;
	case "2": return "Martes";break;
	case "3": return "Mi&eacute;rcoles";break;
	case "4": return "Jueves";break;
    case "5": return "Viernes";break;
	case "6": return "S&aacute;bado";break;
	}
}

function NombreMes ($fecha) {return NombreMesNro(date('m',strtotime($fecha)));}
function NombreMesNro ($NroMes) {
  switch(str_pad($NroMes, 2, "0", STR_PAD_LEFT))
	{
	case "01": return "Enero";break;
	case "02": return "Febrero";break;
	case "03": return "Marzo";break;
	case "04": return "Abril";break;
	case "05": return "Mayo";break;
	case "06": return "Junio";break;
	case "07": return "Julio";break;
	case "08": return "Agosto";break;
	case "09": return "Septiembre";break;
	case "10": return "Octubre";break;
	case "11": return "Noviembre";break;
	case "12": return "Diciembre";break;
	}
}

function GetCampoFecha($dia, $mes, $anio, $Habilitar, $prefijo){
  if ($Habilitar=='1'){$disabled = '0';}else{$disabled = '1';}
  $resp=GetCampoDia($dia, $disabled, $prefijo);
  $resp.='&nbsp;<font size="2">/</font>&nbsp;';
  $resp.=GetCampoMes($mes, $disabled, $prefijo);
  $resp.='&nbsp;<font size="2">/</font>&nbsp;';
  $resp.=GetCampoAnio($anio, $disabled, $prefijo);
  return $resp;
}

function GetCampoDia($dia, $disabled, $prefijo){
  if ($disabled=='1' or $disabled=='True'){$dis = ' disabled';}else{$dis='';}
  //DIA -----------------------------
  if (!isset($dia) or ($dia=='')){$dia=date('j');}
  $resp='<select class="TextBox" id="'.$prefijo.'dia" name="'.$prefijo.'dia"'.$dis.' style="width:50px;padding:0px;">';
  $resp.='<option value="0">&nbsp;--&nbsp;</option>';
  for ($d=1; $d<=31; $d++)  {
    $resp.='<option value="'.$d.'"';
    if($d==$dia){$resp.=' selected';}
    $resp.='>&nbsp;'.str_pad($d, 2, "0", STR_PAD_LEFT).'</option>';
  }
  $resp.='</select>';
  return $resp;
}

function GetCampoMes($mes, $disabled, $prefijo){
  if ($disabled=='1' or $disabled=='True'){$dis = ' disabled';}else{$dis='';}
  //MES ------------------------------------------
  if (!isset($mes) or ($mes=='')){$mes=date('n');}
  $resp='<select class="TextBox" id="'.$prefijo.'mes" name="'.$prefijo.'mes"'.$dis.' style="width:50px;padding:0px;">';
  $resp.='<option value="0">&nbsp;--&nbsp;</option>';
  for ($m=1; $m<=12; $m++)  {
    $resp.='<option value="'.$m.'"';
    if($m==$mes){$resp.=' selected';}
    $resp.='>&nbsp;'.str_pad($m, 2, "0", STR_PAD_LEFT).'</option>';
  }
  $resp.='</select>';
  return $resp;
}

function GetCampoMesNom($mes, $disabled){
  if ($disabled=='1' or $disabled=='True'){$dis = ' disabled';}else{$dis='';}
  //MES ------------------------------------------
  if (!isset($mes) or ($mes=='')){$mes=date('n');}
  $resp='<select class="TextBox" id="mes" name="mes"'.$dis.'>';
  $resp.='<option value="0">----------</option>';
  for ($m=1; $m<=12; $m++)  {
    $resp.='<option value="'.$m.'"';
    if($m==$mes){$resp.=' selected';}
    $resp.='>&nbsp;'.NombreMesNro($m).'</option>';
  }
  $resp.='</select>';
  return $resp;
}

function GetCampoAnio($anio, $disabled, $prefijo){
  if ($disabled=='1' or $disabled=='True'){$dis = ' disabled';}else{$dis='';}
  //A? ------------------------------------------
  if (!isset($anio) or ($anio=='')){$anio=date('Y');}
  $resp='<select class="TextBox" id="'.$prefijo.'anio" name="'.$prefijo.'anio"'.$dis.' style="width:80px;padding:0px;">';
  $resp.='<option value="0">----</option>';
  for ($a=1930; $a<=date('Y'); $a++)  {
    $resp.='<option value="'.$a.'"';
    if($a==$anio){$resp.=' selected';}
    $resp.='>'.$a.'</option>';
  }
  $resp.='</select>';
  return $resp;
}

function GetCampoHora($hora, $disabled, $prefijo){
  if ($disabled=='1' or $disabled=='True'){$dis = ' disabled';}else{$dis='';}
  //DIA -----------------------------
  if (!isset($hora) or ($hora=='')){$hora=0;}
  $resp='<select class="TextBox" id="'.$prefijo.'hora" name="'.$prefijo.'hora"'.$dis.' style="width:50px;padding:0px;">';
  $resp.='<option value="0">&nbsp;--&nbsp;</option>';
  for ($h=0; $h<=23; $h++)  {
    $resp.='<option value="'.$h.'"';
    if($h==$hora){$resp.=' selected';}
    $resp.='>&nbsp;'.str_pad($h, 2, "0", STR_PAD_LEFT).'</option>';
  }
  $resp.='</select>';
  return $resp;
}

function GetCampoMin($min, $disabled, $prefijo){
  if ($disabled=='1' or $disabled=='True'){$dis = ' disabled';}else{$dis='';}
  //DIA -----------------------------
  if (!isset($min) or ($min=='')){$min=0;}
  $resp='<select class="TextBox" id="'.$prefijo.'min" name="'.$prefijo.'min"'.$dis.' style="width:50px;padding:0px;">';
  $resp.='<option value="0">&nbsp;--&nbsp;</option>';
  for ($m=0; $m<=60; $m++)  {
    $resp.='<option value="'.$m.'"';
    if($m==$min){$resp.=' selected';}
    $resp.='>&nbsp;'.str_pad($m, 2, "0", STR_PAD_LEFT).'</option>';
  }
  $resp.='</select>';
  return $resp;
}

Function CalcularEdad($fecha){
  if (isset($fecha) and $fecha!=""){
    list($BirthYear,$BirthMonth,$BirthDay) = explode("-", $fecha);
    // Find the differences
    $YearDiff = date("Y") - $BirthYear;
    $MonthDiff = date("m") - $BirthMonth;
    $DayDiff = date("d") - $BirthDay;
    // If the birthday has not occured this year
    if ($DayDiff < 0 || $MonthDiff < 0)
      $YearDiff--;
  }
  return $YearDiff;
}

//FUNCIONES PARA ENVIO DE MAILS ***************************************************************
function armarMail($contHTML){
  $html='<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" background="http://www.podologiadeportivasanluis.com/images/mailBG.jpg"><tr><td>
          <table width="600" align="center" cellpadding="0" cellspacing="0" style="border:1px solid #999;background-color: #FFF;margin: 10px auto;min-height:200px">
            <tr>
                <td align="left" style="padding:20px;"><img src="http://www.podologiadeportivasanluis.com/images/mailLogo.jpg" width="200" height="80" alt="Logo" /></td>
                <td align="right" style="padding:35px 20px;"><img src="http://www.podologiadeportivasanluis.com/images/mailDatos.jpg" width="200" height="80" alt="Datos de Contacto" /></td>
            </tr>
            <tr>
              <td colspan="2" style="clear:both;padding:20px 40px;font-size: 14px;font-family:Arial;color:#5A5C5C;text-align: justify;font-style: italic;">';
  $html.= $contHTML;
  $html.="    </td>
            </tr>
            </table>
          </td></tr></table>";
  return $html;
}

function sendmail($ToDir,$ToName, $FromName, $From, $Subject,$Text){

 $ToDir or die("recipient address missing");
 $headers = "MIME-Version: 1.0\r\n";
 $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
 $headers.="From: $FromName <".$From.">\n";
 $headers.="X-Mailer: PHP/".phpversion()."\n";

 return (mail($ToDir,$Subject,$Text,$headers));

}


//---------------------------------------------------------------------------------
function dirImages($dir) {
  $d = dir($dir);
  $CantImg = 0;
  if (file_exists($dir)) {
    while (false!== ($file = $d->read()))
    {
        $extension = strtolower(substr($file, strrpos($file, '.')));
        if($extension == ".jpg" || $extension == ".jpeg" || $extension == ".gif" |$extension == ".png") {
          $images[$file] = $file;
          $CantImg++;
        }
    }
    $d->close();
  }
  if($CantImg!=0) {
    asort($images);
    return $images;
  }
}

function startsWith($haystack,$needle,$case=true) {
    if($case){return (strcmp(substr($haystack, 0, strlen($needle)),$needle)===0);}
    return (strcasecmp(substr($haystack, 0, strlen($needle)),$needle)===0);
}

function SacarAcentos($texto){
	$texto=str_replace("á", "a", $texto);
	$texto=str_replace("Á", "A", $texto);
	$texto=str_replace("é", "e", $texto);
	$texto=str_replace("É", "E", $texto);
	$texto=str_replace("í", "i", $texto);
	$texto=str_replace("Í", "I", $texto);
	$texto=str_replace("ó", "o", $texto);
	$texto=str_replace("Ó", "O", $texto);
	$texto=str_replace("ú", "u", $texto);
	$texto=str_replace("Ú", "U", $texto);
	$texto=str_replace("ñ", "n", $texto);
	$texto=str_replace("Ñ", "N", $texto);
	return $texto;
}

function StrFileUrl($string = '', $is_filename = FALSE)
{
 // Replace all weird characters with dashes
    $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "=", "+", "[", "{", "]",
                   "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
                   "—", "–", ",", "<", ".", ">", "/", "?");
    $clean = trim(str_replace($strip, "", strip_tags($string)));
    $clean = preg_replace('/\s+/', "-", $clean);

 return $clean;
}

function sanitize($value, $type)
{
  $value = (!get_magic_quotes_gpc()) ? addslashes($value) : $value;
  switch ($type) {
    case "text":
      $value = ($value != "") ? "'" . $value . "'" : "''";
      break;
    case "long":
    case "int":
      $value = ($value != "") ? intval($value) : "NULL";
      break;
    case "double":
      $value = ($value != "") ? "'" . doubleval($value) . "'" : "0";
      break;
    case "date":
      $value = ($value != "") ? "'" . $value . "'" : "NULL";
      break;
  }
  return $value;
}

function sanitizeTxt($value)
{
  $value = (!get_magic_quotes_gpc()) ? addslashes($value) : $value;
  $value = ($value != "") ? $value : "";
  return $value;
}

function GetURLyoutube($url){
    parse_str(parse_url($url, PHP_URL_QUERY), $qstring);
    $url='http://www.youtube.com/v/'.$qstring['v'].'?rel=0&amp;feature=player_embedded#%21?fs=1';
    return '<embed src="'.$url.'" quality="high" type="application/x-shockwave-flash" allowfullscreen="true" allownetworking="internal" autoplay="false" wmode="transparent" height="550" width="900" style="border:1px solid #999">';
}

function GetIMGyoutube($url) {
	if(strlen($url)) {
        parse_str(parse_url($url, PHP_URL_QUERY), $qstring);
	    return 'http://img.youtube.com/vi/'.$qstring['v'].'/0.jpg';
	}else{return "";}
}
?>