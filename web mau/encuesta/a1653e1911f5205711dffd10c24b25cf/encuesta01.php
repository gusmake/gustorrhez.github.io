<?
  include ("tconnection.php");

  $celular		=	$_POST['celular'];
  $celular		=	str_replace("+ 52","",$celular);
  $celular		=	str_replace("+52","",$celular);
  $celular		=	str_replace("+","",$celular);
  $celular		=	str_replace("-","",$celular);
  $celular		=	str_replace("(","",$celular);
  $celular		=	str_replace(")","",$celular);
  $celular		=	str_replace(" ","",$celular);
  $celular		=	str_replace(".","",$celular);
  $celular		=	str_replace(",","",$celular);
  $celular		=	str_replace(";","",$celular);
  
  $verify_Coneccion	=	new TConeccion();
  $verify_query 	=	"SELECT * FROM demo_registro WHERE whatsapp = '".$celular."'";
  $verify_Coneccion->Gestion($verify_query);
  $verify = mysql_fetch_array($verify_Coneccion->Query);
  if ($verify) {
	include('duplicado.php');
	die();
  } else {
    $segmento	=	$_POST['segmento'];
	$estado		=	$_POST['estado'];
	$birthdate	=	$_POST['year']."-".$_POST['month']."-".$_POST['day'];
	$gender		=	$_POST['gender'];
	$state		=	$_POST['state'];
	$email		=	$_POST['email'];
	$ip			=	$_SERVER['REMOTE_ADDR'];
	
	if ($segmento == '') {
	  include('error.php');
	  die();
	} else {	  
	  $Coneccion	=	new TConeccion();
	  $sql = "INSERT INTO demo_registro (birthdate,gender,whatsapp,email,state,id_segmento,id_state,ip) VALUES ('$birthdate','$gender','$celular','$email','$state','$segmento','$estado','$ip')";
	  $Coneccion->Gestion($sql);
	}
  }
  
  $folio_Coneccion = new TConeccion();
  $folio_query = "SELECT * FROM demo_registro WHERE whatsapp = '".$celular."'";
  $folio_Coneccion->Gestion($folio_query);
  $registro = mysql_fetch_array($folio_Coneccion->Query);
  $participante = $registro['id'];
  $folio = $registro['id'];
  if ($folio < 10) { $folio = "0".$folio; }
  if ($folio < 100) { $folio = "0".$folio; }
  if ($folio < 1000) { $folio = "0".$folio; }
  
?>

<html>
<head>
  <title>Encuesta | Parte 1 de 4</title>

  <!-- LINKS --->
  <link href="style.css" rel="stylesheet" type="text/css" />
  <link rel="icon" type="image/png" href="favicon.png">

  <!-- METADATOS --->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="keywords" content="Haz clic, participa... ¡Y gana un iPhone X!">
  <meta name="description" content="Regístrate para participar en nuestras encuestas y tendrás la oportunidad de ganar un iPhone X">
  <meta property="og:description" content="Regístrate para participar en nuestras encuestas online y tendrás la oportunidad de ganar un iPhone X. ¡Apresúrate, ya que hay pocos lugares! Promoción válida sólo para mayores de 18 años con domicilio en la República Mexicana." />
  <meta property="og:url" content="http://www.byt.mx/expertaria/encuesta/home.php" />
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
  
  <script>
    fbq('track', 'CompleteRegistration');
  </script>

</head>

<body>
<script language="JavaScript" type="text/javascript">
  function valida_envia(){
  //valido el nombre

	if (document.getElementById('quest1_1').checked==false && document.getElementById('quest1_2').checked==false && document.getElementById('quest1_3').checked==false){
	  alert("Por favor, responde la pregunta número 1")
	  document.fvalida.quest01.focus()
	  return 0;
	}

	if (document.getElementById('quest2_1').checked==false && document.getElementById('quest2_2').checked==false && document.getElementById('quest2_3').checked==false){
	  alert("Por favor, responde la pregunta número 2")
	  document.fvalida.quest02.focus()
	  return 0;
	}

	if (document.getElementById('quest3_1').checked==false && document.getElementById('quest3_2').checked==false && document.getElementById('quest3_3').checked==false){
	  alert("Por favor, responde la pregunta número 3")
	  document.fvalida.quest03.focus()
	  return 0;
	}

	if (document.getElementById('quest4_1').checked==false && document.getElementById('quest4_2').checked==false && document.getElementById('quest4_3').checked==false){
	  alert("Por favor, responde la pregunta número 4")
	  document.fvalida.quest04.focus()
	  return 0;
	}

	if (document.getElementById('quest5_1').checked==false && document.getElementById('quest5_2').checked==false && document.getElementById('quest5_3').checked==false){
	  alert("Por favor, responde la pregunta número 5")
	  document.fvalida.quest05.focus()
	  return 0;
	}

	
	//el formulario se envia
	document.fvalida.submit();
  }
</script>
<div align="center">
  <img src="img/gana.jpg" style="width:100%; max-width:980px; margin:0px;">
  <div id="contenido">
    <h1>Encuesta</h1>
    <h2>Parte 1 de 4</h2>
    <form action="encuesta02.php" method="post" enctype="multipart/form-data" name="fvalida">
    <input name="folio" type="hidden" value="<? echo $folio; ?>">
    <input name="participante" type="hidden" value="<? echo $participante; ?>">
    
    <p>¿Cuál de las siguientes marcas prefiere?</p>
    <input name="marca" type="image" value="Coppel" src="img/coppel.png" style="background:#EEE; border:outset; width:40%; margin:2%;">
    <input name="marca" type="image" value="Elektra" src="img/elektra.png" style="background:#EEE; border:outset; width:40%; margin:2%;">

    <div align="center"><input name="send" type="button" value="Continuar" onClick="valida_envia()" class="button" /></div>
    </form>
  </div>
  
  <? include('footer.php'); ?>
  
</div>
</body>
</html>
