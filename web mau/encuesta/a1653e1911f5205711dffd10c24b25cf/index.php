<html>
<head>
  <title>Haz clic, participa y gana recompensas</title>

  <!-- LINKS --->
  <link href="style.css" rel="stylesheet" type="text/css" />
  <link rel="icon" type="image/png" href="favicon.png">

  <!-- METADATOS --->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="keywords" content="Haz clic, participa y gana recompensas">
  <meta name="description" content="Regístrate para participar en nuestras encuestas y gana recompensas">
  <meta property="og:description" content="Regístrate para participar en nuestras encuestas y gana recompensa" />
  <meta property="og:url" content="http://www.demoexpertaria.info/encuesta/a1653e1911f5205711dffd10c24b25cf/index.php" />
  <meta property="og:type" content="website" />
  <meta property="og:image" content="http://demoexpertaria.info/encuesta/a1653e1911f5205711dffd10c24b25cf/img/gana.jpg" />
  <meta property="og:title" content="Haz clic, participa y gana recompensas" />
  
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
<div align="center">
  <img src="img/gana.jpg" style="width:100%; max-width:980px; margin:0px;">
  <div id="contenido">
    <h1>Haz clic, participa y gana recompensas</h1>
    <p>Expertaria te invita a participar en una serie de 3 encuestas que se realizarán con espacio de un mes entre una y otra. Para participar, estas son las:</p>
    <form action="registro.php" method="post">
      <input name="segmento" type="hidden" value="<? echo $_GET['src']; ?>">
      <input name="estado" type="hidden" value="<? echo $_GET['sta']; ?>">
      <div align="center" style="float:left; margin:15px;"><input name="register" type="submit" value="Quiero registrarme" class="button" /></div>
    </form>
    <form action="bases.php" method="post">
      <div align="center" style="float:left; margin:15px;"><input name="register" type="submit" value="Consultar bases" class="button" /></div>
    </form>
    
    <div style="clear:both"></div>
    
  </div>
  
  <? include('footer.php'); ?>
  
</div>
</body>
</html>