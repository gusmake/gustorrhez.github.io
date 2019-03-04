<?
 session_start();
 set_time_limit(0);
 error_reporting (E_ALL ^ E_NOTICE);
?>
<?
  $permiso = "INVITADO";
  include("access.php");
?>
<?
  include ("tconnection.php");
  $Coneccion = new TConeccion();
?>
<?
  if($_GET['start']){ $start = $_GET['start']; }else{ $start = 0; }
  if($_GET['show']){ $show = $_GET['show']; }else{ $show = 20; }
  
  if($_GET['sql_1']){ $sql_1 = str_replace("@", "'", $_GET['sql_1']); $sql_html_show = $_GET['sql_html_show']; }
  
  if(!$sql_1){

	$sql = "SELECT *";
	$sql .= " FROM exp_file";
	$sql_html_show = "";
	
	// Llenando el WHERE
	$sql .= " ORDER BY date DESC";
	$sql_1 = $sql;

  }
  
  $sql_2 = $sql_1." LIMIT $start, $show";
  
  $Coneccion->Gestion($sql_1);
  $cantidad = $Coneccion->C;
  
  $Coneccion->Gestion($sql_2);
  
  // Convertir las comillas simples para que se envie bien por pos
  $sql_1 = str_replace("'", "@", $sql_1);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>EXPERTARIA | Repositorio de archivos</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div align="center">
  <form action="" method="get" name="mostrar" id="mostrar">
  <img src="img/expertaria.png">
  <h1>Repositorio de episodios</h1>
  <? if ($_GET['msg']) { echo "<h2>".$_GET['msg']."</h2>"; } ?>
  <table>
  <tfoot>
    <tr>
      <td align="left">Desde <strong><? echo $start + 1; ?></strong> hasta <strong><? if($cantidad <= $start + $show){ echo $cantidad; }else{ echo $start + $show; } ?></strong> de <strong><? echo $cantidad; ?></strong> resultados 
        <input name="sql_1" type="hidden" id="sql_1" value="<? echo $sql_1; ?>">
        <input name="sql_html_show" type="hidden" id="sql_html_show" value="<? echo $sql_html_show; ?>">
        <input name="start" type="hidden" id="start" value="<? echo $start; ?>">
        Mostrar: <select name="show" id="show">
	    <? for($i = 10; $i <= 100; $i += 10){ ?>
          <option value="<? echo $i; ?>" <? if($show == $i){ echo ("selected"); } ?>><? echo $i; ?></option>
		<? } ?>
		<? for($i = 150; $i <= 500; $i += 50){ ?>
          <option value="<? echo $i; ?>" <? if($show == $i){ echo ("selected"); } ?>><? echo $i; ?></option>
		<? } ?>
        </select> resultados por p&aacute;gina
        <input name="Submit" type="submit" id="Submit" value="Mostrar">
      </td>
      <td align="right"><input name="Add" type="button" id="Add" value="Cargar archivo" class="button" onClick="javascript:location.href='file_add.php';"></td>
    </tr>
  </tfoot>
  </table>
  </form>
  
  <table>
  <thead>
    <tr>
      <th width="150">Fecha</th>
      <th>Archivo</th>
      <th>Tema</th>
      <th>Autor</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
  <? while($Rows = mysql_fetch_array($Coneccion->Query)){ ?>
  <tr>
	  <?
        $mes_in = substr($Rows['date'],5,2);
		switch ($mes_in) {
		  case "01":
		    $mes_txt = "Ene";
			break;
		  case "02":
		    $mes_txt = "Feb";
		    break;
		  case "03":
		    $mes_txt = "Mar";
		    break;
		  case "04":
		    $mes_txt = "Abr";
		    break;
		  case "05":
		    $mes_txt = "May";
		    break;
		  case "06":
		    $mes_txt = "Jun";
		    break;
		  case "07":
		    $mes_txt = "Jul";
		    break;
		  case "08":
		    $mes_txt = "Ago";
		    break;
		  case "09":
		    $mes_txt = "Sep";
		    break;
		  case "10":
		    $mes_txt = "Oct";
		    break;
		  case "11":
		    $mes_txt = "Nov";
		    break;
		  case "12":
		    $mes_txt = "Dic";
		    break;
		}
	?>
    <td align="center"><? echo substr($Rows['date'],8,2)."/".$mes_txt."/".substr($Rows['date'],0,4)." - ".substr($Rows['date'],11,2).":".substr($Rows['date'],14,2); ?> h</td>
    <? $filesize = $Rows['size']/1000000; ?>
    <td align="left"><a href="files/video/<? echo $Rows['filename']; ?>" target="_blank"><img src="img/video.png"> <? echo $Rows['filename']." (".number_format($filesize,1)." MB)"; ?></a></td>
    <!--<td><div align="center"><img src="img/tw.png"></div></td>-->
    <td><img src="img/pan.png"> <? echo utf8_encode($Rows['title']); ?></td>
    <td align="left"><? echo utf8_encode($Rows['id_autor']); ?></td>
    <td align="left">
    <input name="publish" type="button" id="publish" value="Publicar" onClick="javascript:window.confirmar('file_post.php?id=<? echo $Rows['id'] ?>','¿Publicar este contenido en redes?');">
    
    </td>
  </tr>
  <? } ?>
  </tbody>
</table>

<table>
<tfoot>
<tr>
  <td width="50%">
  <? if($start > 0){ ?>
  <form name="previews" method="get" action="">
    <input name="sql_1" type="hidden" id="sql_1" value="<? echo $sql_1; ?>">
    <input name="sql_html_show" type="hidden" id="sql_html_show" value="<? echo $sql_html_show; ?>">
    <input name="start" type="hidden" id="start" value="<? if($start - $show >= 0){ echo $start - $show; }else{ echo "0"; } ?>">
    <input name="show" type="hidden" id="show" value="<? echo $show; ?>">
    <input name="Submit" type="submit" value="&laquo; P&aacute;gina anterior">
  </form>
  <? } ?>
  </td>
  <td width="50%" align="right">
  <? if($Coneccion->C == $show){ ?>
  <form name="next" method="get" action="">
    <input name="sql_1" type="hidden" id="sql_1" value="<? echo $sql_1; ?>">
    <input name="sql_html_show" type="hidden" id="sql_html_show" value="<? echo $sql_html_show; ?>">
    <input name="start" type="hidden" id="start" value="<? echo $start + $show; ?>">
    <input name="show" type="hidden" id="show" value="<? echo $show; ?>">
    <input name="Submit" type="submit" value="Siguiente p&aacute;gina &raquo;">
  </form>
  <? } ?>
  </td>
</tr>
</tfoot>
</table>

<script>
  function confirmar(direccion, mensaje){
    if (confirm(mensaje)){
	  window.location.href = direccion;
	}
  }
</script>

</body>
</html>