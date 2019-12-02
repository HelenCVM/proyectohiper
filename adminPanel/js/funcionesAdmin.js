function validarCorreo(label, element) {
    let email = element.value
    let span = document.getElementById(label)
    if ((email.search("@importmanguerasiv.com")) > 0) {
        span.style.display = "none"
    } else {
        span.innerHTML = "Correo Incorrecto"
        span.style.color = "red";
        span.style.display = "block"
        correo = false
    }
}

function buscar(input, usu) {
    let text = input.value.trim();
    console.log(text);
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("data").innerHTML = this.responseText;
        }
    };
    if (usu == 'index') {
        console.log("Entra a buscar");
        xmlhttp.open("GET", "../controladores/buscar_usuario.php?key=" + text, true);
        xmlhttp.send();
    } else if (usu == 'eliminado') {
        console.log("Entra a eliminado");
        xmlhttp.open("GET", "../controladores/buscar_usuario_eliminado.php?key=" + text, true);
        xmlhttp.send();
    } else if (usu == 'categoria') {
        console.log("Entra a eliminado");
        xmlhttp.open("GET", "../controladores/buscar_categoria.php?key=" + text, true);
        xmlhttp.send();
    } else if (usu == 'categoriaEliminada') {
        console.log("Entra a eliminado");
        xmlhttp.open("GET", "../controladores/buscar_categoria_eliminada.php?key=" + text, true);
        xmlhttp.send();
    } else if (usu == 'producto') {
        console.log("Entra a producto");
        xmlhttp.open("GET", "../controladores/buscar_producto.php?key=" + text, true);
        xmlhttp.send();
    } else if (usu == 'productoEliminado') {
        console.log("Entra a Prodduc eliminado");
        xmlhttp.open("GET", "../controladores/buscar_producto_eliminado.php?key=" + text, true);
        xmlhttp.send();
    }
}

function openWindow(id, txt, code) {
    console.log(code)

    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest()
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP")
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("floatWindow").innerHTML = this.responseText
        }
    };
    xmlhttp.open("GET", "../../controladores/user/readMsj.php?id=" + id + "&dest=" + txt + "&code=" + code, true)
    xmlhttp.send()

    let windowFloat = document.getElementById("floatWindow")
    windowFloat.style.display = "block"

}

function cluseWindow() {
    let windowFloat = document.getElementById("floatWindow")
    windowFloat.style.display = "none"
}

function validarCamposObligatorios()
{
    var bandera = true
    console.log("kdjfjdkf");
    for(var i = 0; i < document.forms[0].elements.length; i++){
        var elemento = document.forms[0].elements[i]
        if(elemento.value == '' && elemento.type == 'text'){
            if(elemento.id == 'cedula'){
                document.getElementById('mensajeCedula').innerHTML = 'La cedula esta vacia'
            } 
            if(elemento.id == 'nombres'){
                document.getElementById('mensajeNombre').innerHTML = 'El nombre esta vacio'
            } 
            if(elemento.id == 'apellidos'){
                document.getElementById('mensajeApellido').innerHTML = 'El apellido esta vacio'
            } 
            if(elemento.id == 'fechaNacimiento'){
                document.getElementById('mensajeFecha').innerHTML = 'El fecha esta vacio'
            } 
            if(elemento.id == 'telefono'){
                document.getElementById('mensajeTelefono').innerHTML = 'El telefono esta vacio'
            } 
            if(elemento.id == 'correo'){
                document.getElementById('mensajeCorreo').innerHTML = 'El correo esta vacio'
            } 
            
            elemento.className = 'error'            
            bandera = false
        }else{
            if(elemento.id == 'cedula'){
                document.getElementById('msjCedula').innerHTML= ''
            }
            elemento.style.border = '1px black solid'
            
        }
    }
    
    if(!bandera){
        alert('Error: Los campos no pueden estar vacios')
    }
    return bandera
}

function validarNumero(e, fono){
    var key = window.event ? e.keyCode : e.which;
    if(((48 <= key && key <= 57) || (key == 0) || (key == 8)) && fono.value.length < 10){       
        return true; 
    }else{ 
        return false; 
       
    } 
}
function validarLetras(string){
    var out = '';
    var filtro = 'abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ ';
        for (var i = 0; i < string.length; i++)
        if (filtro.indexOf(string.charAt(i)) != -1) 
        out += string.charAt(i);
    return out;

   
} 


function validarCedula(cedul){
    var x=document.getElementById("cedula").value;
    var total=0;
    var longitud=x.length;
    var longcheck =longitud-1;
    if (longitud ==10){
        for(i=0;i<longcheck;i++){
            if(i % 2 ===0){
                var aux=x.charAt(i) *2;
                if (aux >=10) aux-=9;
                total +=aux;

            }else {
                total +=parseInt(x.charAt(i))
            }
        }
        total =total %10 != 0 ? 10 - total % 10 : 0;

        if(x.charAt(longitud -1 ) == total){
            return false;
        } else {
           
            alert('su cedula esta mal')
            return true;
        }
    }else {
        return false;
    }
}

function comprobarClave(){
    clave1 = document.getElementById("nuevaContrasena").value;
    clave2 = document.getElementById("confirmarContrasena").value;

    if (clave1 == clave2)
       alert("Las dos claves son iguales...\nRealizaríamos las acciones del caso positivo")
    else
       alert("Las dos claves son distintas...\nRealizaríamos las acciones del caso negativo")
}



 

