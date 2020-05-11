$(document).ready(function(){

var url = window.location;

if (url.href.split("/").length > 4) {
	document.querySelector("#search").value = url.href.split("/")[4];
}

function bandera(cadena){
    var acum = cadena.split(" ");
	for(ele in acum){
	    if(acum[ele] != ""){
	    return true;
	    }
	}return false
}

var divmin = document.createElement('div');
divmin.setAttribute('style','height:0px;margin-top:0px;z-index:2;position:relative;width:100%');
divmin.setAttribute('id','divbusqueda');
divmin.setAttribute('class','list-group');

var imgsbusqueda = [];
var timeout;
document.querySelector("#search").addEventListener("keyup",function(){
	clearTimeout(timeout);
	timeout = setTimeout(() =>  {
	var texto = document.querySelector("#search").value;
	console.log(texto);
	if(!bandera(texto)){
		if(document.querySelector("#divbusqueda")){
		document.querySelector("#divbusqueda").style.display = "none";
		}
	}else{
			if(document.querySelector("#divbusqueda")){
		document.querySelector("#divbusqueda").innerHTML = "";
		document.querySelector("#divbusqueda").style.display = "block";
		}

		$.ajaxSetup({
			headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
		});
		$.ajax({
			url : "/buscarProducto",
			type: "GET",
			data:{texto},
			success: function(response){
				var resbusqueda = [];

				for(elemento in response){
					var textoa = document.createTextNode(response[elemento]['name']);

					var link = document.createElement('a');
					link.setAttribute('href','/productos/'+response[elemento]['id']);
					link.setAttribute('style','text-decoration:none;width:100%;padding-top: 0px;padding-bottom: 0px');
					link.setAttribute('class','list-group-item list-group-item-action');
					link.addEventListener("mouseover", function(){
						this.setAttribute("class","list-group-item list-group-item-action active");
					});
					link.addEventListener("mouseout", function(){
						this.setAttribute("class","list-group-item list-group-item-action");
					});
					//link.append(textoa);

					var img = document.createElement('img');
					img.setAttribute('src','/storage/product/'+response[elemento]['image']);
					img.setAttribute('style','max-height: 50px');

					//var divContainer = document.createElement('div');
					//divContainer.setAttribute("class", "container");

					var divRow = document.createElement('div');
					divRow.setAttribute("class", "row");
					divRow.setAttribute("style", "padding-left: 10px;padding-right: 10px");

					var divCol1 = document.createElement('div');
					divCol1.setAttribute("class", "col");

					var divCol2 = document.createElement('div');
					divCol2.setAttribute("class", "col");
					divCol2.setAttribute("style", "text-align:right");

					divCol1.setAttribute('style','display: flex;justify-content: center;align-content: center;flex-direction: column');
					divCol1.append(textoa);

					divCol2.append(img);

					divRow.append(divCol1);					 
					divRow.append(divCol2);					 
					//divContainer.append(divRow);

					link.append(divRow);					 

					//link.append(img);
					resbusqueda[parseInt(elemento)] = link;
				}
				for(ele in resbusqueda){
					divmin.append(resbusqueda[ele]);

				}
				document.querySelector('section').prepend(divmin);
			},
	        error:function(){ 
	            console.log("error!!!!");
	        }
		});
	}
		clearTimeout(timeout);
	}, 1000);
	
})



document.querySelector("#search").parentNode.addEventListener("submit",function(e){
	e.preventDefault();
	var texto = document.querySelector("#search").value;
	window.location = "/listado/"+texto;
	})
});
	
