function contenidos(){
    $.post('php/paginas/home.php', function (responseText) {
        $('#CargaCuerpo').html(responseText);
    });
}
function paginasNav(x){
    if (x==1) {
        var url="php/paginas/contenido_statico_proveedores.php";
    }
    if (x==2) {
        var url="php/paginas/contenido_statico_servicios.php";
    }
    if (x==3) {
        var url="php/paginas/contenido_statico_registrate.php";
    }
    if (x==4) {
        var url="php/paginas/contenido_statico_nosotros.php";
    }
    $.post(url, function (responseText) {
        $('#CargaCuerpo').html(responseText);
    });
}
function registrarUsuario(){
    arreglo=document.getElementById('arreglo').innerHTML;
    valor=1;
    name=document.getElementById('Nombre').value;
    apes=document.getElementById('Apellidos').value;
    tel=document.getElementById('Telefono').value;
    Email=document.getElementById('Email').value;
    dir=document.getElementById('Direccion').value;
    cp=document.getElementById('Codigopostal').value;
    est=document.getElementById('Estado').value;
    mun=document.getElementById('Municipio').value;
    Pass=document.getElementById('Password').value;
    Repetirpassword=document.getElementById('Repetirpassword').value;
    cond=document.getElementById('condiciones').value;
    if (condiciones.checked) {
        if (Pass==Repetirpassword) {
            $.post('php/lib/getters.php',{valor:valor,name:name,apes:apes,tel:tel,Email:Email,dir:dir,cp:cp,est:est,mun:mun,Pass:Pass}, function (responseText) {
                //$('#CargaCuerpo').html(responseText);
                alert(responseText+"Inicie sesion");
                redireccionar(Email,Pass,arreglo);
                limpiarRegistros();
            });
        }else{
            alert("el password no coincide");
        }
    }else{
        alert("Aun no ha haceptado los terminos y condiciones!");
    }
}
function limpiarRegistros(){
    name=document.getElementById('Nombre').value="";
    apes=document.getElementById('Apellidos').value="";
    tel=document.getElementById('Telefono').value="";
    Email=document.getElementById('Email').value="";
    dir=document.getElementById('Direccion').value="";
    cp=document.getElementById('Codigopostal').value="";
    est=document.getElementById('Estado').value="";
    mun=document.getElementById('Municipio').value="";
    Pass=document.getElementById('Password').value="";
    Repetirpassword=document.getElementById('Repetirpassword').value="";
    cond=document.getElementById('condiciones').checked=false;
}
function carga_contenidos(x){
    if (x==1) {
        var url="php/paginas/home_adm.php";
    }
    if (x==2) {
        listarUsuarios(1);
    }
    if (x==3) {
        var url="php/paginas/adm_agregarMuebles.php";
    }
    if (x==4) {
        listarMuebles(1);
    }
    if (x==5) {
        var url="php/paginas/contenido_statico_proveedores.php";
    }
    if (x==6) {
        var url="php/paginas/contenido_statico_servicios.php";
    }
    if (x==7) {
        var url="php/datos/encuestas.php";
    }
    $.post(url, function (responseText) {
        $('.col-md-9').html(responseText);
    });
}
function guardarEncuesta(){
    var resp="";
    nombre=document.getElementById('Nencuesta').value;
    var valor="5";
        $.ajax({
            url: 'php/lib/getters.php',
            type: 'POST',
            data: {nombre:nombre,valor:valor},
            success: function(data) {
                resp=parseInt(data);
                 document.getElementById('Nencuesta').value="";
                encuestas(1,resp);
            },
            error: function(jqXHR, textStatus, error) {
                alert( "error: " + jqXHR.responseText);
            }
        });
}
function GuardaOpcionEncuesta(id){
    var valor="6";
    opcion=document.getElementById('Oencuesta').value;
    var url="php/lib/getters.php";
    $.post(url,{id:id,valor:valor,opcion:opcion},function (responseText) {
        limpiar_0();
    });
}
function SiguienteOpcion(id){
    encuestas(2,id);
}
function GuardaPreguntaEncuesta_1(id){
    var valor="7";
    pregunta=document.getElementById('Pencuesta').value;
    var url="php/lib/getters.php";
    $.post(url,{id:id,valor:valor,pregunta:pregunta},function (responseText) {
        limpiar_1();
    });
}
function limpiar_0(){
    document.getElementById('Oencuesta').value="";
}
function limpiar_1(){
    document.getElementById('Pencuesta').value="";
}
function VerEncuesta(id){
    $.post("php/control/encuesta.php",{id:id}, function (responseText) {
        $('#panelusuario-flotante').html(responseText);
    });
}
function encuestast(x,y){
    alert("Encuesta terminada exitosamente");
    encuestas(x,y);
}
function encuestas(x,y){
    var url="php/datos/encuestas.php";
    $.post(url,{x:x,y:y},function (responseText) {
        $('.col-md-9').html(responseText);
    });
}
function ListarEncuestas(x){
    var url="php/datos/listaencuestas.php";
    $.post(url,{x:x}, function (responseText) {
        $('#mostrar').html(responseText);
    });
}
function Estadisticas(){
    $.post("php/paginas/adm_estadistica.php", function (responseText) {
        $('.col-md-9').html(responseText);
    });
}
function listarMuebles(partida){
    $.post("php/paginas/adm_listaMuebles.php",{partida:partida}, function (responseText) {
        $('.col-md-9').html(responseText);
    });
}
function listarUsuarios(partida){
    $.post("php/paginas/adm_usuarios.php",{partida:partida}, function (responseText) {
        $('.col-md-9').html(responseText);
    });
}
function MiFuncionJS(x){
    valor=2;
    MNombre=document.getElementById('MuebleNombre').value;
    MPrecio=document.getElementById('MueblePrecio').value;
    MTipo=document.getElementById('MuebleTipo').value;
    MCantidad=document.getElementById('MuebleCantidad').value;
    MDescripcion=document.getElementById('MuebleDescripcion').value;
     $.post('php/lib/getters.php',{valor:valor,MNombre:MNombre,MPrecio:MPrecio,MTipo:MTipo,MCantidad:MCantidad,MDescripcion:MDescripcion,x:x},function (responseText) {
        //$('.panel-footer').html(responseText);
        alert(responseText);
        
    });
     $('#ventana2').modal('hide');
     listarMuebles(1);
}
function carga_contenido(x){
    if (x==1) {
        var url="php/paginas/contenido-salas.php";
    }
    if (x==2) {
        var url="php/paginas/contenido-comedor.php";
    }
    if (x==3) {
        var url="php/paginas/contenido-recamara.php";
    }
    if (x==4) {
        var url="php/paginas/contenido-oficina.php";
    }
    if (x==5) {
        var url="php/paginas/contenido-mascota.php";
    }
    if (x==6) {
        var url="php/paginas/contenido-banos.php";
    }
    $.post(url, function (responseText) {
        $('.col-md-9').html(responseText);
    });
}
function agregarProductoSala(x){
    arreglo=document.getElementById('arreglo').innerHTML;
    Narreglo=arreglo+","+x;
    if (Narreglo.charAt(0)==','){
        Narreglo=Narreglo.substring(1, Narreglo.length);
    }    
    arreglo=document.getElementById('arreglo').innerHTML=Narreglo;
    numerador();
}
function numerador(){
    cantidad=document.getElementById('cantidad').innerHTML;
    nuevo=parseInt(cantidad)+1;
    cantidad=document.getElementById('cantidad').innerHTML=nuevo;
}
function carrito(){
    arreglo=document.getElementById('arreglo').innerHTML;
    $.post('php/paginas/carrito.php',{arreglo:arreglo},function (responseText) {
        $('.col-md-9').html(responseText);
    });
}
function Eliminar(x){
    arreglo=document.getElementById('arreglo').innerHTML;
    var n = arreglo.split(",");
    n.splice(x,1);
    //arreglo.splice(x,1);
    //alert(x+"=>"+n[1]);
    n.toString();
    document.getElementById('arreglo').innerHTML=n;
    cantidad=document.getElementById('cantidad').innerHTML;
    nuevo=parseInt(cantidad)-1;
    cantidad=document.getElementById('cantidad').innerHTML=nuevo;
    carrito();
}
function Eliminar1(x){
    arreglo=document.getElementById('arreglo').innerHTML;
    var n = arreglo.split(",");
    n.splice(x,1);
    //arreglo.splice(x,1);
    //alert(x+"=>"+n[1]);
    n.toString();
    document.getElementById('arreglo').innerHTML=n;
    cantidad=document.getElementById('cantidad').innerHTML;
    nuevo=parseInt(cantidad)-1;
    cantidad=document.getElementById('cantidad').innerHTML=nuevo;
    carritou();
}
function redireccionar(Email,Pass,arreglo){ 
    //self.location("pagina.php?var1="+Email);
    document.location.replace ("php/control/pagina.php?var1="+Email+"&var2="+Pass+"&var3="+arreglo);
}
function alerta(){
    des="Tiene que registrarse para poder comprar o loguearse en caso de que ya tenga una cuenta de usuario";
    alert(des);
}
function eliminarUsuario(id){
    valor=3;
    $.post('php/lib/getters.php',{id:id,valor:valor},function (responseText) {
        alert(responseText);
        listarUsuarios(1);
    });
}
function verUsuario(id){
    $.post('php/datos/detalleUsuarios.php',{id:id},function (responseText) {
        $('#panelusuario-flotante').html(responseText);
    });
}
/*
    $('#text1').val()         // Obtener el texto de un INPUT con el atributo ID igual a 'text1'
    $('#respuesta').html('codigo o texto html')       // Cambiar el contenido de un DIV con el atributo ID igual a 'respuesta'
    $('#boton').click(funcion_que_recibe_evento);  
*/
function carritou(){
    arreglo=document.getElementById('arreglo').innerHTML;
    $.post('php/datos/carrito.php',{arreglo:arreglo},function (responseText) {
        $('.col-md-9').html(responseText);
    });
}
function catalogo(x){
    if (x==1) {
        var url="php/datos/contenido-salas.php";
    }
    if (x==2) {
        var url="php/datos/contenido-comedor.php";
    }
    if (x==3) {
        var url="php/datos/contenido-recamara.php";
    }
    if (x==4) {
        var url="php/datos/contenido-oficina.php";
    }
    if (x==5) {
        var url="php/datos/contenido-mascota.php";
    }
    if (x==6) {
        var url="php/datos/contenido-banos.php";
    }
    $.post(url, function (responseText) {
        $('.col-md-9').html(responseText);
    });
}
function compras(){
    var user=document.getElementById('UsuarioSession').value;
    $.post('php/datos/compras.php',{user:user},function (responseText) {
        $('.col-md-9').html(responseText);
    });
}
function comprass(){
     var user=document.getElementById('UsuarioSession').value;
    $.post('php/datos/comprass.php',{user:user},function (responseText) {
        $('.col-md-9').html(responseText);
    });
}
function comprarP(){
    var user=document.getElementById('UsuarioSession').value;
    arreglo=document.getElementById('arreglo').innerHTML;
    $.post('php/datos/compra.php',{arreglo:arreglo,user:user},function (responseText) {
        alert(responseText);
        borrado();
    });
}
function borrado(){
    document.getElementById('arreglo').innerHTML="";
    document.getElementById('cantidad').innerHTML="0";
    carritou();
}
function compras_pendientes(partida){
    var url="php/datos/compras_pendeientes.php";
    $.post(url,{partida:partida},function (responseText) {
        $('.comprasUser').html(responseText);
    });
}
function compras_realizadas(partida){
    var url="php/datos/compras_realizadas.php";
    $.post(url,{partida:partida},function (responseText) {
        $('.comprasUser').html(responseText);
    });
}
function agregarMueble(){
    var url="php/paginas/adm_agregarMuebles.php";
    $.post(url,function (responseText) {
        $('#agregarnuevomueble').html(responseText);
    });
}
function eliminarMueble(x){
    var valor=4;
    var url="php/lib/getters.php";
    $.post(url,{x:x,valor:valor},function (responseText) {
        $('.comprasUser').html(responseText);
        alert(responseText);
    });
    listarMuebles(1);
}
function Muser(id){
    var url="php/datos/muebles_user.php";
    $.post(url,{id:id},function (responseText) {
        $('#contenedor_user').html(responseText);
    });
}
function encuesta_user(){
    user=document.getElementById('UsuarioSession').value;
    $.post('php/data/encuestas.php',{user:user},function (responseText) {
        $('.col-md-9').html(responseText);
    });
}
function tomarencuesta(id){
    $('#detalles_encuesta_cliente').modal('show');
    tomarencuestaventana(id,0,1);
}
function tomarencuestaventana(id,limite,pagina){
    user=document.getElementById('UsuarioSession').value;
    $.post('php/data/tomarencuestas.php',{user:user,id:id,limite:limite,pagina:pagina},function (responseText) {
        $('#encuestauser').html(responseText);
    });
    if (limite>=1) {
        guardarEncuestaContestada(user,id);
    }
}
function preopcenc(x,y){
    e=x+"/"+y;
    r=document.getElementById('idpeo').value=e;
}
function guardarEncuestaContestada(user,id){
    r=document.getElementById('idpeo').value;
    var valor=8;
    var url="php/lib/getters.php";
    $.post(url,{valor:valor,id:id,r:r,user:user},function (responseText) {});
}
function eliminarpedido(id){
    var url="php/lib/getters.php";
    valor=9;
    $.post(url,{valor:valor,id:id},function (responseText) {
        alert(responseText);
    });
    compras();
}
function verpedido(id){
    $('#detalles_encuesta_cliente').modal('show');
    $.post('php/data/verpedido.php',{id:id},function (responseText) {
        $('#encuestauser').html(responseText);
    });
}
function editarpedido(id){
     $('#detalles_encuesta_cliente').modal('show');
    $.post('php/data/editarpedido.php',{id:id},function (responseText) {
        $('#encuestauser').html(responseText);
    });
}
function ppadm(){
    $.post('php/paginas/pedidospendiente.php',function (responseText) {
        $('#contenidopedido').html(responseText);
    });
}
function paadm(){
    $.post('php/paginas/pedidosaprobados.php',function (responseText) {
        $('#contenidopedido').html(responseText);
    });
}
function ok_pedido(id){
   var url="php/lib/getters.php";
    valor=10;
    $.post(url,{valor:valor,id:id},function (responseText) {
        alert(responseText);
        ppadm();
    });
}