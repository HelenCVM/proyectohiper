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