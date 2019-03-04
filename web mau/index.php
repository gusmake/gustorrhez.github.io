<!doctype html>
<html>

<head>
  <meta name="google-site-verification" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="keywords" content="monotoreo, redes sociales, analítica, sysomos, digital, social media">
  <meta name="description" content="">
  <meta property="og:description" content="" />
  <meta property="og:url" content="http://www.expertaria.com.mx/" />
  <meta property="og:type" content="website" />
  <meta property="og:image" content="http://www.expertaria.com.mx/img/og_image.png" />
  <meta property="og:title" content="EXPERTARIA | Monitoreo, análisis y estrategias de comunicación en redes sociales" />
  <title>EXPERTARIA | Monitoreo, análisis y estrategias de comunicación en redes sociales</title>
  <link rel="icon" type="image/png" href="favicon.png">
  <link href="css/style.css" rel="stylesheet" type="text/css">
  <script src="http://code.jquery.com/jquery-latest.js"></script>

  <script type="text/javascript">
    $(document).on("scroll",function(){
	  if($(document).scrollTop()>360){
	    $("header").removeClass("large").addClass("small");
	  } else{
	    $("header").removeClass("small").addClass("large");
	  }
    });
  </script>

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
		
	<header class="large">
		<nav align="center">
			<div style="width:282px; height:70px; float:left;"></div>
			<ul class="topnav">
				<li><a class="active" href="index.php">Inicio</a></li>
				<li><a href="somos.php">Somos</a></li>
				<li><a href="monitoreo.php">Monitoreo</a></li>
				<li><a href="analisis.php">Análisis</a></li>
				<li><a href="audiovisual.php">Audiovisual</a></li>
				<li><a href="foros.php">Renta de foros</a></li>
				<li><a href="contacto.php">Contacto</a></li>
				<li class="icon"><a href="javascript:void(0);" style="font-size:15px;" onClick="myFunction()">&#9776;</a></li>
			</ul>
		</nav>
	</header>
	
	<script>
		function myFunction() {
			document.getElementsByClassName("topnav")[0].classList.toggle("responsive");
		}
	</script>

	
	<div id="box_video" align="center">
		<video autoplay="autoplay" loop="loop" width="100%">
			<!--<source src="video/background01.mp4" type='video/mp4; codecs="amp4v.20.8, mp4a.40.2"'>-->
			<source src="video/particles.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
			<!--<source src="video/loop.webm" type='video/webm; codecs="vp8.0, vorbis"'>-->
		</video>
	</div>
  
	<div id="box_text" style="background:url(img/bk_txt.png) bottom right no-repeat fixed;">
		<div align="center">
			<img src="img/expertaria.png" title="Expertaria" alt="Expertaria" style="width:90%; max-width:400px;">
			<p>Monitoreo, análisis y estrategias de comunicación en redes sociales</p>
			<!--<a href="#quote1"><div id="scrolldown"></div></a>-->
		</div>
	</div>
	
	<? include('slider.php') ?>
	<? include('footer.php') ?>

</body>
</html>