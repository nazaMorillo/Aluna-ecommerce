$(document).ready(function(){
    var variable = document.querySelector("#previewImage").getAttribute("style").split(";");
    var oldimage = variable[6].split("'")[1];
    document.querySelector("#exampleInputEmail1").addEventListener("click",function(e){
        console.log("guardando");
    });
    document
    document.querySelector("#file").addEventListener("change",function(e){
        alert("entraste por acá");
        let reader = new FileReader();
        reader.readAsDataURL(e.target.files[0]);
        reader.onload = function(){
            let cadena = "background-image:url("+reader.result+")";
            document.querySelector("#previewImage").setAttribute("style", "height:102px;width:102px;background-size:cover;background-position:center;margin-left: 15px;margin-right: 15px;" + cadena);
        }
    });
    document.querySelector("#resetear").addEventListener("click",function(){
        let agregar = "background-image:url('"+oldimage+"')";
        document.querySelector("#previewImage").setAttribute("style", "height:102px;width:102px;background-size:cover;background-position:center;margin-left: 15px;margin-right: 15px;" + agregar);
    });
})