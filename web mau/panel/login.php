<?
 session_start();
 set_time_limit(0);
 error_reporting (E_ALL ^ E_NOTICE);
?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<title>EXPERTARIA | Control panel</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div align="center">
  <img src="img/expertaria.png">
  <fieldset style="max-width:600px;">
  <legend class="title">ACCESO</legend>
  <? if ($_GET['msg']) { echo "<h2>".$_GET['msg']."</h2>"; } ?>
  <form name="access" method="post" action="logon.php">
  <table>
    <thead>
    <tr>
      <th colspan="2" align="center">Ingreso</th>
    </tr>
    </thead>
    <tbody>
    <tr>
      <td align="right">Usuario:</td>
      <td><input name="user" type="text" value="<? echo $_GET['user']; ?>"></td>
    </tr>
    <tr>
      <td align="right">Contrase&ntilde;a:</td>
      <td><input name="password" type="password"></td>
    </tr>
    </tbody>
  </table>
  <input type="submit" name="Submit" value="Ingresar" class="button">
  </form>
  </fieldset>
</div>
</body>
</html>