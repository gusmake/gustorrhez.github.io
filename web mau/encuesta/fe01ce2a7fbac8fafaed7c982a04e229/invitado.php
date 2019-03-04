<html>
<head>
  <title>Login</title>

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

    if (document.fvalida.celular.value.length==0){
	  alert("Tienes que escribir un número de Whatsapp")
	  document.fvalida.celular.focus()
	  return 0;
	}
	
	//el formulario se envia
	document.fvalida.submit();
  }
</script>
<div align="center">
  <div id="contenido">
    <img src="img/registro.png" style="float:left;">
    <h1>Ingresar</h1>
    <form action="encuesta.php" method="post" enctype="multipart/form-data" name="fvalida">
    <ol>
      <input name="segmento" type="hidden" value="1">
      <input name="estado" type="hidden" value="MEX">
      <li><b>¿Cuál es tu número de Whatsapp?</b> (10 dígitos)<br><input name="celular" type="text" placeholder="(00) 0000 - 0000" style="width:100%; max-width:300px;"></li>
      <div align="center"><input type="button" value="Ingresar" onClick="valida_envia()" class="button"></div>
    </ol>
    </form>
  </div>
  
  <? include('footer.php'); ?>
  
</div>
</body>
</html>