$(document).ready(function(){

var url = window.location;

if (url.href.split("/").length > 4) {
	document.querySelector("#search").value = url.href.split("/")[4];
}

/*document.querySelector("#carrito").addEventListener("click",function(e){
	e.preventDefault();
	if(url.href.split("/").length > 4){
		window.location = "carrito";
	}
})*/

//document.querySelector('body').setAttribute('style','overflow-x:hidden');
//document.querySelector('html').setAttribute('style','overflow-x:hidden');

function bandera(cadena){
    var acum = cadena.split(" ");
	for(ele in acum){
	    if(acum[ele] != ""){
	    return true;
	    }
	}return false
}

/*function inicializarHTMLtemporal(){
	var divmin = document.createElement('div');
	divmin.setAttribute('style','height:1px;margin-top:-1px;margin-left:48px;z-index:2;position:relative');
	divmin.setAttribute('class','col-md-6');
	var ulista = document.createElement('ul');
	ulista.setAttribute('style','background-color:white; list-style:none;max-height:49.813px');
	ulista.setAttribute('id','ulbusqueda');
	divmin.append(ulista);
}

inicializarHTMLtemporal();*/

var divmin = document.createElement('div');
divmin.setAttribute('style','height:1px;margin-top:1px;z-index:2;position:relative;width:100%');
divmin.setAttribute('id','divbusqueda');
//divmin.setAttribute('class','col-md-6');

var ulista = document.createElement('ul');
ulista.setAttribute('style','background-color:white; list-style:none;width:100%');
ulista.setAttribute('class','border-right border-left');
ulista.setAttribute('id','ulbusqueda');
divmin.append(ulista);

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
			if(document.querySelector("#ulbusqueda")){
		document.querySelector("#ulbusqueda").innerHTML = "";
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
					link.setAttribute('style','text-decoration:none;width:100%;hover:');
					link.setAttribute('class','busquedasnav');
					link.addEventListener("mouseover", function(){
						this.parentNode.setAttribute("style","background-color:#DDDDDD;max-height:49.813px;margin-left:-40px;display:flex;justify-content:center;align-items:center");
					});
					link.addEventListener("mouseout", function(){
						this.parentNode.setAttribute("style","background-color:white;max-height:49.813px;margin-left:-40px;display:flex;justify-content:center;align-items:center");
					});
					link.append(textoa);

					var img = document.createElement('img');
					img.setAttribute('src','/storage/product/'+response[elemento]['image']);
					img.setAttribute('style','max-width:40px;margin-left:auto');

					var objeto = new Object();
					objeto.link = link;
					objeto.img = img;

					resbusqueda[parseInt(elemento)] = (objeto);
					//link.append(img);
					//resbusqueda[parseInt(elemento)] = link;
					//console.log(resbusqueda[parseInt(elemento)]);
					

					//console.log(ulista);
					//document.querySelector('section').prepend(divmin);
				}
				for(ele in resbusqueda){
					var lilista = document.createElement('li');
					lilista.setAttribute('style','background-color:white;max-height:49.813px;margin-left:-40px;display:flex;justify-content:center;align-items:center');
					//lilista.setAttribute('style','background-color:white;max-height:49.813px');
					lilista.setAttribute('class','border-bottom');
					lilista.append(resbusqueda[ele].link);
					lilista.append(resbusqueda[ele].img);
					//lilista.append(resbusqueda[ele]);
					ulista.append(lilista);
				}
				console.log("ul li:");
				console.log(ulista);
				for(ele in ulista.innerHTML.split("/li>")){
					console.log(ulista.innerHTML.split("/li>")[ele]+"/li>");
				}
				for(elements in ulista){
				//console.log(elements);	
				}
				divmin.append(ulista);
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
	/*$.ajaxSetup({
		headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
	});
	$.ajax({
		url:'/busqueda',
		type: "GET",
		data:{texto},
		success: function(response){
			console.log(response);
			console.log('paso la prueba');
		},
		error: function(response){
			console.log(response);
			console.log('error');
		}
	})*/
})

});
	
