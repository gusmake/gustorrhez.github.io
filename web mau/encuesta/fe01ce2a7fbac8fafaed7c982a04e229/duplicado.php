<html>
<head>
  <title>Registro duplicado</title>

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
</head>

<body>
<div align="center">
  <img src="img/gana.jpg" style="width:100%; max-width:900px; margin:0px;">
  <div id="contenido">
    <h1>Registro duplicado</h1>
    <p>El número <b><? echo "(".substr($celular,0,2).") ".substr($celular,2,4)." - ".substr($celular,6,4); ?></b> ya estaba registrado, por lo que no puedes volver a participar con ese mismo número.</p>
    <p>Te recordamos que sólo se puede participar una vez por cada número de Whatsapp, y el mismo deberá ser un número real y con una cuenta activa, ya que en caso de resultar ganador del concurso, te contactaremos por esa vía para darte las intrucciones para recibir tu premio.</p>
  </div>
  
  <? include('footer.php'); ?>
  
</div>
</body>
</html>