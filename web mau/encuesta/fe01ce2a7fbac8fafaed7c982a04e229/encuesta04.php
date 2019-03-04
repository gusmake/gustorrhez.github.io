<?
  include ("tconnection.php");
  
  $folio		=	$_POST['folio'];
  $participante	=	$_POST['participante'];
  $quest11		=	$_POST['quest11'];
  $quest12		=	$_POST['quest12'];
  $quest13		=	$_POST['quest13'];
  $quest14		=	$_POST['quest14'];
  $quest15		=	$_POST['quest15'];
  
  $Coneccion	=	new TConeccion();
  $sql = "UPDATE demo_encuesta SET quest11='".$quest11."', quest12='".$quest12."', quest13='".$quest13."', quest14='".$quest14."', quest15='".$quest15."' WHERE id_participante ='".$_POST['participante']."'";
  $Coneccion->Gestion($sql);
?>

<html>
<head>
  <title>Encuesta | Parte 4 de 4</title>

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

	if (document.getElementById('quest16_01').checked==false && document.getElementById('quest16_02').checked==false && document.getElementById('quest16_03').checked==false && document.getElementById('quest16_04').checked==false && document.getElementById('quest16_05').checked==false && document.getElementById('quest16_06').checked==false && document.getElementById('quest16_07').checked==false && document.getElementById('quest16_08').checked==false && document.getElementById('quest16_09').checked==false && document.getElementById('quest16_10').checked==false && document.getElementById('quest16_11').checked==false){
	  alert("Por favor, responde la pregunta número 16")
	  document.fvalida.quest16.focus()
	  return 0;
	}
	
	if (document.getElementById('quest17_01').checked==false && document.getElementById('quest17_02').checked==false && document.getElementById('quest17_03').checked==false && document.getElementById('quest17_04').checked==false && document.getElementById('quest17_05').checked==false && document.getElementById('quest17_06').checked==false && document.getElementById('quest17_07').checked==false && document.getElementById('quest17_08').checked==false && document.getElementById('quest17_09').checked==false){
	  alert("Por favor, responde la pregunta número 17")
	  document.fvalida.quest17.focus()
	  return 0;
	}
	
	//el formulario se envia
	document.fvalida.submit();
  }
</script>
<div align="center">
  <div id="contenido">
    <h1>Encuesta</h1>
    <h2>¡Este es el último paso!</h2>
    <img src="img/stage04.png" style="width:100%; max-width:880px; margin:0px;">
    <form action="encuesta05.php" method="post" enctype="multipart/form-data" name="fvalida">
    <input name="folio" type="hidden" value="<? echo $_POST['folio']; ?>">
    <input name="participante" type="hidden" value="<? echo $_POST['participante']; ?>">
    <ol start="16">
      <li><b>¿Por cuál partido  político definitivamente NO votarías para Presidente de la República para el próximo año?</b><br>
        <div class="option"><input name="quest16" id="quest16_01" type="radio" value="PAN" /> PAN</div>
        <div class="option"><input name="quest16" id="quest16_02" type="radio" value="PRI" /> PRI</div>
        <div class="option"><input name="quest16" id="quest16_03" type="radio" value="PRD" /> PRD</div>
        <div class="option"><input name="quest16" id="quest16_04" type="radio" value="PT" /> PT</div>
        <div class="option"><input name="quest16" id="quest16_05" type="radio" value="PV" /> Partido Verde</div>
        <div class="option"><input name="quest16" id="quest16_06" type="radio" value="MC" /> Movimiento Ciudadano</div>
        <div class="option"><input name="quest16" id="quest16_07" type="radio" value="NA" /> Nueva Alianza</div>
        <div class="option"><input name="quest16" id="quest16_08" type="radio" value="MOR" /> MORENA</div>
        <div class="option"><input name="quest16" id="quest16_09" type="radio" value="Ind" /> Candidatos ndependientes</div>
        <div class="option"><input name="quest16" id="quest16_10" type="radio" value="PES" /> Encuentro Social</div>
        <div class="option"><input name="quest16" id="quest16_11" type="radio" value="Nin" /> Ninguno</div>
        <div style="clear:both"></div>
      </li>      
    </ol>
    <ol>      
      <li><b>¿Por cuál personaje político definitivamente NO votarías para Presidente de la República para el próximo año?</b><br>
        <div class="option"><input name="quest17" id="quest17_01" type="radio" value="AMLO" /> Andrés Manuel López Obrador</div>
        <div class="option"><input name="quest17" id="quest17_02" type="radio" value="MZGC" /> Margariza Zavala</div>
        <div class="option"><input name="quest17" id="quest17_03" type="radio" value="RAC" /> Ricardo Anaya</div>
        <div class="option"><input name="quest17" id="quest17_04" type="radio" value="MAME" /> Miguel Ángel Mancera</div>
        <div class="option"><input name="quest17" id="quest17_05" type="radio" value="JAMK" /> José Antonio Meade</div>
        <div class="option"><input name="quest17" id="quest17_06" type="radio" value="MOC" /> Miguel Ángel Osorio Chong</div>
        <div class="option"><input name="quest17" id="quest17_07" type="radio" value="JNR" /> José Narro Robles</div>
        <div class="option"><input name="quest17" id="quest17_08" type="radio" value="ANM" /> Aurelio Nuño</div>
        <div class="option"><input name="quest17" id="quest17_09" type="radio" value="ANM" /> Jaime Rodríguez "El Bronco"</div>
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
