
CREATE VIEW pedidos_pendiente AS 
SELECT co.idpedido,nombre,mu.mueble,fa.cantidad,co.id,fechainicio,nombre_foto,mu.precio FROM 
cliente AS cl join pedido AS pe ON 
cl.id=pe.idusuario join comprobante AS co ON pe.id=co.idpedido 
join factura AS fa ON co.idpedido=fa.idpedido join muebles
 AS mu ON fa.idproducto=mu.id;