<!doctype html>
<html>

<head>
  <meta name="google-site-verification" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="keywords" content="monitoreo, redes sociales, analítica, sysomos, digital, social media">
  <meta name="description" content="">
  <meta property="og:description" content="" />
  <meta property="og:url" content="http://www.expertaria.com.mx/" />
  <meta property="og:type" content="website" />
  <meta property="og:image" content="http://www.expertaria.com.mx/img/og_image.png" />
  <meta property="og:title" content="EXPERTARIA | Monitoreo en tiempo real de Redes Sociales" />
  <title>EXPERTARIA | Monitoreo</title>
  <link rel="icon" type="image/png" href="favicon.png">
  <link href="css/style.css" rel="stylesheet" type="text/css">
  <script src="http://code.jquery.com/jquery-latest.js"></script>

  <script type="text/javascript">
    $(document).on("scroll",function(){
	  if($(document).scrollTop()>120){
	    $("header").removeClass("large").addClass("small");
	  } else{
	    $("header").removeClass("small").addClass("large");
	  }
    });
  </script>

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
	
	<? include('header.php'); ?>
	
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
	
	<div id="box_text">
		<div align="center">
			<div class="content_img" style="background:url(img/monitoreo.jpg) 50% 50%; background-size:cover;);"></div>
			<div class="content_txt">
				<h1>Monitoreo</h1>
				<p>Monitoreamos tus mensajes y escuchamos toda la conversación de tu entorno.</p>
				<ul>
					<li>Listening 24/7</li>
					<li>Generación de alertas y focos rojos</li>
					<li>Seguimiento de coyuntura informativa</li>
					<li>Detección de áreas de oportunidad</li>
				</ul>
				<h3>Facebook</h3>
				<p>Monitoreamos cada hora las menciones hechas por personas o en páginas de fans, así como las fotos y videos que se relacionen con los temas de búsqueda que te interesa escuchar.</p>
				<h3>Twitter</h3>
				<p>Monitoreo en tiempo real. En cuanto se detecta un evento relevante que influya en los temas que se monitorean, se genera una alerta vía mail y WhatsApp.</p>
			</div>
		</div>
		<div style="clear: both;"></div>
	</div>

	<? include('slider.php'); ?>
	
	<? include('footer.php'); ?>

</body>
</html>