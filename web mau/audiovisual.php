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
  <meta property="og:title" content="EXPERTARIA | Producción Audiovisual" />
  <title>EXPERTARIA | Producción Audiovisual</title>
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
			<div class="content_img" style="background:url(img/audiovisual.jpg) 50% 50%; background-size:cover;);"></div>
			<div class="content_txt">
				<h1>Audiovisual</h1>
				<p>Producimos contenidos audiovisuales para redes sociales, en formto de imagen fija o en videos.</p>
				<ul>
					<li>Infografías</li>
					<li>Clips de video</li>
					<li>Animaciones en 3D</li>
				</ul>
				<h3>Streaming</h3>
				<p>Contamos con equipo para hacer transmisiones en vivo a través de redes sociales, tanto en nuestro foro <em>green screen</em> (Tricaster) como en locaciones dentro de la CDMX (LiveU).</p>
				
				<iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2Fdebatesciudadanos%2Fvideos%2F458468531272207%2F&show_text=1" width="100%" style="border:none;overflow:hidden; background:rgba(255,255,255,0.75); height:580px;" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media" allowFullScreen="true"></iframe>
				
			</div>
		</div>
		<div style="clear: both;"></div>
	</div>

	<? include('slider.php'); ?>
	<? include('footer.php'); ?>

</body>
</html>