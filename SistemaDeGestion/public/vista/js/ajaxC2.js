function buscarPornombre(input) {
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
    xmlhttp.open("GET","phpajax/buscarC2.php?key="+text,true);
    xmlhttp.send();
    }