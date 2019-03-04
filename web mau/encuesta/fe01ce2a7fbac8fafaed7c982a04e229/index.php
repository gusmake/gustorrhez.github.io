<html>
<head>
  <title>Demoexpertaria | Encuesta Demo</title>

  <!-- LINKS --->
  <link href="style.css" rel="stylesheet" type="text/css" />
  <link rel="icon" type="image/png" href="favicon.png">

  <!-- METADATOS --->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="keywords" content="Demoexpertaria | Encuesta Demo">
  <meta name="description" content="Demoexpertaria | Encuesta Demo">
  <meta property="og:description" content="" />
  <meta property="og:url" content="http://www.demoexpertaria.info/encuesta/index.php" />
  <meta property="og:type" content="website" />
  <meta property="og:image" content="http://byt.mx/expertaria/encuesta/img/ogimage.png" />
  <meta property="og:title" content="Haz clic, participa... ¡Y gana un iPhone X!" />
  
  <!-- JAVASCRIPTS --->
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script type="text/javascript">
    $(document).on("scroll",function(){
	  if($(document).scrollTop()>160){
	    $("header").removeClass("large").addClass("small");
	  } else{
	    $("header").removeClass("small").addClass("large");
	  }
    });
  </script>
  
  <!-- Global Site Tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-35817860-28"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());
	
	gtag('config', 'UA-35817860-28');
  </script>
  
  <!-- Facebook Pixel Code -->
  <script>
    !function(f,b,e,v,n,t,s)
	{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];
	s.parentNode.insertBefore(t,s)}(window, document,'script',
	'https://connect.facebook.net/en_US/fbevents.js');
	fbq('init', '1287656458047345');
	fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=1287656458047345&ev=PageView&noscript=1"
  /></noscript>
  <!-- End Facebook Pixel Code -->

</head>

<body>
<div align="center">
  <img src="img/gana.jpg" style="width:100%; max-width:900px; margin:0px;">
  <div id="contenido">
    <h1>Suscríbete, participa y gana</h1>
    <p>Expertaria te invita a <b>suscribirte gratuitamente</b> para participar en sus encuestas, a través de las cuales podrás recibir diversos premios por tu participación, desde tarjetas de regalo hasta viajes, smartphones y/o monederos electrónicos.</p>
    <img src="img/bases.png" style="float:left;">
    <h2>Bases</h2>
    <ol>
      <li>Sólo podrán suscribirse personas mayores de 18 años, con domicilio dentro de la República Mexicana.</li>
      <li>La suscripción será a través de la plataforma web de Expertaria e ingresar los siguientes datos:
        <ol type="a">
          <li>Fecha de nacimiento</li>
          <li>Género</li>
          <li>Lugar de residencia</li>
          <li>Número de Whatsapp</li>
          <li>Dirección de email</li>
        </ol>
        No se requieren otros datos personales al momento del registro. Los datos obtenidos serán tratados conforme a nuestro <a href="aviso_privacidad.php">aviso de privacidad</a>.
      </li>
      <li>Después de registrarse, el sistema mostrará una encuesta que deberá responderse completa. Al finalizar de contestar las preguntas, el sistema generará automáticamente el número de folio de participación del concursante para obtener los premios.</li>
      <li>Sólo podrá obtenerse un número de folio de participación en cada encuesta por cada número de WhatsApp registrado.</li>
      <li>Las encuestas se publicarán a través de internet y a cada suscriptor se le mandará la liga o link vía WhatsApp para participar. Estas encuestas sólo estarán disponibles durante 72 horas después de haber recibido el mensaje de notificación.</li>
      <li>los suscriptores podrán obtener premios al participar en las encuestas y completar todas las preguntas en cada una de ellas.</li>
      <li>Los datos que se proporcionen en el registro deberán ser verídicos, dado que se contactará al ganador únicamente a través de alguno de los medios de contacto proporcionados. Los datos de fecha de nacimiento y lugar de residencia también serán corroborados al momento de entregar los premios especiales (viajes, smartphones, etcétera), cotejándolos con la identificación oficial del concursante (credencial del INE, pasaporte, cédula profesional y/o cartilla del Servicio Militar Nacional). En caso de no coincidir, el concursante será automáticamente descalificado y perderá su derecho a recibir el premio.</li>
    </ol>
    <img src="img/premio.png" style="float:left;">
    <h2>Premios</h2>
    <p>Para cada encuesta habrá una mecánica y premios diferentes. Al suscribirte, podrás participar en más de una encuesta, con la posibilidad de seguir ganando premios en cada participación.</p>
    <!--
    <p>Expertaria no se hace responsable de los gastos de envío ni de transportación u hospedaje del ganador, en caso de residir fuera de la Ciudad de México, y quien deberá presentar su identificación oficial al momento de recibir el premio y cuyos datos de fecha de nacimiento, género y lugar de residencia deberán coincidir con los declarados durante el registro, ya que de lo contrario será descalificado automáticamente del concurso.</p>
    -->
    <form action="registro.php" method="post">
      <input name="segmento" type="hidden" value="<? echo $_GET['src']; ?>">
      <input name="estado" type="hidden" value="<? echo $_GET['sta']; ?>">
      <div align="center"><input name="register" type="submit" value="Quiero suscribirme" class="button" /></div>
    </form>
  </div>
  
  <? include('footer.php'); ?>
  
</div>
</body>
</html>