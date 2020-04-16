<!--
//register.php
!-->

<?php

include('database_connection.php');

session_start();

$message = '';

if(isset($_SESSION['user_id']))
{
	header('location:index.php');
}


?>

<html>  
    <head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">  
        <title>Domiti</title>  
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  		<link rel="stylesheet" href="./assets/css/estilos.css">
  		<script src="./assets/css/jquery.min.js"></script>
  		
  		<!--nuevo-->
  			<link rel="stylesheet" href="./assets/css/materialize.min.css">
	<link rel="stylesheet" href="./assets/css/style.css">
		<!--JavaScript at end of body for optimized loading-->
	<script type="text/javascript" src="assets/js/materialize.min.js"></script>
<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
    </head> 
    <!--Inicio cabecera-->	
<header>
                     <ul class="menu">
					 <a href="login.php">
					 <img src="./assets/img/logo.png" alt="" width="50px" height="50px">
					</a>
                      <li><a href="login.php">Iniciar Sesion!</a>

                          <ul>
                          </ul>
                      </li>
                  </ul>   


</header>

<!--final cabecera-->
    <body >  
        <div class="container">
			<br />
			<div class="hero-title" align="center">
			<h2 class="hero-title"> Terminos y Condiciones <strong>Domiti</strong></h2>
			<br>
            </div>
			<div class="panel panel-default">
				<div class="panel-body">
