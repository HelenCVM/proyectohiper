function cartAdd(cod) {
    console.log(cod)
    //console.log(precioTotal)
   // let storeId = (document.getElementById('selectStore').selectedIndex + 1)
    //console.log("IDX STORE" + storeId)

    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest()
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP")
    }
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            
            if (document.getElementById("cartAdd") === null) {
                document.body.innerHTML += this.responseText
            } else {
                openWindowCart()
            }
            //document.getElementById('body').innerHTML = this.responseText
        }
    };
    xmlhttp.open("GET", "../controladores/cartAdd.php?codProd=" + cod , true)
    xmlhttp.send()
}


function cluseWindowCart() {
    let windowFloat = document.getElementById("cartAdd")
    windowFloat.style.display = "none"
}

function factura(usu,subtotal,iva,total){
    console.log(usu);
    console.log(subtotal);
    console.log(iva);
    console.log(total);
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest()
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP")
    }
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            
            if (document.getElementById("cartAdd") === null) {
                document.body.innerHTML += this.responseText
            } else {
                openWindowCart()
            }
            //document.getElementById('body').innerHTML = this.responseText
        }
    };
    xmlhttp.open("GET", "../controladores/factura.php?codUsu=" + usu+ "&subt=" + subtotal+"&iva=" + iva+"&total=" + total)
    console.log("../controladores/factura.php?codUsu=" + usu+ "&subt=" + subtotal+"&iva=" + iva+"&total=" + total);
    xmlhttp.send()

}