//console.log("Hola");
document.getElementById("file").onchange = function(e){
	let reader = new FileReader();
	reader.readAsDataURL(e.target.files[0]);
	reader.onload = function(){
	let preview = document.getElementById("preview"),
	//image = document.createElement('img');
	imagen = document.getElementById("imagen");
	padreimagen = imagen.parentNode;
	//padreimagen.removeChild(imagen);
	imagen.innerHTML = '';
	imagen.src = reader.result;
	imagen.id = "imagen";
	imagen.width = "100";
	imagen.height = "100";
	//padreimagen.innerHTML = '';
	//padreimagen.append(image);
	}
}