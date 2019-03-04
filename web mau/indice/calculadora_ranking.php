<?
  include ("tconnection.php");
  
  $coneccion = new TConeccion();
  $consulta  = "SELECT * FROM exp_indice";
  $coneccion->Gestion($consulta);
  while($data = mysql_fetch_array($coneccion->Query)){
    $indice		=	0;
	$fecha_post	=	substr($data['date'],0,10);
	
	$coneccion2 = new TConeccion();
	$consulta2  = "SELECT * FROM exp_fanpages WHERE date = '".$fecha_post."' AND fanpage = '".$data['fanpage']."'";
	$coneccion2->Gestion($consulta2);
	$fans = mysql_fetch_array($coneccion2->Query);
	$indice = (($data['impr_total']/(1+$data['impr_paid']))/($data['reach_total']/(1+$data['reach_paid']))*(($data['share']*30)+($data['like']*10)+($data['comment']*20)))/($fans['fans']);
	
	$coneccion3 = new TConeccion();
	$sql = "INSERT INTO exp_indice_resultados (id_post,indice) VALUES ('".$data['id']."','$indice')";
	$coneccion3->Gestion($sql);
  }
  
  //echo ("<script>location.href='index.php?msg=El nuevo contenido ha sido publicado';</script>");
?>