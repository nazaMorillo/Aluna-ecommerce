window.onload = function(){
var cantidades = document.querySelectorAll(".cantidad");
var sumas = document.querySelectorAll(".sumar");
var restas = document.querySelectorAll(".restar");

function decimalAdjust(type, value, exp) {
    // Si el exp no está definido o es cero...
    if (typeof exp === 'undefined' || +exp === 0) {
      return Math[type](value);
    }
    value = +value;
    exp = +exp;
    // Si el valor no es un número o el exp no es un entero...
    if (isNaN(value) || !(typeof exp === 'number' && exp % 1 === 0)) {
      return NaN;
    }
    // Shift
    value = value.toString().split('e');
    value = Math[type](+(value[0] + 'e' + (value[1] ? (+value[1] - exp) : -exp)));
    // Shift back
    value = value.toString().split('e');
    return +(value[0] + 'e' + (value[1] ? (+value[1] + exp) : exp));
  }

Math.round10 = function(value, exp) {
      return decimalAdjust('round', value, exp);
    };

for(var i = 0; i<sumas.length; i++){
    sumas[i].addEventListener("click",function(){
        	let boton = this.parentNode.parentNode.querySelector(".cantidad");
        	if(parseInt(boton.getAttribute("max")) > parseInt(boton.innerHTML)){
        		let precioFinal = this.parentNode.parentNode.querySelector("#totPrecCant");
        		boton.innerHTML = parseInt(boton.innerHTML) + 1;
        		boton.setAttribute("value",parseInt(boton.innerHTML));
        		precioFinal.innerHTML = (boton.getAttribute("price") * boton.getAttribute("value")).toFixed(2);
        		document.getElementById("total").innerHTML = (Math.round10((parseFloat(document.getElementById("total").getAttribute("value")) + (parseFloat(precioFinal.innerHTML) - boton.getAttribute("price"))), -10)).toFixed(2);
        	}	
        });
    }

for(var i = 0; i<restas.length; i++){
    restas[i].addEventListener("click",function(){
    	    let boton = this.parentNode.parentNode.querySelector(".cantidad");
    	    if(!(parseInt(boton.innerHTML) - 1) < 1){
    	    boton.innerHTML = parseInt(boton.innerHTML) - 1;
        	boton.setAttribute("value",parseInt(boton.innerHTML));
        	if(!(parseInt(boton.innerHTML) < 1)){
        		let precioFinal = this.parentNode.parentNode.querySelector("#totPrecCant");
        		precioFinal.innerHTML = (boton.getAttribute("price") * boton.getAttribute("value")).toFixed(2);
        		document.getElementById("total").innerHTML = (Math.round10(parseFloat(parseFloat(document.getElementById("total").innerHTML)).toFixed(2) - (boton.getAttribute("price")), -10)).toFixed(2);
        	}/*else if(parseInt(boton.innerHTML) == 1){
        		console.log("es igual a uno");
        		let precioFinal = this.parentNode.parentNode.querySelector("#totPrecCant");
        		precioFinal.innerHTML = (boton.getAttribute("price") * boton.getAttribute("value")).toFixed(2);
        		document.getElementById("total").innerHTML = document.getElementById("total").getAttribute("precini");
        		}*/
    	    }

        });   
    }

}