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
  <meta property="og:title" content="EXPERTARIA | Quiénes somos" />
  <title>EXPERTARIA | Quiénes somos</title>
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
			<div class="content_img" style="background:url(img/somos.jpg) 50% 50%; background-size:cover;);"></div>
			<div class="content_txt">
				<h1>Somos</h1>
				<p>Equipo especializado en medios tradicionales, plataformas digitales y redes sociales.</p>
				<p>A través del análisis, monitoreo y la estrategia, creamos un ecosistema sólido para comunicar.</p>
				<p>Contamos con capacidad para monitorear en tiempo real lo que ocurre en las Redes Sociales, generar análisis sobte las conversaciones en esos medios, así como para generar contenidos audiovisuales optimizados para plataformas digitales.</p>
			</div>
		</div>
		<div style="clear: both;"></div>
	</div>

	<? include('slider.php'); ?>
	<? include('footer.php'); ?>

</body>
</html>