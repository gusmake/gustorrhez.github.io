<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<title>EXPERTARIA | Publicar en redes</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div align="center">
  <img src="img/expertaria.png">
  <form action="file_send.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table align="center">
  <thead>
  <tr>
    <th colspan="2">Publicar en redes</th>
  </tr>
  </thead>
  <tfoot>
    <tr>
      <td>&nbsp;</td>
      <td><div align="left"><input name="upload" type="submit" value="Subir archivo" class="button"><input name="publish" type="button" id="publish" value="Publicar" onClick="javascript:window.open('https://www.facebook.com/bookmarks/pages?ref_type=logout_gear','_blank');"></div></td>
    </tr>
  </tfoot>
  <tbody>
    <tr>
      <td><div align="right">Fecha:</div></td>
      <? $hora = date('H')+2; ?>
      <td><b style="color:#0094A8;"><? echo date('d')."/".date('M')."/".date('Y')." - ".$hora.":".date('i')." horas"; ?></b></td>
    </tr>
    <tr>
      <td><div align="right">Título:</div></td>
      <td><input name="title" type="text" id="title" size="42" /></td>
    </tr>
    <tr>
      <td><div align="right">Autor:</div></td>
      <td><select name="id_autor">
        <option value="1">Hervey Espinosa</option>
        <option value="2">Rosario Buendìa</option>
        <option value="3">Yamín Marín</option>
      </select></td>
    </tr>
    <tr>
      <td><div align="right">Etiquetas:</div></td>
      <td>
        <input name="tag" type="checkbox" value="01" />AMLO<br>
        <input name="tag" type="checkbox" value="02" />JVM<br>
        <input name="tag" type="checkbox" value="03" />DGA<br>
      </td>      
    </tr>
    <tr>
      <td><div align="right">Archivo:</div></td>
      <td><input type="file" name="filename" id="filename"></td>
    </tr>
    
    <!--
    <tr>
      <td>Mensaje</td>
      <td>
        <textarea id="textarea" name="text" maxlength="140" cols="40" rows="3"></textarea><br>
        Quedan <span id="count"></span> caracteres
      </td>
      <script>
	    var el_t = document.getElementById('textarea');
		var length = el_t.getAttribute("maxlength");
		var el_c = document.getElementById('count');
		el_c.innerHTML = length;
		el_t.onkeyup = function () {
		  document.getElementById('count').innerHTML = (length - this.value.length);
		};
	  </script>
    </tr>
    -->
    
    
    
  </tbody>
  </table>
  </form>
</div>
</body>
</html>
