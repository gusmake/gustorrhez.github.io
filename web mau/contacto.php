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
  <meta property="og:title" content="EXPERTARIA | Contacto" />
  <title>EXPERTARIA | Contacto</title>
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
			<div class="content_img" style="background:url(img/analisis.jpg) 50% 50%; background-size:cover;"></div>
			<div class="content_txt">
				<h1>Contacto</h1>
				<p>Mártires de la Conquista No. 99, Col. Escandón<br>Miguel Hidalgo CP 11800 Ciudad de México<br>Tel. (55) 7826-4402 y (55) 6391-6767<br>ricardo@expertaria.com.mx</p>
				<p><a href="http://fb.me/expertaria" target="_blank">fb.mx/expertaria</a></p>

				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3763.275549619612!2d-99.18228979999999!3d19.4004968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1ff44e3120c83%3A0x7c8a106136a1f598!2sExpertaria!5e0!3m2!1ses!2smx!4v1546900164418" width="100%" height="450" frameborder="0" style="border:rgba(255,255,255,0.85) solid 3px; border-radius:10px;" allowfullscreen></iframe>
				
			</div>
		</div>
		<div style="clear: both;"></div>
	</div>

	<? include('slider.php'); ?>
	<? include('footer.php'); ?>

</body>
</html>