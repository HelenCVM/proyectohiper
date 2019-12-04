function validarCamposObligatorios()
{
    var bandera = true
    console.log("kdjfjdkf");
    for(var i = 0; i < document.forms[0].elements.length; i++){
        var elemento = document.forms[0].elements[i]
        if(elemento.value == '' && elemento.type == 'text'){
            if(elemento.id == 'correo'){
                document.getElementById('mensajeCorreo').innerHTML = 'El correo esta vacio'
            } 
            if(elemento.id == 'contrasena'){
                document.getElementById('"mensajeContra').innerHTML = 'El correo esta vacio'
            } 
           
           
            
            elemento.className = 'error'            
            bandera = false
        }else{
            if(elemento.id == 'correo'){
                document.getElementById('mensajeCorreo').innerHTML= ''
            }
            elemento.style.border = '1px black solid'
            
        }
    }
    
    if(!bandera){
        alert('Error: Los campos no pueden estar vacios')
    }
    return bandera
}


function validarCamposObligatorioss()
{
    var bandera = true
    console.log("kdjfjdkf");
    for(var i = 0; i < document.forms[0].elements.length; i++){
        var elemento = document.forms[0].elements[i]
        if(elemento.value == '' && elemento.type == 'text'){
            if(elemento.id == 'cedula'){
                document.getElementById('mensajeCedula').innerHTML = 'La cedula esta vacia'
            } 
            if(elemento.id == 'nombre'){
                document.getElementById('mensajeNombre').innerHTML = 'El nombre esta vacio'
            } 
            if(elemento.id == 'apellidos'){
                document.getElementById('mensajeApellido').innerHTML = 'El apellido esta vacio'
            } 
            if(elemento.id == 'fechanaci'){
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
                document.getElementById('mensajeCedula').innerHTML= ''
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

function mostrarDetalle(){
    var elemento=document.getElementById("radio1").value;
    var elemento1=document.getElementById("radio2").value;
    var elemento2=document.getElementById("radio3").value;
    var elemento3=document.getElementById("radio4").value;
    var elemento4=document.getElementById("radio5").value;
            if(elemento.value == 'radio1'){
                document.getElementById('valor').innerHTML = '<br><h2>5</h2>'
            }
            if(elemento1 == 'radio2'){
                document.getElementById('valor').innerHTML = '<br><h2>4</h2>'
            }
            if(elemento2 == 'radio3'){
                document.getElementById('valor').innerHTML = '<br><h2>3</h2>'
            }
            if(elemento3 == 'radio4'){
                document.getElementById('valor').innerHTML = '<br><h2>2</h2>'
            }
            if(elemento4 == 'radio5'){
                document.getElementById('valor').innerHTML = '<br><h2>1</h2>'
            }
        }
}
}