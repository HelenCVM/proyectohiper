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