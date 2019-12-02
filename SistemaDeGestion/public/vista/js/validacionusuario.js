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
    var key = window