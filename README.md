# Implementación del Checkout PRO de mercado pago  - Argentina
### Documentación oficial
(https://www.mercadopago.com.ar/developers/es/guides/online-payments/checkout-pro/introduction)

#### Requisitos previos para comenzar
(https://www.mercadopago.com.ar/developers/es/guides/online-payments/checkout-pro/previous-requirements/)


Para poder utilizar esta implementación previamente deberá instalar el SDK de mercado pago y obtener 
las credenciales de prueba y/o producción.

##### Instalar SDK
- [Instalar vía composer.](https://www.mercadopago.com.ar/developers/es/guides/sdks)
Seleccionar la opción packagist e instalar el paquete con composer.


##### Obtener credenciales
- [Obtener credenciales.](https://www.mercadopago.com.ar/developers/es/guides/online-payments/checkout-pro/test-integration/)

##### Implementación
En el archivo MercadoPago.php que se encuentra ubicado en la carpeta mercado pago 
es el encargado de definir las configuraciones de la implementación como que métodos 
de pagos se permiten, etc.

> Clase MercadoPago:

    >> Constructor: en el constructor se especifican las credenciales de nuestra cuenta de mercado 
    pago con la que se van a realizar los cobros.
    Mediante la constante SERVIDOR_PRUEBAS especificamos si queremos usar las credenciales de nuestro 
    usuario de prueba o no (Esta constante no define una configuración de la api de mercado pago sino 
    que es un uso interno del proyecto para no tener que cambiar las credenciales cuando estamos en nuestro 
    entorno local).
    
    >> CrearPreferencia: con este método definimos la configuración de nuestra implementación. En este caso por ejemplo estamos definiendo que no aceptamos pagos mediante el medio de pago “ticket” y “atm”. Tener en cuenta que existen múltiples opciones de configuración por lo que deberá consultar la documentación oficial de mercado pago.
    
    >> CrearItemPreferencia: este método te permite crear un ítem. En este caso solo se carga el nombre/titulo, el precio y la cantidad.
    
    >> GuardarPreferencia: este metodo es el encargado de obtener la preferencia_id que necesitaremos para mostrar nuestro formulario de pago.
      Para obtener este id es necesario que le pasemos nuestros items a facturar creados en el método “CrearItemPreferencia”.
    
    >> Formulario: si todo esta bien este método nos mostrara el botón “pagar” con el que podremos realizar cobros en nuestra web. Para ello es necesario pasarle la preferencia_id obtenida en el método anterior.
