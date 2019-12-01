/**
 * DHTML date validation script. Courtesy of SmartWebby.com (http://www.smartwebby.com/dhtml/)
 */
// Declaring valid date character, minimum year and maximum year
var dtCh= "/";
var minYear=1900;
var maxYear=2100;

function isInteger(s){
	var i;
    for (i = 0; i < s.length; i++){
        // Check that current character is number.
        var c = s.charAt(i);
        if (((c < "0") || (c > "9"))) return false;
    }
    // All characters are numbers.
    return true;
}

function stripCharsInBag(s, bag){
	var i;
    var returnString = "";
    // Search through string's characters one by one.
    // If character is not in bag, append to returnString.
    for (i = 0; i < s.length; i++){
        var c = s.charAt(i);
        if (bag.indexOf(c) == -1) returnString += c;
    }
    return returnString;
}

function daysInFebruary (year){
	// February has 29 days in any year evenly divisible by four,
    // EXCEPT for centurial years which are not also divisible by 400.
    return (((year % 4 == 0) && ( (!(year % 100 == 0)) || (year % 400 == 0))) ? 29 : 28 );
}
function DaysArray(n) {
	for (var i = 1; i <= n; i++) {
		this[i] = 31
		if (i==4 || i==6 || i==9 || i==11) {this[i] = 30}
		if (i==2) {this[i] = 29}
   }
   return this
}

function ValidarFecha(Dia, Mes, Anio){
	var daysInMonth = DaysArray(12)
	var strMonth=Mes
	var strDay=Dia
	var strYear=Anio
	strYr=strYear
	if (strDay.charAt(0)=="0" && strDay.length>1) strDay=strDay.substring(1)
	if (strMonth.charAt(0)=="0" && strMonth.length>1) strMonth=strMonth.substring(1)
	for (var i = 1; i <= 3; i++) {
		if (strYr.charAt(0)=="0" && strYr.length>1) strYr=strYr.substring(1)
	}
	month=parseInt(strMonth)
	day=parseInt(strDay)
	year=parseInt(strYr)
	if (strDay.length<1 || day<1 || day>31){
		alert("Por favor, ingrese un dia correcto")
		return false
	}
	if (strMonth.length<1 || month<1 || month>12){
		alert("Por favor, ingrese un mes correcto (ente 1 y 12)")
		return false
	}
	if (strDay.length<1 || day<1 || day>31 || (month==2 && day>daysInFebruary(year)) || day > daysInMonth[month]){
		alert("La fecha ingresada no es válida.")
		return false
	}
	if (strYear.length != 4 || year==0 || year<minYear || year>maxYear){
		alert("Por favor, ingrese un año válido (de 4 digitos), entre "+minYear+" y "+maxYear)
		return false
	}
return true
}

//------------------------------------------------------//
//						AJAX							//
//------------------------------------------------------//
function RefreshCombo(ComboOri, ComboRefresh, NomProceso)
{
	ComboRefresh=document.getElementById(ComboRefresh);
	limpia_combo(ComboRefresh);
	if(ComboOri.options[ComboOri.selectedIndex].value != ''){
		ComboOri.disabled=true;
		ComboRefresh.disabled=true;

		$.ajax({
			type: 'post', //forma en que envo los datos
			dataType: 'json', //forma en que devuelve los datos
			url: 'js/'+NomProceso+'.php', //pagina que procesa y devuelve los datos
			data: {valor: ComboOri.options[ComboOri.selectedIndex].value}, //informacion que envio a traves del 'type' y que recibe la pag q procesa
			success: function(json){
				llena_combo(json, ComboRefresh);
				ComboOri.disabled=false;
				ComboRefresh.disabled=false;
			}

		})
	}
}

function limpia_combo(combo){
	while(combo.length>0){
		combo.remove(combo.length-1);
	}
}

function llena_combo(json, combo){
	if(json[0].id==0){
		for(i=0;i<json.length;i++){
			combo.options[combo.length]=new Option(json[i].nombre, json[i].id);
		}
	}else{
		combo.options[0]=new Option("- Seleccione una opción -", 0);
		for(i=0;i<json.length;i++){
			combo.options[combo.length]=new Option(json[i].nombre, json[i].id);
		}
	}
}

function HabilitarCampo(id, habilitar)
{
  	campo=document.getElementById(id);
    if(habilitar){
        campo.blur()
        campo.disabled=true
    }else{
        campo.disabled=false
    }
}

//UPLOAD DE IMAGENES
function validar_file(input){
    input2=document.getElementById(input);

    if(input2.value=="" || input2.value==null){
        alert("Debe seleccionar un archivo para subirlo.");
        return false;
    }else{
        ext=input2.value.split(".");
        pos=ext.length-1;
        if(ext[pos].toUpperCase()=="JPG" || ext[pos].toUpperCase()=="GIF" || ext[pos].toUpperCase()=="PNG"){
            return true;
        }else{
            alert("Debe seleccionar un tipo de archivo válido ('jpg', 'gif', 'png').");
            return false;
        }

    }
}

function CambiarCont(id)
{
    var ListaBTNs = document.getElementById('Btns').getElementsByTagName("LI");
    for (var i=0; i<ListaBTNs.length; i++) {if (ListaBTNs[i].className=='active') ListaBTNs[i].className = '';}
	document.getElementById('Btn'+id).className = 'active';

	var ListaCont = document.getElementById('Cont').getElementsByTagName("DIV");
	for (var j=0; j<ListaCont.length; j++){if (ListaCont[j].className=='Contenido') ListaCont[j].style.display = 'none';}
	document.getElementById('Cont'+id).style.display = 'block';
}

function OcultarMostrar(id)
{
    var obj = document.getElementById(id);
    if (obj.style.display=='none') {obj.style.display = '';}else{obj.style.display = 'none';}
}

$(document).ready(function(){
    $(document).pngFix();
});