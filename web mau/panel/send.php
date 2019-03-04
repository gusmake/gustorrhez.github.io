<?
  include ("tconnection.php");
  
  $Coneccion	= 	new TConeccion();
  $celular		=	$_POST['celular'];
  $celular		=	str_replace("+ 52","",$celular);
  $celular		=	str_replace("+52","",$celular);
  $celular		=	str_replace("+","",$celular);
  $celular		=	str_replace("-","",$celular);
  $celular		=	str_replace("(","",$celular);
  $celular		=	str_replace(")","",$celular);
  $celular		=	str_replace(" ","",$celular);
  $celular		=	str_replace(".","",$celular);
  $celular		=	str_replace(",","",$celular);
  $celular		=	str_replace(";","",$celular);
  $state		=	$_POST['state'];
  $origen		=	$_POST['origen'];
  $enlace		=	$_POST['enlace'];
  $ip			=	$_SERVER['REMOTE_ADDR'];
  
  if ($state != '') { 
    $sql = "INSERT INTO ayudasismo_registro (celular,state,id_origen,enlace,ip) VALUES ('$celular','$state','$origen','$enlace','$ip')";
	
	$Coneccion->Gestion($sql);
	
	//EMAIL
	$email_subject = "Nuevo registro de voluntario";
	$email_body = "<html><head><title>Contacto</title><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'></head><body>";
	$email_body .= "<h1>".substr($state,3,3)." (".substr($celular,0,2).") ".substr($celular,2,4)." - ".substr($celular,6,4)."</h1><br>";
	$email_body .= "Enlace: <strong>".$enlace."</strong><br>";
	$email_body .= "IP: <strong>".$_SERVER['REMOTE_ADDR']."</strong><br>";
	$email_body .= "</body></html>";
	
	$headers_1 = "Content-type: text/html\n";
	$headers_1 .= "From: MEXICO AYUDA <mauricio@expertaria.com.mx>\n";
	
	$email_to = "mauricio@expertaria.com.mx";
	
	mail($email_to, $email_subject, $email_body, $headers_1);
  }
?>
