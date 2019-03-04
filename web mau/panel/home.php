<?
 session_start();
 set_time_limit(0);
 error_reporting (E_ALL ^ E_NOTICE);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<title>EXPERTARIA | Página de inicio</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div align="center">
 <img src="img/expertaria.png">
 <? if($_SESSION['type'] == "EDITOR"){ ?>
  <fieldset style="width:90%;">
   <legend>M&oacute;dulos</legend>
   <div id="home"><a href="file_add.php" class="home"><img src="img/noticias.png" alt="Cargar archivos" border="0"><br>Cargar</a></div>
   <!--
   <div id="home"><a href="#" class="home"><img src="images/musica.png" alt="Música" border="0"><br>Música</a></div>
   <div id="home"><a href="#" class="home"><img src="images/videos.png" alt="Videos" border="0"><br>Videos</a></div>
   <div id="home"><a href="#" class="home"><img src="images/fotos.png" alt="Fotos" border="0"><br>Fotos</a></div>
   <div id="home"><a href="eventos_list.php" class="home"><img src="images/eventos.png" alt="Eventos" border="0"><br>Eventos</a></div>
   -->
  </fieldset>
 <? } ?>
</div>
</body>
</html>