<p align="center">
<h6>ASPECTOS GENERALES</h6>
INFORMACIÓN
NATURALEZA JURÍDICA
Los presentes términos y condiciones de uso regulan la relación contractual de carácter comercial que une a los Consumidores que acceden a la plataforma virtual y a Domiti, especialmente en la autorización de uso que otorga éste en favor de aquel.
DEFINICIONES
Mensajes de datos: La información generada, enviada, recibida, almacenada o comunicada por medios electrónicos, ópticos o similares, como pudieran ser, entre otros, el Intercambio Electrónico de Datos (EDI), Internet, el correo electrónico, el telegrama, el télex o el telefax (Ley 527 de 1999 art. 2 lit. a).
Comercio Electrónico: Comprende el envío, transmisión, recepción, almacenamiento de mensajes de datos por vía electrónica. Las dudas que surjan respecto de la eficacia y validez de los mensajes de datos y demás actividades vinculadas al comercio electrónico se interpretarán de conformidad con la ley 527 de 1999.
Cookies: Cadenas de texto enviadas virtualmente que son almacenadas por el uso de La Plataforma por el Operador, para la consulta de las actividades y preferencias de los usuarios.
Consumidores: Toda persona natural que, como destinatario final, use La Plataforma para solicitar por medio de ésta un mandato remunerado, cuyo encargo consiste en la celebración de un contrato de compraventa o cualquier otro tipo de contrato lícito, con el fin de adquirir bienes o servicios.
Mandatario: Persona natural que acepta realizar la gestión del encargo solicitado por el Consumidor a través de la Plataforma. El Mandatario actúa por cuenta y riesgo propio y libera de cualquier tipo de responsabilidad que pueda surgir durante la prestación del servicio al Consumidor.
Operador de La Plataforma: Encargado de administrar operativamente y funcionalmente la Plataforma, representado para los efectos de los presentes términos por Domiti, o por la persona natural o jurídica que ésta designe.
Contrato de mandato remunerado celebrado por medios electrónicos: Aquel acuerdo de voluntades celebrado entre el Consumidor y el Mandatario, por medio del cual el Consumidor solicita, a través de la Plataforma,  la gestión de un encargo al Mandatario, obligándose este último a cumplir con dicho encargo por cuenta y riesgo propio, a cambio de recibir una remuneración como contraprestación.
Datos personales: Es toda información que permite identificar o hacer identificable a una persona física.
Interacción en La Plataforma: Facultad de acceso por parte de los Consumidores para conocer los productos y servicios exhibidos por el OPERADOR, la publicidad puesta a disposición en la Plataforma y manifestar su voluntad de solicitar un encargo.
Mayor de edad: Persona natural mayor de dieciocho (18) años.
Pasarela de pagos: Servicio que permite la realización de pagos por parte de los Consumidores directamente a los Mandatarios , a través de medios electrónicos utilizando plataformas tecnológicas (software).
La Plataforma: Aplicativo web y móvil administrado por el OPERADOR, que permite la concurrencia de Consumidores y Mandatarios para que por medio de contratos de mandato el Consumidor solicite la gestión de un encargo.
Publicidad: Es toda forma de comunicación realizada por el OPERADOR, con el fin de brindar información sobre productos, actividades comerciales y comunicar estrategias o campañas publicitarias o de mercadeo, propias o de terceros ; realizada como mecanismo de referencia y no como oferta pública.
Producto: Bien de consumo exhibido a través de la Plataforma.
Términos y condiciones de uso de La Plataforma: Constituyen los términos que han de regular el uso que los Consumidores dan a La Plataforma, así como las relaciones contractuales que se pueden generar entre Consumidores y Mandatarios.
Ventanas emergentes (Pop-Ups): Ventana o aviso de internet que emerge automáticamente en cualquier momento cuando se utiliza la Plataforma, especialmente utilizado para la formalización del contrato de mandato entre Consumidores y Mandatarios.
OBJETO
Los presentes términos y condiciones regulan la autorización de uso que otorga el Operador a los Consumidores, para que éstos ingresen a la plataforma virtual, se informen sobre los productos de consumo exhibidos, para que sean utilizados como referencia y puedan solicitar la gestión de un encargo, por medio de un contrato de mandato con el Mandatario.
El Operador a través de la Plataforma realiza las siguientes acciones: i) exhibe diferentes productos y servicios de consumo de forma publicitaria para que puedan servir de referencia a los Consumidores, ii) facilita el encuentro entre Consumidores y Mandatario para la realización del vínculo contractual,iii) sirve de medio de envío de comunicaciones entre los Consumidores y los Mandatarios.
La celebración de la relación contractual entre Consumidores y Mandatarios, se da con Consumidores que se encuentren en el municipios cercanos de Sogamoso(incluyendo Sogamoso) Boyacá, que debe ser realizado en territorio colombiano, pagando una contraprestación económica, mediante dinero en efectivo al momento de la recepción de los productos o envíos de pago como Nequi o Daviplata, a elección del Consumidor.
A través de la Plataforma se exhiben productos, cuya gestión de compra es encargada por los Consumidores a los Mandatarios, siendo que los primeros buscan satisfacer una necesidad privada, personal o familiar, y en ningún momento pretenden la comercialización, reventa o cualquier otro tipo de transacción comercial o interés con los productos adquiridos.
PLATAFORMA TECNOLÓGICA QUE PERMITE SU USO
Es una plataforma que permite su uso gratuito por varios medios, a saber: i) portal web: i) aplicación que se puede descargar en dispositivos móviles por medio de la tiendas virtuales de aplicaciones como Google (Google Play), medio que en adelante y para los efectos de los presentes términos se denominarán conjuntamente “La Plataforma”. Los Consumidores podrán utilizar La Plataforma exclusivamente para su uso personal, sin que esto implique el otorgamiento de una licencia de la tecnología de la plataforma de ningún tipo.
MODIFICACIÓN
El Operador podrá modificar autónomamente y en cualquier momento en aspectos formales, procedimentales o sustanciales los presentes Términos y Condiciones de uso de La Plataforma, los cuales serán actualizados y puestos a disposición de los Consumidores en La Plataforma, siendo la última versión publicada la que regulará las relaciones comerciales que se generen al momento de realizarse la transacción. Así mismo, cuenta con plena autonomía para modificar los usos de La Plataforma permitidos a los Consumidores, con el único deber de informarlo por un medio virtual que permita su publicación y comunicación al público.
DETALLE DEL SERVICIO
CONSUMIDOR
Toda persona natural que, como destinatario final, use La Plataforma para solicitar por medio de ésta un mandato remunerado, cuyo encargo consiste en la celebración de un contrato de compraventa o cualquier otro tipo de contrato lícito, con el fin de adquirir bienes o servicios.
El uso de la Plataforma lo realiza el Consumidor como persona capaz, manifestando que, para la celebración de contratos de mandato con el Mandatario, cuenta con plena capacidad legal para ser sujeto de derechos y obligaciones, calidades que refrenda al momento de generar su registro.
El Consumidor tiene la obligación de: 1) proveer su número de teléfono de Colombia.
MANDATARIO
Persona natural que acepta realizar la gestión del encargo solicitado por el Consumidor a través de La Plataforma, por cuenta y riesgo propio.
CUENTA DE USUARIO
Los Consumidores usan como referencia para el encargo de compra, los productos que se encuentran exhibidos en La Plataforma, teniendo como condición necesaria la creación de una Cuenta de Usuario, donde se solicitarán datos como nombre, teléfono y dirección.Se encuentra prohibido tener más de una (1) cuenta relacionada a cualquiera de los datos anteriormente mencionados. Esta información se utiliza para la plena identificación de las personas que pretenden realizar el encargo al Mandatario y de esta manera adquirir los productos, para el cumplimiento de los presentes términos y condiciones, para la prevención de fraudes, para vincular al Consumidor con el Mandatario y en general para los fines definidos en el acápite manejo de información.
Podrán los Consumidores, además de la información obligatoria y facultativa requerida al momento de la creación de la cuenta, suministrar voluntariamente más datos relacionados con su individualización al momento en que cree su propio Perfil dentro de La Plataforma.
El uso de las cuentas es personal e intransferible, por lo cual los Consumidores no se encuentran facultados para ceder los datos de validación para el acceso a La Plataforma ni el uso de su cuenta a ningún tipo de terceros. El incumplimiento de lo anterior, acarreará la suspensión y bloqueo definitivo de la cuenta (incluye número de télefono). En caso de olvido de los datos de validación o de usurpación de éstos, es obligación del Consumidor informarlo al Operador a través de la opción “olvidó su contraseña” o a través de comunicación enviada al correo electrónico domiticontact@gmail.com. Las cuentas de los usuarios serán administradas por el Operador o por la persona que éste designe, teniendo plena facultad para la conservación o no de la cuenta, cuando la información suministrada por los Consumidores no sea veraz, completa o segura; o cuando se presente incumplimiento de las obligaciones de los Consumidores. En ningún momento el Operador solicitará al Consumidor información que NO resulte necesaria para su vinculación con el Mandatario y para la facilitación del pago.
Con la creación de la Cuenta de Usuario, los Consumidores están manifestando su voluntad de aceptación expresa e inequívoca de los presentes Términos y Condiciones de uso de La Plataforma, así como de la Política de tratamiento de datos personales de Domiti.
Parágrafo. Autoriza expresamente el Consumidor al momento de la aceptación de los presentes Términos, el uso de Cookies por parte del Operador en toda actividad de uso que realice de la Plataforma.
CAPACIDAD
Es claro para el Consumidor que la relación contractual que se puede llegar a generar por el uso de La Plataforma no vincula de ninguna manera al Operador. Lo anterior, puesto que la relación contractual será directamente con el Mandatario, y consistirá en un contrato de mandato remunerado celebrado por medio electrónicos, en el que el Consumidor es el mandante.
En virtud de las condiciones de capacidad legal establecidas en el Código Civil Colombiano y de la validez de la manifestación de voluntad a través de medios electrónicos establecida en la ley 527 de 1999, los Consumidores al momento de la creación de la Cuenta de Usuario, manifiestan expresamente tener capacidad para celebrar el tipo de transacciones que se pueden realizar usando La Plataforma; y con base en lo prescrito en la ley 1098 de 2006 de la República de Colombia los menores de edad cuentan con capacidad para celebrar éste tipo de transacciones, no obstante el Operador deberá: i) Excluir del sistema de información los datos de menores de edad que hayan utilizado La Plataforma; ii) Dar a conocer a las autoridades de cualquier situación, de la que tenga conocimiento, que ponga en peligro la integridad de un menor de edad; iii) Informar a los menores que se encuentren interesados en adquirir productos a través de La Plataforma usando medios de pago electrónico, que deberán realizar la transacción económica de carácter electrónico a través de sus padres o representantes legales, previo registro en la plataforma por parte de éstos.
DESCRIPCIÓN DEL SERVICIO
El Operador exhibe a través de La Plataforma productos de consumo como alimentos,bebidas,productos farmacéuticos, productos de aseo personal, productos de aseo general, productos misceláneos y de ferretería, que están a disposición de los Consumidores para su conocimiento general. Esta comunicación de productos sirve como referencia a los Consumidores para el encargo de compraventa, usando La Plataforma como medio para solicitar la gestión de un encargo de compraventa, celebrándose un contrato de mandato remunerado con el Mandatario.
Para el proceso de solicitud de gestión del encargo de compraventa, los Consumidores deben estar plenamente identificados en su Cuenta de Usuario y seguir el siguiente procedimiento:
a) Ingresar a la Plataforma especificando el domicilio para determinar los productos que se encuentran disponibles en este sector.
b) Seleccionar el lugar de entrega. Se debe suministrar por el Consumidor la dirección exacta donde se realizará la entrega del (los) producto (s) seleccionados, esta dirección debe encontrarse en el rango de cobertura de entrega, en caso de no encontrarse en dicho rango no se permitirá la finalización de la transacción.
c) Seleccionar el producto. Una vez seleccionado se pone a disposición del Consumidor las características y valor total del producto por medio de fotografías y notas de referencias, que permiten la plena individualización del producto para el análisis detallado del Consumidor.
d) Validación del producto. Cumplido el paso anterior, el Operador deberá exhibir al consumidor un resumen del producto en cuanto a sus condiciones generales tales como la marca y la presentación suministrada. De esta manera el Consumidor podrá validar y confirmar la información y el producto seleccionado.
e) Ingreso del producto al carrito de compras. Este ingreso corresponde a la voluntad inequívoca del Consumidor de solicitar la gestión de un encargo consistente en adquirir un producto determinado, ya que se ha informado con suficiencia las características del mismo, teniendo la posibilidad de adquirirlo o no. El Operador tiene total autonomía para limitar el ingreso de productos al carrito de compras con ocasión a la cantidad.
f) Valor. Una vez se han agotados los pasos precedentes, se pone a disposición del Consumidor el valor a pagar por la gestión del encargo solicitado, consistente en la compra de los productos seleccionados. Dicho valor refleja: i) remuneración por el mandato (valor del servicio de domicilio); ii) la suma a reembolsar por la gestión, la cual se encuentra discriminada unitariamente y en conjunto por todos los productos, cuya adquisición fue solicitada. El valor a reembolsar corresponde al valor total de los productos adquiridos, incluyendo todos los costos de la transacción.
Recuerda que Domiti no comercializa productos de sus Aliados Comerciales. En caso de requerir la factura de venta, deberás solicitarla al Domitendero en el desarrollo de tu orden.
g) Pago. El Consumidor realizará el pago directamente al Mandatario bien sea en efectivo o a través de las plataforma virtuales de pagos que tiene contratadas el Operador para este fin(Nequi y Daviplata). La orden/compra se entiende finalizada y por lo tanto realizada, una vez el Mandatario entrega los productos al Consumidor y siempre y cuando tramite y finalice la orden.
h) Forma de pago. El Consumidor debe seleccionar el medio de pago que desea utilizar, teniendo como posibilidades el pago contra-entrega a través de i) dinero en efectivo o ii) por medio de pago electrónico a través de plataformas de pago como Nequi o Daviplata. iii) El usuario tendrá la obligación de verificar el número telefónico al interior de su cuenta en la plataforma virtual, conforme al procedimiento estipulado y disponible en esta.
i) Registro. El Usuario (Consumidor) debe crear su cuenta personal en la cual se requerirán los datos personales que permitan su identificación, mas no su individualización.
j) Resumen y Correo electrónico. Una vez completados los pasos anteriores se le exhibe a través de una ventana emergente al Consumidor un resumen detallado de la transacción y la información completa del Mandatario que ha aceptado gestionar el encargo solicitado y con el cual se celebra el contrato de mandato. Dicho resumen será enviado por correo electrónico al Consumidor con ésta información de forma detallada.
k) Resumen del encargo. En todo caso, sea que el pago se realice en dinero en efectivo o a través de la pasarela de pagos, se enviará vía correo electrónico el resumen del encargo solicitado, con el detalle de la transacción. Domiti no emite facturas toda vez que solo es una plataforma virtual que no comercializa productos ni servicios directamente. El vendedor directo de los productos y servicios es el tercero, con quien el Mandatario celebra un contrato por cuenta y riesgo propio. De esta manera, en caso de requerir la factura de compra de los productos, el usuario deberá informar al Mandatario, bien sea por el chat de la plataforma virtual o por vía telefónica, que desea recibir la factura de los productos que el Mandatario adquirió en cualquier establecimiento de comercio. Domiti no será responsable por la entrega de facturas y el usuario deberá entenderse directamente con el Mandatario, toda vez que es éste quién realiza el encargo solicitado por el Consumidor.
Parágrafo primero. Los servicios prestados por el Mandatario directamente a través del botón de Favores se encuentran excluidos de esta solicitud toda vez que no existe obligación de emitir factura.
l) Entrega. Verificados todos los datos correspondientes a la transacción y al ámbito de cobertura de entrega de productos, el Mandatario entregará en la dirección suministrada y en el término definido al finalizar la operación, los productos comprados en virtud del encargo solicitado. En caso de no poderse realizar la entrega por razones imputables al Consumidor, deberá el Mandatario dejar constancia de este hecho.
Parágrafo. El perfeccionamiento del contrato de mandato celebrado por medios electrónicos se da en el momento en que el Mandatario entrega el encargo realizado al Consumidor.
DEBERES DEL CONSUMIDOR
Con la aceptación de los presentes términos El Consumidor se obliga a: (1) Suministrar información veraz y fidedigna al momento de crear su Cuenta de Usuario; (2) Abstenerse de transferir a terceros los datos de validación (nombre de usuario y contraseña); (3) Abstenerse de utilizar la Plataforma para realizar actos contrarios a la moral, la ley, el orden público y buenas costumbres en contra del Operador, los Mandatarios o de terceros; (4) Pagar oportunamente al Mandatario la contraprestación económica definida en el contrato de mandato; (5) Informar inmediatamente al Operador en caso de olvido o usurpación de los datos de validación; (6) Abstenerse de realizar conductas atentatorias del funcionamiento de La Plataforma; (7) Abstenerse de suplantar la identidad de otros Consumidores; (8) Abstenerse de descifrar, descompilar o desensamblar cualquier elemento de La Plataforma o de cualquiera de sus partes; (9) Habilitar la utilización de ventanas emergentes durante la operación; (10) En general todas aquellas conductas necesarias para la ejecución del negocio jurídico, como i) la recepción de los productos solicitados, ii) exhibir la identificación en caso de venta de productos de uso restringido, iii) verificar al momento de la validación que los productos seleccionados sí corresponden a los necesitados, iv) informarse sobre las instrucciones de uso y consumo de los productos.
DEBERES DEL OPERADOR
En virtud de los presentes términos el Operador, se obliga a (1) Suministrar información cierta, fidedigna, suficiente, clara y actualizada respecto de los productos que exhibe; (2) Indicar las características generales del producto para que sirvan de referencia a los Consumidores, para el efecto son marca y presentación; (3) Informar suficientemente sobre los medios habilitados para que los Consumidores realicen el pago; (4) Informar en el momento indicado y con suficiencia los datos de los Mandatarios con los cuales los Consumidores han de celebrar el contrato de mandato; (5) Enviar al correo electrónico suministrado por el Consumidor resumen del encargo y constancia de la transacción; (6) Poner a disposición de los Consumidores los términos y condiciones de uso de La Plataforma de forma actualizada; (7) Utilizar la información únicamente para los fines establecidos en los presentes términos; (8) Utilizar mecanismos de información y validación durante la transacción como ventanas emergentes (Pop Ups), que permitan al Consumidor aceptar o no cada paso del proceso de compra.
DESCRIPCIÓN DE LOS PRODUCTOS Y SERVICIOS
Los productos y servicios exhibidos por el Operador son productos de consumo doméstico como alimentos, bebidas, productos de aseo personal, productos de aseo general, entre otros. Todos los productos cuentan con una descripción general; esta descripción se realiza por el Operador a partir de prácticas legales de visualización, que en todo caso dependen del dispositivo en donde el Consumidor observe el producto. La disponibilidad será definida en cada caso en concreto al momento en que el Mandatario gestione el encargo del producto con Proveedores oficiales. Dentro de la ejecución del contrato de mandato, el Consumidor determinará qué acción debe realizar el Mandatario en caso de no hallar el producto o productos solicitados, entre: (i) Cumplir con el pedido excluyendo el producto o productos solicitados no hallados, caso en el cual se descontará su valor del valor total del pedido y, en caso de ser sólo un producto y no se halla, deberá elegir entre la cancelación del pedido o el cumplimiento con uno sustituto o similar en precio y tipo; (ii) Comunicarse con el Consumidor para concertar el cumplimiento con un producto sustituto; y (iii) Autorizar al Mandatario para llevar un producto similar en precio y tipo.
Es claro para el Consumidor que el Operador no es productor, proveedor, expendedor, agente, distribuidor y en general ningún tipo de comercializador de los productos que exhibe, ya que opera solo como una plataforma tecnológica que permite el encuentro de Consumidores y Mandatario para la gestión de encargos.
Los productos de uso restringido, como tabaco y bebidas embriagantes, solo podrán ser adquiridas por el Mandatario, en virtud del encargo realizado por Consumidores que cuenten con mayoría de edad, quienes manifiestan expresamente esta calidad al momento de registrarse en la plataforma o de seleccionar el producto. En caso de no cumplir con ésta obligación, el Mandatario no entregará el producto y en el evento de haber pagado por el producto, deberá solicitar la devolución de su dinero. En el evento de haber solicitado junto con los productos de uso restringido otros de diferente calidad e igualmente se incumpla la obligación acá descrita, aplicarán las mismas consecuencias jurídicas aquí definidas, pero solo en relación con los productos de uso restringido.
Cuando por errores de carácter tecnológico se exhiban precios erróneos de los productos en la Plataforma, que evidentemente resultan desproporcionados, comparativamente con el precio del producto en el mercado, el Operador podrá cancelar la(s) ordenes realizadas de productos con dichos precios, a su libre discreción y con plena autonomía.
El Operador se reserva el derecho de actualizar, modificar y/o descontinuar los productos exhibidos en La Plataforma.
GARANTÍA
Entiende y acepta el Consumidor que la relación jurídica de mandato se genera directamente con los Mandatarios, por lo tanto, las reclamaciones por garantía se deben realizar directamente a los Mandatarios, quienes tienen la obligación de responder por la gestión del encargo.
CONSIDERACIONES FINALES
CONTENIDOS
A través de la Plataforma el Operador podrá poner a disposición de los Consumidores información de carácter comercial y publicitario, propio o de terceros de conformidad a las buenas costumbres comerciales. En estos casos el Operador no avala, garantiza o compromete su responsabilidad frente a los servicios y/o productos que se comercialicen por éstos terceros, ya que la Plataforma sirve como canal de comunicación y publicidad, mas no como herramienta de prestación de servicios. En consecuencia, es total responsabilidad de los Consumidores el acceso a los sitios que remite la publicidad, asumiendo la obligación de verificar y conocer los términos de los servicios ofrecidos por los terceros.
Toda la información puesta a disposición en la Plataforma como imágenes, publicidad, nombres, marcas, lemas y demás elementos de propiedad intelectual; son utilizados legítimamente por el Operador, sea porque son de su propiedad, porque tiene autorización para ponerlos a disposición,  o porque se encuentra facultado para hacerlo en  virtud de las decisiones 351 de 1993 y 486 de 2000 de la Comunidad Andina de Naciones y la ley 23 de 1982 .
FUNCIONAMIENTO DE LA PLATAFORMA
El Operador administra directamente o por medio de terceras personas la Plataforma, toda la información que se comunica allí corresponde a información cierta y actualizada. En ningún caso responderá por daños directos o indirectos que sufra el Consumidor por la utilización o incapacidad de utilización de La Plataforma.
La plataforma se encuentra disponible las 24 horas del día para su acceso y consulta. Para la realización de transacciones la disponibilidad de La Plataforma es de 24 horas al día, dependiendo de la disponibilidad de los Mandatarios. El Operador realiza los mejores esfuerzos para mantener en operación La Plataforma, pero en ningún caso garantiza disponibilidad y continuidad permanente de La Plataforma.
El Operador se reserva el derecho de cancelar las cuentas de usuarios y/o de prohibir el acceso a La Plataforma a los Consumidores que realicen conductas violatorias de los presentes términos o que incumplan las obligaciones contraídas.
DERECHO DE RETRACTO
Domiti solo actúa como un portal de contacto entre Consumidores y proveedores de bienes y servicios. Todos los productos que ves reflejados y exhibidos en la plataforma son comercializados por nuestros Aliados Comerciales.
Para todos los productos que adquieras de los Aliados Comerciales a través de Domiti, podrás ejercer tu derecho de retracto frente al proveedor o vendedor del producto de la siguiente manera:
El Consumidor deberá acercarse con la factura de venta directamente a la tienda o punto de venta del proveedor o vendedor del producto en los casos donde sea procedente y exigible según los parámetros de la Ley 1480 de 2011.
REVERSIÓN DEL PAGO
En caso de solicitar la reversión del pago esta se realizará al mismo método de pago utilizado por este para la compra o, en caso de haber aceptado un método diferente, será regresado donde se indique siempre y cuando sea posible. En caso de que el pago se haya realizado con dinero en efectivo, el pago se realizará a la cuenta de nequi o daviplata indicada por el Consumidor en un plazo de treinta (30) días.
El cliente deberá pagar el valor del envío en caso de devolución del producto al proveedor o vendedor de este.
COMERCIO ELECTRÓNICO
En cumplimiento de las disposiciones colombianas sobre mensajes de datos según la ley 527 de 1999, se comunica que la legislación nacional reconoce validez a los mensajes de datos y por tanto ellos adquieren carácter y entidad probatoria. En consecuencia, entienden los Consumidores, que mediante el cruce de mensajes de datos los intervinientes pueden dar lugar al nacimiento, modificación y extinción de obligaciones, siendo de su resorte exclusivo el contenido, consecuencias, responsabilidades y efectos de la información generada.
La transacción comercial que nace por este medio entre Consumidores y Mandatarios, es la celebración de un contrato de mandato por medios electrónicos, el cual se describe en la ventana emergente que acepta el Consumidor al momento de la celebración del negocio jurídico, en ningún momento se configura relación contractual diferente como suministro, distribución o demás similares.
MANEJO DE INFORMACIÓN
La información recolectada por el Operador para la solicitud del encargo, es suministrada por los Consumidores de forma libre y voluntaria, para que esta sea administrada por el Operador o por quien éste designe para el cumplimiento de los deberes adquiridos, lo que implica su recolección; almacenamiento en servidores o repositorios del Operador o de terceros; circulación de los mismos dentro de la organización del Operador; comunicación a los Consumidores información comercial, publicitaria y de mercadeo relacionada con su actividad comercial.
Así mismo, los datos recolectados serán objeto de análisis para fines de mejorar la estrategia de negocios del portal web, apoyada en herramientas de inteligencia de negocios y minería de datos, que permiten adquirir conocimientos prospectivos para fines de predicción, clasificación y segmentación.
El Consumidor podrá ejercer su derecho de conocer, actualizar, modificar y suprimir los datos personales existentes en las bases de datos asociadas a la Plataforma. Para ello deberá realizar la solicitud de consulta, reclamo o supresión a la dirección electrónica domiticontact@gmail.com detallando las modificaciones a realizar y aportando los documentos que lo soportan.
El Operador es responsable del tratamiento de la información personal recolectada a través del aplicativo móvil, responsabilidad que podrá delegar en un tercero, en calidad de responsable o encargado de la información, asegurando contractualmente adecuado tratamiento de la misma.
Domiti se reserva el derecho de cancelar cualquier orden que se genere a través de su plataforma, con el fin de evitar cualquier tipo de fraude. Domiti realizará las verificaciones correspondientes y cancelará la orden sin previo aviso al usuario.
DOMICILIO Y LEGISLACIÓN APLICABLE
Los presentes Términos y Condiciones de Uso de La Plataforma se acogen en el territorio Colombiano, conforme a su normatividad general y sectorial. Su adopción implica el ejercicio de su libre voluntad y que la relación que surge de este documento se regirá en todos sus efectos por su contenido y en su defecto por la ley comercial colombiana.
ACEPTACIÓN TOTAL DE LOS TÉRMINOS
El Consumidor manifiesta expresamente tener capacidad legal para usar La Plataforma y para celebrar las transacciones comerciales que se puedan generar con los Mandatarios. Así mismo, manifiesta haber suministrado información real, veraz y fidedigna; por ende de forma expresa e inequívoca declara que ha leído, que entiende y que acepta la totalidad de las situaciones reguladas en el presente escrito de Términos y Condiciones de Uso de la Plataforma, por lo que se compromete al cumplimiento total de los deberes, obligaciones, acciones y omisiones aquí expresadas.
</p>
					<br>
					<div class="form-group" align="center">
							<input type="submit" class="button" value="Entendido!" onclick="location.href='register.php'" />
						</div>
						<br>
						<div align="center">
					<h6>&iquest;Ya tienes una cuenta&#63;<a href="login.php" class="txt"> Haz click aqu&iacute; para iniciar sesi&oacute;n.</a></h6>
					</div>
					</form>
				</div>
			</div>
		</div>
    </body>  
</html>
