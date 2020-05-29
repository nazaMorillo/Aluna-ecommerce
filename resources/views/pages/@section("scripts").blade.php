@section("scripts")
<script>
    $('.alert').hide();
   function ValidateEmail(mail) {
       var mailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
       if (mail.value.match(mailFormat)) {
           return (true);
       }
       return (false);
   }
   $(document).ready(function() {
       console.log(document.forms);
       elementos = document.getElementById("contacto").elements;
       console.log(elementos);
       console.log("Hola");
       var errores = 0;
       for (var i = 0; i < elementos.length - 1; i++) {
           elementos[i].addEventListener("blur", function() {
               if (this.id == "exampleInputName") {
                   if (this.value.length < 4) {
                       if (!this.parentNode.querySelector("span")) {
                           this.style.borderColor = "red";
                           let spanError = document.createElement("span");
                           spanError.setAttribute("class", "text-danger");
                           spanError.append(document.createTextNode("Al menos 4"));
                           this.parentNode.append(spanError);
                           errores += 1;
                       }
                       console.log(errores);
                   } else {
                       if (this.parentNode.querySelector("span")) {
                           this.style.borderColor = "";
                           this.parentNode.removeChild(this.parentNode.querySelector("span"));
                           errores -= 1;
                       }
                       console.log(errores);
                   }
               } else if (this.id == "exampleInputAddress") {
                   if (this.value.length < 6) {
                       if (!this.parentNode.querySelector("span")) {
                           this.style.borderColor = "red";
                           let spanError = document.createElement("span");
                           spanError.setAttribute("class", "text-danger");
                           spanError.append(document.createTextNode("Al menos 6"));
                           this.parentNode.append(spanError);
                           errores += 1;
                       }
                       console.log(errores);
                   } else {
                       if (this.parentNode.querySelector("span")) {
                           this.style.borderColor = "";
                           this.parentNode.removeChild(this.parentNode.querySelector("span"));
                           errores -= 1;
                       }
                       console.log(errores);
                   }
               } else if (this.id == "exampleInputTelephone") {
                   if (this.value.length < 7) {
                       if (!this.parentNode.querySelector("span")) {
                           this.style.borderColor = "red";
                           let spanError = document.createElement("span");
                           spanError.setAttribute("class", "text-danger");
                           spanError.append(document.createTextNode("Teléfono no válido"));
                           this.parentNode.append(spanError);
                           errores += 1;
                       }
                       console.log(errores);
                   } else {
                       if (this.parentNode.querySelector("span")) {
                           this.style.borderColor = "";
                           this.parentNode.removeChild(this.parentNode.querySelector("span"));
                           errores -= 1;
                       }
                       console.log(errores);
                   }
               } else if (this.id == "exampleInputSubject") {
                   if (this.value.length < 5) {
                       if (!this.parentNode.querySelector("span")) {
                           this.style.borderColor = "red";
                           let spanError = document.createElement("span");
                           spanError.setAttribute("class", "text-danger");
                           spanError.append(document.createTextNode("Al menos 5"));
                           this.parentNode.append(spanError);
                           errores += 1;
                       }
                       console.log(errores);
                   } else {
                       if (this.parentNode.querySelector("span")) {
                           this.style.borderColor = "";
                           this.parentNode.removeChild(this.parentNode.querySelector("span"));
                           errores -= 1;
                       }
                       console.log(errores);
                   }
               } else if (this.id == "exampleFormControlTextarea1") {
                   if (this.value.length < 20) {
                       if (!this.parentNode.querySelector("span")) {
                           this.style.borderColor = "red";
                           let spanError = document.createElement("span");
                           spanError.setAttribute("class", "text-danger");
                           spanError.append(document.createTextNode("Al menos 20"));
                           this.parentNode.append(spanError);
                           errores += 1;
                       }
                       console.log(errores);
                   } else {
                       if (this.parentNode.querySelector("span")) {
                           this.style.borderColor = "";
                           this.parentNode.removeChild(this.parentNode.querySelector("span"));
                           errores -= 1;
                       }
                       console.log(errores);
                   }
               } else if (this.id == "exampleInputEmail1") {
                   if (!ValidateEmail(this)) {
                       if (!this.parentNode.querySelector("span")) {
                           this.style.borderColor = "red";
                           let spanError = document.createElement("span");
                           spanError.setAttribute("class", "text-danger");
                           spanError.append(document.createTextNode("Email no válido"));
                           this.parentNode.append(spanError);
                           errores += 1;
                       }
                       console.log(errores);
                   } else {
                       if (this.parentNode.querySelector("span")) {
                           this.style.borderColor = "";
                           this.parentNode.removeChild(this.parentNode.querySelector("span"));
                           errores -= 1;
                       }
                       console.log(errores);
                   }
               }
           });
       }
       elementos[elementos.length - 1].addEventListener("click", function(e) {
           if (errores > 0) {
               e.preventDefault();
               console.log("Hay errores en tus datos");
           } else {
               e.preventDefault();
               console.log("Información correcta");
               document.querySelector('.alert').style.visibility= "visible";
               $('.alert').show();
               let contacto = document.getElementById('contacto');
               contacto.reset();
           }
       })

       function beforeSend(e) {
           e.preventDefault();
           alert("prevengo que se envíe");
           this.reset();
       };

       let contacto = document.getElementById('contacto');
       document.querySelector('form').addEventListener('submit', beforeSend, true);

   })
</script>
@endsection