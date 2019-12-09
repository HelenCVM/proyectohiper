function openWindowCart() {
    let windowFloat = document.getElementById("cartAdd")
    windowFloat.style.display = "flex"
}

function cluseWindowCart() {
    let windowFloat = document.getElementById("cartAdd")
    windowFloat.style.display = "none"
}

function prodValoration(elemnt, prodID) {
    let rat = elemnt.value
    //console.log(rat)
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest()
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP")
    }
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("clasificacion").innerHTML = this.responseText
        }
    };
    xmlhttp.open("GET", "../controller/rat.php?rat=" + rat + "&prodID=" + prodID, true)
    xmlhttp.send()
}

var imag = []
var indice = 0

function galeria(img, i) {
    //console.log(img)
    imag[i] = img
}



function cartDelete(carId) {

    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest()
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP")
    }
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            cartUpdatePrice()
            carNot()
            document.getElementById("cart").innerHTML = this.responseText
        }
    };
    xmlhttp.open("GET", "../controller/cartRemove.php?carId=" + carId, true)
    xmlhttp.send()
}
function cartUpdatePrice() {
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest()
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP")
    }
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("buydetall").innerHTML = this.responseText
        }
    };
    xmlhttp.open("GET", "../controller/updatePrice.php", true)
    xmlhttp.send()
}

function carNot(url) {

    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest()
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP")
    }
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //console.log('Notificacion')
            document.getElementById("fa-shopping-cart").innerHTML = this.responseText
        }
    };
    xmlhttp.open("GET", url, true)
    xmlhttp.send()
}
function openWindow() {
    let windowFloat = document.getElementById("floatWindow")
    windowFloat.style.display = "flex"
}

function cluseWindow() {
    let windowFloat = document.getElementById("floatWindow")
    windowFloat.style.display = "none"
}

function stock(elemnt) {
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest()
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP")
    }
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("stok").innerHTML = this.responseText
        }
    };
    xmlhttp.open("GET", "../controller/stock.php?idx=" + (elemnt.selectedIndex + 1), true)
    xmlhttp.send()
}


function cartAdd(cod) {
    console.log(cod);
    console.log(cod);
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest()
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP")
    }
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //carNot()
            if (document.getElementById("cartAdd") === null) {
                document.body.innerHTML += this.responseText
            } else {
                openWindowCart();
            }
        }
    };
    xmlhttp.open("GET", "../controller/cartAdd.php?codProd=" + cod , true)
    xmlhttp.send()
}