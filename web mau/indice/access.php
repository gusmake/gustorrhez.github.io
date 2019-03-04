<?
if(($_SESSION['type'] != $permiso) AND ($_SESSION['type'] != "EDITOR")){
?>
<div align="center">
  <p><strong>Acceso denegado...</strong></p>
  <p><input name="cancel" type="button" id="cancel" value="Index" onClick="javascript:location.href='index.php';"></p>
</div>
<?
  die();
  }
?>