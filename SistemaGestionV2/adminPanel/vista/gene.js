function generarFactura(usuario,fac){
 console.log(usuario);
    var ancho=1000;
    var alto=800;

    var x= parseInt((window.screen.width/2)-(ancho/2));
    var y=parseInt((window.screen.height/2)-(alto/2));

    $url= '../../fac/factura/generaFactura.php?cl='+usuario+'&f='+fac;
    window.open($url, "Factura","left="+x+",top="+y+",height="+alto+",width="+ancho+",scrollbar=si,location=no,resizable=si,menubar=no");
}