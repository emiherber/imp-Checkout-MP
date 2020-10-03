<?php
try {
    $descr = 'Nombre de mi producto';
    $cant = 1;
    $importe = 25.50;
    $mercadoPago = new MercadoPago();
    $preferencia = $mercadoPago::crearPreferencia();
    $itemCompra = $mercadoPago::crearItemPreferencia($desc, $cant, $importe);
    $id = $mercadoPago::guardarPreferencia($preferencia, [$itemCompra]);
    $mercadoPago::formulario($id);
} catch (Exception $ex) {
    throw $ex;
}
