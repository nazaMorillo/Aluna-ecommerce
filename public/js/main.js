$(document).ready(function () {
	var url = window.location;
	
	if (url.href.split("/").length > 4 && url.href.split("/").length < 6) {
		document.querySelector("#search").value = url.href.split("/")[4];
	}

	function bandera(cadena) {
		var acum = cadena.split(" ");
		for (ele in acum) {
			if (acum[ele] != "") {
				return true;
			}
		} return false
	}

	var divmin = document.createElement('div');
	divmin.setAttribute('style', 'height:0px;margin-top:0px;z-index:2;position:relative;width:100%');
	divmin.setAttribute('id', 'divbusqueda');
	divmin.setAttribute('class', 'list-group');

	var imgsbusqueda = [];
	var timeout;
	document.querySelector("#search").addEventListener("keyup", function () {
		clearTimeout(timeout);
		timeout = setTimeout(() => {
			var texto = document.querySelector("#search").value;
			console.log(texto);
			if (texto == "") {
				if (document.querySelector("#divbusqueda")) {
					document.querySelector("#divbusqueda").innerHTML = "";
					document.querySelector("#divbusqueda").style.display = "none";
				}
			}
			if (!bandera(texto)) {
				if (document.querySelector("#divbusqueda")) {
					document.querySelector("#divbusqueda").style.display = "none";
				}
			} else {
				if (document.querySelector("#divbusqueda")) {
					document.querySelector("#divbusqueda").innerHTML = "";
					document.querySelector("#divbusqueda").style.display = "block";
				}

				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					url: "/buscarProducto",
					type: "GET",
					data: { texto },
					success: function (response) {
						console.log(response);
						var resbusqueda = [];

						for (elemento in response) {
							var textoa = document.createTextNode(response[elemento]['name']);

							var link = document.createElement('a');
							link.setAttribute('href', '/productos/' + response[elemento]['id']);
							link.setAttribute('style', 'text-decoration:none;width:100%;padding-top: 0px;padding-bottom: 0px');
							link.setAttribute('class', 'list-group-item list-group-item-action');
							link.addEventListener("mouseover", function () {
								this.setAttribute("class", "list-group-item list-group-item-action active");
							});
							link.addEventListener("mouseout", function () {
								this.setAttribute("class", "list-group-item list-group-item-action");
							});
							link.addEventListener("click", function () {
								console.log("clickeado");
							});
							//link.append(textoa);

							var img = document.createElement('img');
							img.setAttribute('src', '/storage/product/' + response[elemento]['image']);
							img.setAttribute('style', 'max-height: 50px');

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

							divCol1.setAttribute('style', 'display: flex;justify-content: center;align-content: center;flex-direction: column');
							divCol1.append(textoa);

							divCol2.append(img);

							divRow.append(divCol1);
							divRow.append(divCol2);
							//divContainer.append(divRow);

							link.append(divRow);

							//link.append(img);
							resbusqueda[parseInt(elemento)] = link;
						}
						for (ele in resbusqueda) {
							divmin.append(resbusqueda[ele]);

						}
						document.querySelector('section').prepend(divmin);
					},
					error: function () {
						console.log("error!!!!");
					}
				});
			}
			clearTimeout(timeout);
		}, 1000);

	});

	function crearFormBusqueda(){

		var divFormBusqueda = document.createElement('div');
		divFormBusqueda.setAttribute('id','busquedaAvanzadaDiv');
		divFormBusqueda.setAttribute('style','height:0px;z-index:2;position:relative');

		var formAvanzado = document.createElement('form');
		formAvanzado.setAttribute('style','background-color:white');
		formAvanzado.setAttribute('id','formBusquedaAvanzada');
		//formAvanzado.setAttribute('type','POST');
		//formAvanzado.setAttribute('action','/buscarAvanzadamente');

		var labelMarcaForm = document.createElement('label');
		labelMarcaForm.append("Marca: ");
		var marcaFormAvanzado = document.createElement('select');
		marcaFormAvanzado.setAttribute('id','marcaFormAvanzado');
		marcaFormAvanzado.setAttribute('name','marcaFormAvanzado');
		labelMarcaForm.append(marcaFormAvanzado);
		labelMarcaForm.setAttribute('class','m-2');

		var labelCategoriaForm = document.createElement('label');
		labelCategoriaForm.append("Categoría: ");
		var categoriaFormAvanzado = document.createElement('select');
		categoriaFormAvanzado.setAttribute('id','categoriaFormAvanzado');
		categoriaFormAvanzado.setAttribute('name','categoriaFormAvanzado');
		labelCategoriaForm.append(categoriaFormAvanzado);
		labelCategoriaForm.setAttribute('class','m-2');

		var btnsubmit = document.createElement('button');
		btnsubmit.append(document.createTextNode('Buscar'));
		btnsubmit.setAttribute('type','submit');
		btnsubmit.setAttribute('id','submitFormAvanzado');
		btnsubmit.setAttribute('class','btn btn-primary m-2');

		formAvanzado.append(labelCategoriaForm);
		formAvanzado.append(labelMarcaForm);
		formAvanzado.append(btnsubmit);

		formAvanzado.style.borderStyle = "solid";
		formAvanzado.style.borderColor = "rgb(33, 37, 41)";

		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			url: "/obtenerMarcasyCategorias",
			type: "GET",
			success: function (response) {
						let optionNull = document.createElement('option');
						optionNull.setAttribute('value',-1);
						optionNull.append(document.createTextNode('Seleccione una opción'));
						marcaFormAvanzado.append(optionNull);
						let optionNulldos = document.createElement('option');
						optionNulldos.setAttribute('value',-1);
						optionNulldos.append(document.createTextNode('Seleccione una opción'));
						categoriaFormAvanzado.append(optionNulldos);		
					for(brand in response[0]){
						let option = document.createElement('option');
						option.setAttribute('value',response[0][brand].id);
						option.append(document.createTextNode(response[0][brand].name));
						marcaFormAvanzado.append(option);
					}
					for(category in response[1]){
						let option = document.createElement('option');
						option.setAttribute('value',response[1][category].id);
						option.append(document.createTextNode(response[1][category].name));
						categoriaFormAvanzado.append(option);
					}																
				},
			error: function (e) {
				console.log(e);
			}
		});

		divFormBusqueda.append(formAvanzado);

		btnsubmit.addEventListener('click', function(e){
			e.preventDefault();
			console.log("buscando...");
			let categoriaSeleccionada = parseInt(document.getElementById('categoriaFormAvanzado').value);
			let marcaSeleccionada = parseInt(document.getElementById('marcaFormAvanzado').value);
			console.log(marcaSeleccionada);
			console.log(categoriaSeleccionada);
			window.location = '/listado/'+marcaSeleccionada+'/'+categoriaSeleccionada;
			/*$.ajaxSetup({
				headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				url: "/buscarAvanzadamente",
				type: "GET",
				data:{marcaSeleccionada,categoriaSeleccionada},
				success: function (response) {	
						console.log('response');															
					},
				error: function (e) {
					console.log(e);
				}
			});*/
		});

		return divFormBusqueda;
	}

	var banderaBusquedaAvanzada = false;
	document.querySelector('#busquedaAvanzada').addEventListener('click', function(){
		if(banderaBusquedaAvanzada){
			banderaBusquedaAvanzada = false;
			if(document.querySelector('#busquedaAvanzadaDiv')){
				document.querySelector('#busquedaAvanzadaDiv').parentNode.removeChild(document.querySelector('#busquedaAvanzadaDiv'));
			}
			document.querySelector('#busquedaAvanzada').setAttribute('class','fas fa-chevron-down btn btn-outline-success my-2 my-sm-0 mr-2');
			document.querySelector('#busquedaAvanzada').setAttribute('style','color:white;border-width:0px');
		}else{
			banderaBusquedaAvanzada = true;
			if(document.querySelector('#busquedaAvanzadaDiv')){
				document.querySelector('#busquedaAvanzadaDiv').parentNode.removeChild(document.querySelector('#busquedaAvanzadaDiv'));
			}
			document.querySelector('#busquedaAvanzada').setAttribute('class','fas fa-chevron-up btn btn-outline-success my-2 my-sm-0 mr-2');
			document.querySelector('#busquedaAvanzada').setAttribute('style','color:white;border-width:0px');
			var busquedaAvanzada = crearFormBusqueda();
			document.querySelector('main').prepend(busquedaAvanzada);
		}
	});

	document.querySelector("#search").addEventListener("focus", function () {
		if (document.querySelector("#divbusqueda")) {
			document.querySelector("#divbusqueda").style.display = "block";
		}
	});

	document.querySelector("#search").addEventListener("blur", function () {
		var timeout;
		clearTimeout(timeout);
		if (document.querySelector("#divbusqueda")) {
			timeout = setTimeout(() => {
				document.querySelector("#divbusqueda").style.display = "none";
				clearTimeout(timeout);
			}, 200);
		}
	});



	document.querySelector("#search").parentNode.addEventListener("submit", function (e) {
		e.preventDefault();
		var texto = document.querySelector("#search").value;
		window.location = "/listado/" + texto;
	});

	document.querySelector("busquedaAvanzada").addEventListener('click', function(){

	});


	let selectState = document.getElementById('state');
	// let password_confirm = document.getElementById('password-confirm');
	let selectCity = document.getElementById('city');
	// let optionsCity = document.querySelectorAll('#city option');
	let fieldAddress = document.getElementById('address');
	let localidadesfiltradas = [];


	selectCity.disabled = true;
	fieldAddress.disabled = true;

	// selectState.onclick = () => {
	// 	//alert("Después del click de provincia");	
	// 	actualizarPaisesProvinciasLocalidades();
	// 	selectCity.disabled = false;
	// 	for (var i = 0, l = optionsCity.length; i < l; i++) {
	// 		optionsCity[i].selected = optionsCity[i].defaultSelected;
	// 	}

	// }

	function listarLocalidades(localidades, state_id) {
		let localidadesfiltradas = localidades;
		if (state_id != undefined) {
			let opciones = document.querySelectorAll('#city option');
			// opciones.forEach(opcion => console.log(opcion.text));
			opciones.forEach((opcion, i) => {
				if (i != 0) {
					opcion.remove();
				}
			});
			localidadesfiltradas.forEach(localidad => {
				let opcion = document.createElement("option");
				let nombre = document.createTextNode(localidad.localidad);
				opcion.setAttribute("value", localidad.id);
				opcion.append(nombre);
				selectCity.append(opcion);
			});
		}
		var options = document.querySelectorAll('#city option');
		for (var i = 0, l = options.length; i < l; i++) {
			options[i].selected = options[i].defaultSelected;
		}
	}


	function actualizarPaisesProvinciasLocalidades() {
		fetch("/api/getPaisesProvinciasLocalidades")
			.then(response => response.json())
			.then(data => {

				data['provincias'].forEach(provincia => {

					let opcion = document.createElement("option");
					let nombre = document.createTextNode(provincia.provincia);
					opcion.setAttribute("value", provincia.id);
					opcion.append(nombre);
					selectState.append(opcion);
				});

				// console.log(localidadesfiltradas);
				let id_state = undefined;

				selectState.onchange = (e) => {
					selectCity.disabled = false;
					id_state = e.target.value;
					// console.log("Onchage en stateId/ id_state : " + id_state);

					localidadesfiltradas = data['localidades'].filter(localidad => {
						return localidad.provincia_id == id_state && localidad.localidad.length > 2;
					});

					listarLocalidades(localidadesfiltradas, id_state);
				}

				selectCity.onchange = (e) => {
					fieldAddress.disabled = false;
				}
			})
			.catch(error => {
				console.log("Se encontro el siguiente error: " + error);
				//select.innerHTML = "<option value=''>Sin provincias</option>";
			})
	}
	actualizarPaisesProvinciasLocalidades();
});