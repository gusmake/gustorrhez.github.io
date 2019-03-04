<?
  session_start();
  set_time_limit(0);
  error_reporting (E_ALL ^ E_NOTICE);
?>
<?
  include ("tconnection.php");
  $Coneccion = new TConeccion();
?>
<?
  $sql = "SELECT *";
  $sql .= " FROM exp_users";
  $sql .= " WHERE user = '".$_POST['user']."' AND password LIKE '".$_POST['password']."'";
  $Coneccion->Gestion($sql);
  if($Coneccion->C == 1){
	$Rows = mysql_fetch_array($Coneccion->Query);
	$_SESSION['name'] = $Rows['name'];
	$_SESSION['user'] = $_POST['user'];
	$_SESSION['type'] = trim($Rows['type']);
	$_SESSION['corr'] = $Rows['email'];
	echo ("<script>location.href='reporte.php';</script>");	  
  }else{
	echo ("<script>location.href='index.php?user=".$_POST['user']."&msg=Usuario o clave incorrectos'</script>");	  
  }
?>