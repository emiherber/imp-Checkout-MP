<?php

class MercadoPago {

    function __construct() {
        if (SERVIDOR_PRUEBAS) {
            // Credenciales Prueba
            echo 'Entorno de prueba';
            MercadoPago\SDK::setClientId('');
            MercadoPago\SDK::setClientSecret('');
        } else {
            // Crecenciales Produccion
            MercadoPago\SDK::setClientId('');
            MercadoPago\SDK::setClientSecret('');
        }
    }

    /**
     * Configura la preferencia según tu producto o servicio:
     * Crea un objeto de preferencia.
     * @return \MercadoPago\Preference
     */
    static function crearPreferencia() {
        $preferencia = new MercadoPago\Preference();
        $preferencia->payment_methods = array(
            "excluded_payment_types" => array(
                array("id" => "ticket"), //Deshabilito el pago en ticket
                array("id" => "atm"), //Deshabilito el pago por atm
            )
        );
        return $preferencia;
    }

    /**
     * Configura la preferencia según tu producto o servicio:
     * Crea un objeto item con los siguientes parametros:
     * @param type $titulo
     * @param type $cantidad
     * @param type $precioUnitario
     * @return \MercadoPago\Item
     */
    static function crearItemPreferencia($titulo, $cantidad, $precioUnitario) {
        $item = new MercadoPago\Item();
        $item->title = $titulo;
        $item->quantity = $cantidad;
        $item->unit_price = $precioUnitario;
        return $item;
    }

    /**
     * Configura la preferencia según tu producto o servicio:
     * Cargamos el item antes creado y se lo agregamos
     * a la preferencia.
     * @param type $preferencia
     * @param type $items
     */
    static function guardarPreferencia($preferencia, Array $items) {
        $preferencia->items = $items;
        $preferencia->save();
        return $preferencia->id;
    }

    /**
     * Suma el checkout a tu sitio
     * Por último, suma el siguiente código para mostrar el botón de pago de tu Checkout 
     * Mercado Pago en el lugar que quieras que aparezca.
     * @param type $id_preferencia
     */
    static function formulario($id_preferencia) {
        echo '<form action="/Checkout-MercadoPago/procesarPago.php" method="post"> '
        . '<script src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js" '
        . 'data-preference-id="' . $id_preferencia . '"> '
        . '</script> '
        . '</form>';
    }

}
