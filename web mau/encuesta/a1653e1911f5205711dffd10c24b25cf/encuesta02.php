<?
  include ("tconnection.php");
  
  $folio		=	$_POST['folio'];
  $participante	=	$_POST['participante'];
  $quest01		=	$_POST['quest01'];
  $quest02		=	$_POST['quest02'];
  $quest03		=	$_POST['quest03'];
  $quest04		=	$_POST['quest04'];
  $quest05		=	$_POST['quest05'];
  $ip			=	$_SERVER['REMOTE_ADDR'];
  
  $Coneccion	=	new TConeccion();
  $sql = "INSERT INTO demo_encuesta (id_participante,quest01,quest02,quest03,quest04,quest05,ip) VALUES ('$participante','$quest01','$quest02','$quest03','$quest04','$quest05','$ip')";
  $Coneccion->Gestion($sql);
?>

<html>
<head>
  <title>Encuesta | Parte 2 de 4</title>

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

	if (document.getElementById('quest06_1').checked==false && document.getElementById('quest06_2').checked==false && document.getElementById('quest06_3').checked==false){
	  alert("Por favor, responde la pregunta número 6")
	  document.fvalida.quest06.focus()
	  return 0;
	}

	if (document.getElementById('quest07_1').checked==false && document.getElementById('quest07_2').checked==false && document.getElementById('quest07_3').checked==false){
	  alert("Por favor, responde la pregunta número 7")
	  document.fvalida.quest07.focus()
	  return 0;
	}

	if (document.getElementById('quest08_1').checked==false && document.getElementById('quest08_2').checked==false && document.getElementById('quest08_3').checked==false){
	  alert("Por favor, responde la pregunta número 8")
	  document.fvalida.quest08.focus()
	  return 0;
	}

	if (document.getElementById('quest09_1').checked==false && document.getElementById('quest09_2').checked==false && document.getElementById('quest09_3').checked==false){
	  alert("Por favor, responde la pregunta número 9")
	  document.fvalida.quest09.focus()
	  return 0;
	}

	if (document.getElementById('quest10_1').checked==false && document.getElementById('quest10_2').checked==false && document.getElementById('quest10_3').checked==false){
	  alert("Por favor, responde la pregunta número 10")
	  document.fvalida.quest10.focus()
	  return 0;
	}

	
	//el formulario se envia
	document.fvalida.submit();
  }
</script>
<div align="center">
  <div id="contenido">
    <h1>Encuesta</h1>
    <h2>Parte 2 de 4</h2>
    <img src="img/stage02.png" style="width:100%; max-width:880px; margin:0px;">
    <form action="encuesta03.php" method="post" enctype="multipart/form-data" name="fvalida">
    <input name="folio" type="hidden" value="<? echo $_POST['folio']; ?>">
    <input name="participante" type="hidden" value="<? echo $_POST['participante']; ?>">
    <ol start="6">      
      <li><b>¿Acostumbras escuchar noticieros en radio?</b><br>
        <div class="option"><input name="quest06" id="quest06_1" type="radio" value="Si" /> Sí</div>
        <div class="option"><input name="quest06" id="quest06_2" type="radio" value="No" /> No</div>
        <div class="option"><input name="quest06" id="quest06_3" type="radio" value="A veces" /> A veces</div>
        <div style="clear:both"></div>
      </li>
      
      <li><b>¿Acostumbras ver noticieros en televisión?</b><br>
        <div class="option"><input name="quest07" id="quest07_1" type="radio" value="Si" /> Sí</div>
        <div class="option"><input name="quest07" id="quest07_2" type="radio" value="No" /> No</div>
        <div class="option"><input name="quest07" id="quest07_3" type="radio" value="A veces" /> A veces</div>
        <div style="clear:both"></div>
      </li>
      
      <li><b>¿Acostumbras leer o ver noticias en internet y redes sociales?</b><br>
        <div class="option"><input name="quest08" id="quest08_1" type="radio" value="Si" /> Sí</div>
        <div class="option"><input name="quest08" id="quest08_2" type="radio" value="No" /> No</div>
        <div class="option"><input name="quest08" id="quest08_3" type="radio" value="A veces" /> A veces</div>
        <div style="clear:both"></div>
      </li>
      
      <li><b>¿Sigues en redes sociales a algún político o gobernante?</b><br>
        <div class="option"><input name="quest09" id="quest09_1" type="radio" value="Si" /> Sí</div>
        <div class="option"><input name="quest09" id="quest09_2" type="radio" value="No" /> No</div>
        <div class="option"><input name="quest09" id="quest09_3" type="radio" value="A veces" /> A veces</div>
        <div style="clear:both"></div>
      </li>
      
      <li><b>¿Qué tanto crees que influirá en tu voto lo que lees, ves o escuchas en las noticias sobre los candidatos?</b><br>
        <div class="option"><input name="quest10" id="quest10_1" type="radio" value="Mucho" /> Mucho</div>
        <div class="option"><input name="quest10" id="quest10_2" type="radio" value="Poco" /> Poco</div>
        <div class="option"><input name="quest10" id="quest10_3" type="radio" value="Nada" /> Nada</div>
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
