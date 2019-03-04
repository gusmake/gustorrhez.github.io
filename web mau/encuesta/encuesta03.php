<?
  include ("tconnection.php");
  
  $folio		=	$_POST['folio'];
  $participante	=	$_POST['participante'];
  $quest06		=	$_POST['quest06'];
  $quest07		=	$_POST['quest07'];
  $quest08		=	$_POST['quest08'];
  $quest09		=	$_POST['quest09'];
  $quest10		=	$_POST['quest10'];
  
  $Coneccion	=	new TConeccion();
  $sql = "UPDATE demo_encuesta SET quest06='".$quest06."', quest07='".$quest07."', quest08='".$quest08."', quest09='".$quest09."', quest10='".$quest10."' WHERE id_participante ='".$_POST['participante']."'";
  $Coneccion->Gestion($sql);
?>

<html>
<head>
  <title>Encuesta | Parte 3 de 4</title>

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

</head>

<body>
<script language="JavaScript" type="text/javascript">
  function valida_envia(){
  //valido el nombre

	if (document.getElementById('quest11_1').checked==false && document.getElementById('quest11_2').checked==false && document.getElementById('quest11_3').checked==false && document.getElementById('quest11_4').checked==false && document.getElementById('quest11_5').checked==false){
	  alert("Por favor, responde la pregunta número 11")
	  document.fvalida.quest11.focus()
	  return 0;
	}

	if (document.getElementById('quest12_1').checked==false && document.getElementById('quest12_2').checked==false && document.getElementById('quest12_3').checked==false){
	  alert("Por favor, responde la pregunta número 12")
	  document.fvalida.quest12.focus()
	  return 0;
	}

	if (document.getElementById('quest13_1').checked==false && document.getElementById('quest13_2').checked==false && document.getElementById('quest13_3').checked==false){
	  alert("Por favor, responde la pregunta número 13")
	  document.fvalida.quest13.focus()
	  return 0;
	}

	if (document.getElementById('quest14_1').checked==false && document.getElementById('quest14_2').checked==false && document.getElementById('quest14_3').checked==false && document.getElementById('quest14_4').checked==false){
	  alert("Por favor, responde la pregunta número 14")
	  document.fvalida.quest14.focus()
	  return 0;
	}

	if (document.getElementById('quest15_1').checked==false && document.getElementById('quest15_2').checked==false && document.getElementById('quest15_3').checked==false){
	  alert("Por favor, responde la pregunta número 15")
	  document.fvalida.quest15.focus()
	  return 0;
	}

	
	//el formulario se envia
	document.fvalida.submit();
  }
</script>
<div align="center">
  <div id="contenido">
    <h1>Encuesta</h1>
    <h2>¡Ya casi terminamos!</h2>
    <img src="img/stage03.png" style="width:100%; max-width:880px; margin:0px;">
    <form action="encuesta04.php" method="post" enctype="multipart/form-data" name="fvalida">
    <input name="folio" type="hidden" value="<? echo $_POST['folio']; ?>">
    <input name="participante" type="hidden" value="<? echo $_POST['participante']; ?>">
    <ol start="11">
      <li><b>Si pudieras describir tu sentimiento con respecto al presente de México en una sola palabra, ¿Cuál palabra sería la más adecuada?</b><br>
        <div class="option"><input name="quest11" id="quest11_1" type="radio" value="Tranquilo" /> Tranquilo</div>
        <div class="option"><input name="quest11" id="quest11_2" type="radio" value="Confiado" /> Confiado</div>
        <div class="option"><input name="quest11" id="quest11_3" type="radio" value="Enojado" /> Enojado</div>
        <div class="option"><input name="quest11" id="quest11_4" type="radio" value="Ansioso" /> Ansioso</div>
        <div class="option"><input name="quest11" id="quest11_5" type="radio" value="No sé" /> No sé</div>
        <div style="clear:both"></div>
      </li>
      
      <li><b>¿Crees que, en lo general, México está avanzando como país?</b><br>
        <div class="option"><input name="quest12" id="quest12_1" type="radio" value="Si" /> Sí</div>
        <div class="option"><input name="quest12" id="quest12_2" type="radio" value="No" /> No</div>
        <div class="option"><input name="quest12" id="quest12_3" type="radio" value="No sé" /> No sé</div>
        <div style="clear:both"></div>
      </li>
      
      <li><b>¿Crees que, en lo general, el estado en el que vives está avanzando?</b><br>
        <div class="option"><input name="quest13" id="quest13_1" type="radio" value="Si" /> Sí</div>
        <div class="option"><input name="quest13" id="quest13_2" type="radio" value="No" /> No</div>
        <div class="option"><input name="quest13" id="quest13_3" type="radio" value="No sé" /> No sé</div>
        <div style="clear:both"></div>
      </li>
      
      <li><b>Este año, ¿cómo sientes que es tu situación económica actual?</b><br>
        <div class="option"><input name="quest14" id="quest14_1" type="radio" value="Mejor" /> Mejor que el año pasado</div>
        <div class="option"><input name="quest14" id="quest14_2" type="radio" value="Igual" /> Igual que el año pasado</div>
        <div class="option"><input name="quest14" id="quest14_3" type="radio" value="Peor" /> Peor que el año pasado</div>
        <div class="option"><input name="quest14" id="quest14_4" type="radio" value="No sé" /> No sé</div>
        <div style="clear:both"></div>
      </li>
      
      <li><b>¿Crees que la situación actual de México podría estar peor de lo que actualmente está?</b><br>
        <div class="option"><input name="quest15" id="quest15_1" type="radio" value="Si" /> Sí</div>
        <div class="option"><input name="quest15" id="quest15_2" type="radio" value="No" /> No</div>
        <div class="option"><input name="quest15" id="quest15_3" type="radio" value="No sé" /> No sé</div>
        <div style="clear:both"></div>
      </li>  
    </ol>
    <div align="center"><input name="send" type="button" value="Continuar" onClick="valida_envia()" class="button" /></div>
    </form>
  </div>
  
  <? include('footer.php'); ?>
  
</div>
</body>
</html>
