<?
 set_time_limit(0);
 error_reporting (E_ALL ^ E_NOTICE);
?>
<?
  session_start();
  if(isset($_SESSION['user'])){
    unset($_SESSION['name']);
	unset($_SESSION['user']);
	unset($_SESSION['type']);
	echo ("<script>location.href='index.php?msg=Usted ha salido correctamente';</script>");	  
  }
?>