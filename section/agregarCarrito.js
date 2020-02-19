function agregarCarrito(e){
	$(document).ready(function(){
		console.log("jquery funcionando");
	});
	console.log("agregando...");
	let id = e.id;
	console.log(id);
	$.ajax({
		url : 'section/agregarCarrito.php',
		type : 'POST',
		data : { id },
		success: function(response){
			console.log(response);
		}
	});
}