<html>
<head>
  <title>Registro</title>

  <!-- LINKS --->
  <link href="style.css" rel="stylesheet" type="text/css" />
  <link rel="icon" type="image/png" href="favicon.png">

  <!-- METADATOS --->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="keywords" content="¡Gana un pase dobe para ver Star Wars, The Last Jedi!">
  <meta name="description" content="¡Gana un pase dobe para ver Star Wars, The Last Jedi en Cinépolis VIP Mérida Altabrisa. Sólo necesitas registrarte y contestar la encuesta a continuación.">
  <meta property="og:description" content="¡Gana un pase dobe para ver Star Wars, The Last Jedi en Cinépolis VIP Mérida Altabrisa. Sólo necesitas registrarte y contestar la encuesta a continuación." />
  <meta property="og:url" content="http://demoexpertaria.info/encuesta/72e52e7b0ecf42320b8d74021cdf3568/" />
  <meta property="og:type" content="website" />
  <meta property="og:image" content="http://demoexpertaria.info/encuesta/72e52e7b0ecf42320b8d74021cdf3568/img/gana.jpg" />
  <meta property="og:title" content="¡Gana un pase dobe para ver Star Wars, The Last Jedi!" />
  
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

	if (document.getElementById('gender1').checked==false && document.getElementById('gender2').checked==false && document.getElementById('gender3').checked==false){
	  alert("Selecciona la opción que corresponda a tu género")
	  document.fvalida.gender.focus()
	  return 0;
	}

    if (document.fvalida.state.value.length==0){
	  alert("Selecciona un estado")
	  document.fvalida.state.focus()
	  return 0;
	}

    if (document.fvalida.celular.value.length==0){
	  alert("Tienes que escribir un número de Whatsapp")
	  document.fvalida.celular.focus()
	  return 0;
	}

    if (document.fvalida.email.value.length==0){
       alert("Escribe tu correo electrónico")
       document.fvalida.email.focus()
       return 0;
    }
		
    if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(document.fvalida.email.value))){
       alert("La dirección de correo electrónico es incorrecta");
       document.fvalida.email.focus();
       return;
    }

	if (document.getElementById('privacidad').checked==false){
	  alert("Debes aceptar los términos del aviso de privacidad")
	  document.fvalida.privacidad.focus()
	  return 0;
	}
	
	//el formulario se envia
	document.fvalida.submit();
  }
</script>
<div align="center">
  <img src="img/gana.jpg" style="width:100%; max-width:980px; margin:0px;">
  <div id="contenido">
    <p>¡Gana un pase dobe para ver <b>Star Wars, The Last Jedi</b> en Cinépolis VIP Mérida Altabrisa. Sólo necesitas registrarte y contestar la encuesta a continuación.</p>
    <h1>Registro</h1>
    <form action="encuesta01.php" method="post" enctype="multipart/form-data" name="fvalida">
    <ol>
      <input name="segmento" type="hidden" value="FB">
      <input name="estado" type="hidden" value="<? echo $_GET['sta']; ?>">

      <!-- CUANDO registro.php cambia a index.php
      <input name="segmento" type="hidden" value="<? echo $_POST['segmento']; ?>">
      <input name="estado" type="hidden" value="<? echo $_POST['estado']; ?>">
      -->
      <li><b>¿Cuándo naciste?</b><br>
      <select name="day"><? for ($i = 1; $i<=31; $i++) { ?><option value="<? echo $i ?>"><? if($i<10) { echo "0"; } ?><? echo $i ?></option><? } ?></select>
      <select name="month">
        <option value="01">Enero</option>
        <option value="02">Febrero</option>
        <option value="03">Marzo</option>
        <option value="04">Abril</option>
        <option value="05">Mayo</option>
        <option value="06">Junio</option>
        <option value="07">Julio</option>
        <option value="08">Agosto</option>
        <option value="09">Septiembre</option>
        <option value="10">Octubre</option>
        <option value="11">Noviembre</option>
        <option value="12">Diciembre</option>
      </select>
      <? $date_start = date("Y")-82; $date_finish = date("Y")-17; ?>
      <select name="year"><? for ($i = $date_start; $i<=$date_finish; $i++) { ?><option value="<? echo $i ?>" <? if ($i==1980) { echo "selected"; } ?>><? echo $i ?></option><? } ?></select>
      </li>
      <li><b>¿Cuál es tu género?:</b><br>
        <div class="option"><input name="gender" id="gender1" type="radio" value="F"> Femenino</div>
        <div class="option"><input name="gender" id="gender2" type="radio" value="M"> Masculino</div>
        <div class="option"><input name="gender" id="gender3" type="radio" value="I"> Prefiero no responder</div>
        <div style="clear:both"></div>
      </li>
      <input name="state" type="hidden" value="MX-YUC">      
      <li><b>¿Cuál es tu número de Whatsapp?</b> (10 dígitos)<br><input name="celular" type="text" placeholder="(00) 0000 - 0000" style="width:100%; max-width:300px;"></li>
      <li><b>¿Cuál es tu correo electrónico?</b><br><input name="email" type="text" placeholder="usuario@dominio.com" style="width:100%; max-width:300px;"></li>
      <p><input name="privacidad" type="checkbox" value="ok" id="privacidad"> He leído y acepto el <a href="aviso_privacidad.php">aviso de privacidad</a></p>
      <div align="center"><input type="button" value="Registrarme" onClick="valida_envia()" class="button"></div>
    </form>
  </div>
  
  <? include('footer.php'); ?>
  
</div>
</body>
</html>