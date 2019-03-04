<?
  include ("tconnection.php");
  
  $folio		=	$_POST['folio'];
  $participante	=	$_POST['participante'];
  $quest16		=	$_POST['quest16'];
  $quest17		=	$_POST['quest17'];
  $date_end		=	date('Y-m-d H:i:s');
  
  $Coneccion	=	new TConeccion();
  $sql = "UPDATE demo_encuesta SET quest16='".$quest16."', quest17='".$quest17."', end='".$date_end."' WHERE id_participante ='".$_POST['participante']."'";
  $Coneccion->Gestion($sql);
?>

<html>
<head>
  <title>Encuesta | ¡Terminaste!</title>

  <!-- LINKS --->
  <link href="style.css" rel="stylesheet" type="text/css" />
  <link rel="icon" type="image/png" href="favicon.png">

  <!-- METADATOS --->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="keywords" content="Haz clic, participa... ¡Y gana un iPhone X!">
  <meta name="description" content="Regístrate para participar en nuestras encuestas y tendrás la oportunidad de ganar un iPhone X">
  <meta property="og:description" content="Regístrate para participar en nuestras encuestas online y tendrás la oportunidad de ganar un iPhone X. ¡Apresúrate, ya que hay pocos lugares! Promoción válida sólo para mayores de 18 años con domicilio en la República Mexicana." />
  <meta property="og:url" content="http://www.demoexpertaria.info/encuesta/index.php" />
  <meta property="og:type" content="website" />
  <meta property="og:image" content="http://www.demoexpertaria.info/encuesta/img/ogimage.png" />
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
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '1287656458047345'); 
fbq('track', 'PageView');
fbq('track', 'CompleteRegistration');
</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id=1287656458047345&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
  

</head>

<body>
<div align="center">
  <div id="contenido">
    <h1>¡Terminaste!</h1>
    <h2>Tu número de folio de participación es: <b><? echo $_POST['folio']; ?></b></h2>
    
    <?
	  $mail_Coneccion = new TConeccion();
	  $mail_query = "SELECT * FROM demo_registro WHERE id = '".$participante."'";
	  $mail_Coneccion->Gestion($mail_query);
	  $row = mysql_fetch_array($mail_Coneccion->Query);
	?>
    
    <p>Con este número de folio participas para obtener los premios que genera esta dinámica.</p>
    <p>En breve recibirás en tu WhatsApp <b><? echo "(".substr($row['whatsapp'],0,2).") ".substr($row['whatsapp'],2,4)."-".substr($row['whatsapp'],6,4); ?></b> las instrucciones para reclamar tu premio.</p>
  </div>
  
  <? include('footer.php'); ?>
  
</div>
</body>
</html>
