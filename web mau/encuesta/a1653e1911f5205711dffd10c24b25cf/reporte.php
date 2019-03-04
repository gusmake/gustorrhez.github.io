<?
 session_start();
 set_time_limit(0);
 error_reporting (E_ALL ^ E_NOTICE);
?>
<? include ("tconnection.php"); ?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Demo Expetaria | Resumen Ejecutivo</title>
  <link href="../encuesta/style.css" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script type="text/javascript">google.load('visualization', '1', {packages: ['corechart']});</script>
  
  <!--PERFIL DE LOS ENCUESTADOS-->
	<?
	  $f18a24 = 0;
	  $f25a34 = 0;
	  $f35a44 = 0;
	  $f45a54 = 0;
	  $f55a64 = 0;
	  $f65mas = 0;
	  $m18a24 = 0;
	  $m25a34 = 0;
	  $m35a44 = 0;
	  $m45a54 = 0;
	  $m55a64 = 0;
	  $m65mas = 0;
	  $graph = new TConeccion();
	  
	  $consulta  = "SELECT * FROM demo_registro WHERE birthdate <= '2000-12-31' AND birthdate >= '1993-01-01' AND gender = 'F'";
	  $graph->Gestion($consulta);
	  while($data = mysql_fetch_array($graph->Query)) { $f18a24++; }
	  $consulta  = "SELECT * FROM demo_registro WHERE birthdate <= '2000-12-31' AND birthdate >= '1993-01-01' AND gender = 'M'";
	  $graph->Gestion($consulta);
	  while($data = mysql_fetch_array($graph->Query)) { $m18a24++; }

	  $consulta  = "SELECT * FROM demo_registro WHERE birthdate <= '1992-12-31' AND birthdate >= '1983-01-01' AND gender = 'F'";
	  $graph->Gestion($consulta);
	  while($data = mysql_fetch_array($graph->Query)) { $f25a34++; }
	  $consulta  = "SELECT * FROM demo_registro WHERE birthdate <= '1992-12-31' AND birthdate >= '1983-01-01' AND gender = 'M'";
	  $graph->Gestion($consulta);
	  while($data = mysql_fetch_array($graph->Query)) { $m25a34++; }

	  $consulta  = "SELECT * FROM demo_registro WHERE birthdate <= '1982-12-31' AND birthdate >= '1973-01-01' AND gender = 'F'";
	  $graph->Gestion($consulta);
	  while($data = mysql_fetch_array($graph->Query)) { $f35a44++; }
	  $consulta  = "SELECT * FROM demo_registro WHERE birthdate <= '1982-12-31' AND birthdate >= '1973-01-01' AND gender = 'M'";
	  $graph->Gestion($consulta);
	  while($data = mysql_fetch_array($graph->Query)) { $m35a44++; }

	  $consulta  = "SELECT * FROM demo_registro WHERE birthdate <= '1972-12-31' AND birthdate >= '1963-01-01' AND gender = 'F'";
	  $graph->Gestion($consulta);
	  while($data = mysql_fetch_array($graph->Query)) { $f45a54++; }
	  $consulta  = "SELECT * FROM demo_registro WHERE birthdate <= '1972-12-31' AND birthdate >= '1963-01-01' AND gender = 'M'";
	  $graph->Gestion($consulta);
	  while($data = mysql_fetch_array($graph->Query)) { $m45a54++; }

	  $consulta  = "SELECT * FROM demo_registro WHERE birthdate <= '1962-12-31' AND birthdate >= '1953-01-01' AND gender = 'F'";
	  $graph->Gestion($consulta);
	  while($data = mysql_fetch_array($graph->Query)) { $f55a64++; }
	  $consulta  = "SELECT * FROM demo_registro WHERE birthdate <= '1962-12-31' AND birthdate >= '1953-01-01' AND gender = 'M'";
	  $graph->Gestion($consulta);
	  while($data = mysql_fetch_array($graph->Query)) { $m55a64++; }

	  $consulta  = "SELECT * FROM demo_registro WHERE birthdate <= '1952-12-31' AND birthdate >= '1900-01-01' AND gender = 'F'";
	  $graph->Gestion($consulta);
	  while($data = mysql_fetch_array($graph->Query)) { $f65mas++; }
	  $consulta  = "SELECT * FROM demo_registro WHERE birthdate <= '1952-12-31' AND birthdate >= '1900-01-01' AND gender = 'M'";
	  $graph->Gestion($consulta);
	  while($data = mysql_fetch_array($graph->Query)) { $m65mas++; }
	  
	  $mujeres = $f18a24+$f25a34+$f35a44+$f45a54+$f55a64+$f65mas;
	  $hombres = $m18a24+$m25a34+$m35a44+$m45a54+$m55a64+$m65mas;
	  $totalhm = $mujeres+$hombres;
?>
<script type="text/javascript">
  function drawVisualization() {
  // Some raw data (not necessarily accurate)
    var data = google.visualization.arrayToDataTable([
	  ['Mes', 'Mujeres', 'Hombres'],
	  ['18 a 24',  <? echo $f18a24; ?>,	<? echo $m18a24; ?>],
	  ['25 a 34',  <? echo $f25a34; ?>,	<? echo $m25a34; ?>],
	  ['35 a 44',  <? echo $f35a44; ?>,	<? echo $m35a44; ?>],
	  ['45 a 54',  <? echo $f45a54; ?>,	<? echo $m45a54; ?>],
	  ['55 a 64',  <? echo $f55a64; ?>,	<? echo $m55a64; ?>],
	  ['65 o +',  <? echo $f65mas; ?>,	<? echo $m65mas; ?>],
    ]);
	
	var view = new google.visualization.DataView(data);
	view.setColumns([0, 1, 2,
	  { calc: "stringify",
	    sourceColumn: 1,
		type: "string",
		role: "annotation" },
	]);

	var options = {
	  title : 'Encuestados por edad-sexo',
	  fontSize:11,
	  legendfontSize:11,
	  titleFontSize:15,
	  hAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
	  vAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
	  colors:['#FF9900','#DD7700'],
	  bar: {groupWidth: "90%"},
	  legend: { position: 'bottom', maxLines: 3 },
	  seriesType: "bars",
	};
	
	var chart = new google.visualization.ComboChart(document.getElementById('chart_div08'));
	chart.draw(data, options);
  }
  google.setOnLoadCallback(drawVisualization);
</script>
<!--FIN PERFIL DE LOS ENCUESTADOS-->


<!-- PREGUNTA 01 --->
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
	  ["Element", "Respuestas", { role: "style" } ],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest01 = 'Mucho'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["Mucho", <? echo $suma; ?>, "#FF9900"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest01 = 'Poco'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["Poco", <? echo $suma; ?>, "#DD7700"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest01 = 'Nada'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["Nada", <? echo $suma; ?>, "#BB5500"],
	  ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
	    { calc: "stringify",
		  sourceColumn: 1,
		  type: "string",
		  role: "annotation" },
      2]);

      var options = {
		fontSize:12,
		legendfontSize:12,
		titleFontSize:15,
		hAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		vAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		legend: { position: 'none', maxLines: 3 },
		bar: {groupWidth: "85%"},
		seriesType: "bars",
		series: {1: {type: "line",lineWidth: 5, pointSize: 8}}
      };

      var chart = new google.visualization.ColumnChart(document.getElementById("pregunta01"));
      chart.draw(view, options);
  }
</script>
<!-- FIN PREGUNTA 01 -->

<!-- PREGUNTA 02 --->
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
	  ["Element", "Respuestas", { role: "style" } ],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest02 = 'Si'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["Sí", <? echo $suma; ?>, "#FF9900"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest02 = 'No'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["No", <? echo $suma; ?>, "#DD7700"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest02 = 'A veces'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["A veces", <? echo $suma; ?>, "#BB5500"],
	  ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
	    { calc: "stringify",
		  sourceColumn: 1,
		  type: "string",
		  role: "annotation" },
      2]);

      var options = {
		fontSize:12,
		legendfontSize:12,
		titleFontSize:15,
		hAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		vAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		legend: { position: 'none', maxLines: 3 },
		bar: {groupWidth: "85%"},
		seriesType: "bars",
		series: {1: {type: "line",lineWidth: 5, pointSize: 8}}
      };

      var chart = new google.visualization.ColumnChart(document.getElementById("pregunta02"));
      chart.draw(view, options);
  }
</script>
<!-- FIN PREGUNTA 02 -->

<!-- PREGUNTA 03 --->
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
	  ["Element", "Respuestas", { role: "style" } ],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest03 = 'Si'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["Sí", <? echo $suma; ?>, "#FF9900"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest03 = 'No'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["No", <? echo $suma; ?>, "#DD7700"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest03 = 'A veces'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["A veces", <? echo $suma; ?>, "#BB5500"],
	  ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
	    { calc: "stringify",
		  sourceColumn: 1,
		  type: "string",
		  role: "annotation" },
      2]);

      var options = {
		fontSize:12,
		legendfontSize:12,
		titleFontSize:15,
		hAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		vAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		legend: { position: 'none', maxLines: 3 },
		bar: {groupWidth: "85%"},
		seriesType: "bars",
		series: {1: {type: "line",lineWidth: 5, pointSize: 8}}
      };

      var chart = new google.visualization.ColumnChart(document.getElementById("pregunta03"));
      chart.draw(view, options);
  }
</script>
<!-- FIN PREGUNTA 03 -->

<!-- PREGUNTA 04 --->
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
	  ["Element", "Respuestas", { role: "style" } ],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest04 = 'Si'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["Sí", <? echo $suma; ?>, "#FF9900"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest04 = 'No'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["No", <? echo $suma; ?>, "#DD7700"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest04 = 'A veces'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["A veces", <? echo $suma; ?>, "#BB5500"],
	  ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
	    { calc: "stringify",
		  sourceColumn: 1,
		  type: "string",
		  role: "annotation" },
      2]);

      var options = {
		fontSize:12,
		legendfontSize:12,
		titleFontSize:15,
		hAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		vAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		legend: { position: 'none', maxLines: 3 },
		bar: {groupWidth: "85%"},
		seriesType: "bars",
		series: {1: {type: "line",lineWidth: 5, pointSize: 8}}
      };

      var chart = new google.visualization.ColumnChart(document.getElementById("pregunta04"));
      chart.draw(view, options);
  }
</script>
<!-- FIN PREGUNTA 04 -->

<!-- PREGUNTA 05 --->
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
	  ["Element", "Respuestas", { role: "style" } ],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest05 = 'Mucho'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["Mucho", <? echo $suma; ?>, "#FF9900"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest05 = 'Poco'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["Poco", <? echo $suma; ?>, "#DD7700"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest05 = 'Nada'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["Nada", <? echo $suma; ?>, "#BB5500"],
	  ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
	    { calc: "stringify",
		  sourceColumn: 1,
		  type: "string",
		  role: "annotation" },
      2]);

      var options = {
		fontSize:12,
		legendfontSize:12,
		titleFontSize:15,
		hAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		vAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		legend: { position: 'none', maxLines: 3 },
		bar: {groupWidth: "85%"},
		seriesType: "bars",
		series: {1: {type: "line",lineWidth: 5, pointSize: 8}}
      };

      var chart = new google.visualization.ColumnChart(document.getElementById("pregunta05"));
      chart.draw(view, options);
  }
</script>
<!-- FIN PREGUNTA 05 -->

<!-- PREGUNTA 06 --->
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
	  ["Element", "Respuestas", { role: "style" } ],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest06 = 'Si'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["Sí", <? echo $suma; ?>, "#FF9900"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest06 = 'No'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["No", <? echo $suma; ?>, "#DD7700"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest06 = 'A veces'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["A veces", <? echo $suma; ?>, "#BB5500"],
	  ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
	    { calc: "stringify",
		  sourceColumn: 1,
		  type: "string",
		  role: "annotation" },
      2]);

      var options = {
		fontSize:12,
		legendfontSize:12,
		titleFontSize:15,
		hAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		vAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		legend: { position: 'none', maxLines: 3 },
		bar: {groupWidth: "85%"},
		seriesType: "bars",
		series: {1: {type: "line",lineWidth: 5, pointSize: 8}}
      };

      var chart = new google.visualization.ColumnChart(document.getElementById("pregunta06"));
      chart.draw(view, options);
  }
</script>
<!-- FIN PREGUNTA 06 -->

<!-- PREGUNTA 07 --->
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
	  ["Element", "Respuestas", { role: "style" } ],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest07 = 'Si'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["Sí", <? echo $suma; ?>, "#FF9900"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest07 = 'No'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["No", <? echo $suma; ?>, "#DD7700"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest07 = 'A veces'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["A veces", <? echo $suma; ?>, "#BB5500"],
	  ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
	    { calc: "stringify",
		  sourceColumn: 1,
		  type: "string",
		  role: "annotation" },
      2]);

      var options = {
		fontSize:12,
		legendfontSize:12,
		titleFontSize:15,
		hAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		vAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		legend: { position: 'none', maxLines: 3 },
		bar: {groupWidth: "85%"},
		seriesType: "bars",
		series: {1: {type: "line",lineWidth: 5, pointSize: 8}}
      };

      var chart = new google.visualization.ColumnChart(document.getElementById("pregunta07"));
      chart.draw(view, options);
  }
</script>
<!-- FIN PREGUNTA 07 -->

<!-- PREGUNTA 08 --->
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
	  ["Element", "Respuestas", { role: "style" } ],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest08 = 'Si'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["Sí", <? echo $suma; ?>, "#FF9900"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest08 = 'No'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["No", <? echo $suma; ?>, "#DD7700"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest08 = 'A veces'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["A veces", <? echo $suma; ?>, "#BB5500"],
	  ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
	    { calc: "stringify",
		  sourceColumn: 1,
		  type: "string",
		  role: "annotation" },
      2]);

      var options = {
		fontSize:12,
		legendfontSize:12,
		titleFontSize:15,
		hAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		vAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		legend: { position: 'none', maxLines: 3 },
		bar: {groupWidth: "85%"},
		seriesType: "bars",
		series: {1: {type: "line",lineWidth: 5, pointSize: 8}}
      };

      var chart = new google.visualization.ColumnChart(document.getElementById("pregunta08"));
      chart.draw(view, options);
  }
</script>
<!-- FIN PREGUNTA 08 -->

<!-- PREGUNTA 09 --->
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
	  ["Element", "Respuestas", { role: "style" } ],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest09 = 'Si'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["Sí", <? echo $suma; ?>, "#FF9900"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest09 = 'No'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["No", <? echo $suma; ?>, "#DD7700"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest09 = 'A veces'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["A veces", <? echo $suma; ?>, "#BB5500"],
	  ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
	    { calc: "stringify",
		  sourceColumn: 1,
		  type: "string",
		  role: "annotation" },
      2]);

      var options = {
		fontSize:12,
		legendfontSize:12,
		titleFontSize:15,
		hAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		vAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		legend: { position: 'none', maxLines: 3 },
		bar: {groupWidth: "85%"},
		seriesType: "bars",
		series: {1: {type: "line",lineWidth: 5, pointSize: 8}}
      };

      var chart = new google.visualization.ColumnChart(document.getElementById("pregunta09"));
      chart.draw(view, options);
  }
</script>
<!-- FIN PREGUNTA 09 -->

<!-- PREGUNTA 10 --->
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
	  ["Element", "Respuestas", { role: "style" } ],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest10 = 'Mucho'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["Mucho", <? echo $suma; ?>, "#FF9900"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest10 = 'Poco'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["Poco", <? echo $suma; ?>, "#DD7700"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest10 = 'Nada'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["Nada", <? echo $suma; ?>, "#BB5500"],
	  ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
	    { calc: "stringify",
		  sourceColumn: 1,
		  type: "string",
		  role: "annotation" },
      2]);

      var options = {
		fontSize:12,
		legendfontSize:12,
		titleFontSize:15,
		hAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		vAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		legend: { position: 'none', maxLines: 3 },
		bar: {groupWidth: "85%"},
		seriesType: "bars",
		series: {1: {type: "line",lineWidth: 5, pointSize: 8}}
      };

      var chart = new google.visualization.ColumnChart(document.getElementById("pregunta10"));
      chart.draw(view, options);
  }
</script>
<!-- FIN PREGUNTA 10 -->

<!-- PREGUNTA 11 --->
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
	  ["Element", "Respuestas", { role: "style" } ],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest11 = 'Tranquilo'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["Tranquilo", <? echo $suma; ?>, "#FFBB00"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest11 = 'Confiado'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["Confiado", <? echo $suma; ?>, "#FF9900"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest11 = 'Enojado'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["Enojado", <? echo $suma; ?>, "#DD7700"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest11 = 'Asioso'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["Asioso", <? echo $suma; ?>, "#BB5500"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest11 = 'No sé'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["No sé", <? echo $suma; ?>, "#771100"],
	  ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
	    { calc: "stringify",
		  sourceColumn: 1,
		  type: "string",
		  role: "annotation" },
      2]);

      var options = {
		fontSize:12,
		legendfontSize:12,
		titleFontSize:15,
		hAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		vAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		legend: { position: 'none', maxLines: 3 },
		bar: {groupWidth: "85%"},
		seriesType: "bars",
		series: {1: {type: "line",lineWidth: 5, pointSize: 8}}
      };

      var chart = new google.visualization.ColumnChart(document.getElementById("pregunta11"));
      chart.draw(view, options);
  }
</script>
<!-- FIN PREGUNTA 11 -->

<!-- PREGUNTA 12 --->
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
	  ["Element", "Respuestas", { role: "style" } ],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest12 = 'Si'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["Sí", <? echo $suma; ?>, "#FF9900"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest12 = 'No'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["No", <? echo $suma; ?>, "#DD7700"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest12 = 'No sé'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["No sé", <? echo $suma; ?>, "#BB5500"],
	  ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
	    { calc: "stringify",
		  sourceColumn: 1,
		  type: "string",
		  role: "annotation" },
      2]);

      var options = {
		fontSize:12,
		legendfontSize:12,
		titleFontSize:15,
		hAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		vAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		legend: { position: 'none', maxLines: 3 },
		bar: {groupWidth: "85%"},
		seriesType: "bars",
		series: {1: {type: "line",lineWidth: 5, pointSize: 8}}
      };

      var chart = new google.visualization.ColumnChart(document.getElementById("pregunta12"));
      chart.draw(view, options);
  }
</script>
<!-- FIN PREGUNTA 12 -->

<!-- PREGUNTA 13 --->
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
	  ["Element", "Respuestas", { role: "style" } ],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest13 = 'Si'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["Sí", <? echo $suma; ?>, "#FF9900"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest13 = 'No'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["No", <? echo $suma; ?>, "#DD7700"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest13 = 'No sé'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["No sé", <? echo $suma; ?>, "#BB5500"],
	  ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
	    { calc: "stringify",
		  sourceColumn: 1,
		  type: "string",
		  role: "annotation" },
      2]);

      var options = {
		fontSize:12,
		legendfontSize:12,
		titleFontSize:15,
		hAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		vAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		legend: { position: 'none', maxLines: 3 },
		bar: {groupWidth: "85%"},
		seriesType: "bars",
		series: {1: {type: "line",lineWidth: 5, pointSize: 8}}
      };

      var chart = new google.visualization.ColumnChart(document.getElementById("pregunta13"));
      chart.draw(view, options);
  }
</script>
<!-- FIN PREGUNTA 13 -->

<!-- PREGUNTA 14 --->
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
	  ["Element", "Respuestas", { role: "style" } ],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest14 = 'Mejor'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["Mejor", <? echo $suma; ?>, "#FF9900"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest14 = 'Igual'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["Igual", <? echo $suma; ?>, "#DD7700"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest14 = 'Peor'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["Peor", <? echo $suma; ?>, "#BB5500"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest14 = 'No sé'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["No sé", <? echo $suma; ?>, "#993300"],
	  ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
	    { calc: "stringify",
		  sourceColumn: 1,
		  type: "string",
		  role: "annotation" },
      2]);

      var options = {
		fontSize:12,
		legendfontSize:12,
		titleFontSize:15,
		hAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		vAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		legend: { position: 'none', maxLines: 3 },
		bar: {groupWidth: "85%"},
		seriesType: "bars",
		series: {1: {type: "line",lineWidth: 5, pointSize: 8}}
      };

      var chart = new google.visualization.ColumnChart(document.getElementById("pregunta14"));
      chart.draw(view, options);
  }
</script>
<!-- FIN PREGUNTA 14 -->

<!-- PREGUNTA 15 --->
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
	  ["Element", "Respuestas", { role: "style" } ],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest15 = 'Si'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["Sí", <? echo $suma; ?>, "#FF9900"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest15 = 'No'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["No", <? echo $suma; ?>, "#DD7700"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest15 = 'No sé'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["No sé", <? echo $suma; ?>, "#BB5500"],
	  ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
	    { calc: "stringify",
		  sourceColumn: 1,
		  type: "string",
		  role: "annotation" },
      2]);

      var options = {
		fontSize:12,
		legendfontSize:12,
		titleFontSize:15,
		hAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		vAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		legend: { position: 'none', maxLines: 3 },
		bar: {groupWidth: "85%"},
		seriesType: "bars",
		series: {1: {type: "line",lineWidth: 5, pointSize: 8}}
      };

      var chart = new google.visualization.ColumnChart(document.getElementById("pregunta15"));
      chart.draw(view, options);
  }
</script>
<!-- FIN PREGUNTA 15 -->

<!-- PREGUNTA 16 --->
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
	  ["Element", "Respuestas", { role: "style" } ],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest16 = 'PAN'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["PAN", <? echo $suma; ?>, "#1995ff"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest16 = 'PRI'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["PRI", <? echo $suma; ?>, "#f10000"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest16 = 'PRD'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["PRD", <? echo $suma; ?>, "#ffd800"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest16 = 'PT'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["PT", <? echo $suma; ?>, "#ff1414"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest16 = 'PV'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["Verde", <? echo $suma; ?>, "#00d100"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest16 = 'MC'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["Movimiento", <? echo $suma; ?>, "#ff9600"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest16 = 'NA'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["Panal", <? echo $suma; ?>, "#00dedb"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest16 = 'MOR'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["MORENA", <? echo $suma; ?>, "#a00000"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest16 = 'Ind'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["Independientes", <? echo $suma; ?>, "#DDDDDD"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest16 = 'PES'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["Encuentro Social", <? echo $suma; ?>, "#aa00ce"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest16 = 'Nin'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["Ninguno", <? echo $suma; ?>, "#FFBB00"],
	  ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
	    { calc: "stringify",
		  sourceColumn: 1,
		  type: "string",
		  role: "annotation" },
      2]);

      var options = {
		fontSize:12,
		legendfontSize:12,
		titleFontSize:15,
		hAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		vAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		legend: { position: 'none', maxLines: 3 },
		bar: {groupWidth: "85%"},
		seriesType: "bars",
		series: {1: {type: "line",lineWidth: 5, pointSize: 8}}
      };

      var chart = new google.visualization.ColumnChart(document.getElementById("pregunta16"));
      chart.draw(view, options);
  }
</script>
<!-- FIN PREGUNTA 16 -->

<!-- PREGUNTA 176 --->
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
	  ["Element", "Respuestas", { role: "style" } ],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest17 = 'AMLO'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["AMLO", <? echo $suma; ?>, "#a00000"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest17 = 'MZGC'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["M. Zavala", <? echo $suma; ?>, "#1995ff"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest17 = 'RAC'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["R. Anaya", <? echo $suma; ?>, "#1995ff"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest17 = 'MAME'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["M. Mancera", <? echo $suma; ?>, "#ffd800"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest17 = 'JAMK'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["J. Meade", <? echo $suma; ?>, "#f10000"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest17 = 'MOC'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["M. Osorio", <? echo $suma; ?>, "#f10000"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_encuesta WHERE quest17 != '' AND quest17 = 'JNR'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["J. Narro", <? echo $suma; ?>, "#f10000"],
	  ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
	    { calc: "stringify",
		  sourceColumn: 1,
		  type: "string",
		  role: "annotation" },
      2]);

      var options = {
		fontSize:12,
		legendfontSize:12,
		titleFontSize:15,
		hAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		vAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		legend: { position: 'none', maxLines: 3 },
		bar: {groupWidth: "85%"},
		seriesType: "bars",
		series: {1: {type: "line",lineWidth: 5, pointSize: 8}}
      };

      var chart = new google.visualization.ColumnChart(document.getElementById("pregunta17"));
      chart.draw(view, options);
  }
</script>
<!-- FIN PREGUNTA 17 -->

    
</head>


<body>
<div align="center">
  <? if($_SESSION['type'] == "EDITOR"){ ?>
  <div align="center">
    <img src="../encuesta/img/expertaria.png">
    <div style="float:right; margin:10px;"><input name="logout" type="button" value="Salir" onClick="location.href='logoff.php'" class="button"></div>
  </div>
  <div id="contenido">
    <h1>Resultados de la encuesta</h1>
    <h2>1. Encuestados</h2>
	<?
	  $e18a24 = 0;
	  $e25a34 = 0;
	  $e35a44 = 0;
	  $e45a54 = 0;
	  $e55a64 = 0;
	  $e65mas = 0;
	  $graph = new TConeccion();
	  
	  $consulta  = "SELECT * FROM demo_registro WHERE birthdate <= '2000-12-31' AND birthdate >= '1993-01-01'";
	  $graph->Gestion($consulta);
	  while($data = mysql_fetch_array($graph->Query)) { $e18a24++; }

	  $consulta  = "SELECT * FROM demo_registro WHERE birthdate <= '1992-12-31' AND birthdate >= '1983-01-01'";
	  $graph->Gestion($consulta);
	  while($data = mysql_fetch_array($graph->Query)) { $e25a34++; }

	  $consulta  = "SELECT * FROM demo_registro WHERE birthdate <= '1982-12-31' AND birthdate >= '1973-01-01'";
	  $graph->Gestion($consulta);
	  while($data = mysql_fetch_array($graph->Query)) { $e35a44++; }

	  $consulta  = "SELECT * FROM demo_registro WHERE birthdate <= '1972-12-31' AND birthdate >= '1963-01-01'";
	  $graph->Gestion($consulta);
	  while($data = mysql_fetch_array($graph->Query)) { $e45a54++; }

	  $consulta  = "SELECT * FROM demo_registro WHERE birthdate <= '1962-12-31' AND birthdate >= '1953-01-01'";
	  $graph->Gestion($consulta);
	  while($data = mysql_fetch_array($graph->Query)) { $e55a64++; }

	  $consulta  = "SELECT * FROM demo_registro WHERE birthdate <= '1952-12-31' AND birthdate >= '1900-01-01'";
	  $graph->Gestion($consulta);
	  while($data = mysql_fetch_array($graph->Query)) { $e65mas++; }
	?>    
    <div style="width:100%; float:left; margin:0px;"><div id="chart_div08" style="width:100%;height:275px;float:left;border:#FFF solid 1px;margin:0px;"></div></div>
    <div style="clear:both"></div>
    <table>
      <thead>
        <tr>
          <th>Edad</th>
          <th>Encuestados</th>
          <th>Porcentaje</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <td><div align="center">TOTAL</div></td>
          <td><div align="center"><? echo $totalhm; ?></div></td>
          <td><div align="center">100%</div></td>
        </tr>
      </tfoot>
      <tbody>
        <tr>
          <td><div align="center">18 a 24</div></td>
          <td><div align="center"><? echo $e18a24; ?></div></td>
          <td><div align="center"><? $porcentaje = ($e18a24/$totalhm)*100; echo number_format($porcentaje,1)."%"; ?></div></td>
        </tr>
        <tr>
          <td><div align="center">25 a 34</div></td>
          <td><div align="center"><? echo $e25a34; ?></div></td>
          <td><div align="center"><? $porcentaje = ($e25a34/$totalhm)*100; echo number_format($porcentaje,1)."%"; ?></div></td>
        </tr>
        <tr>
          <td><div align="center">35 a 44</div></td>
          <td><div align="center"><? echo $e35a44; ?></div></td>
          <td><div align="center"><? $porcentaje = ($e35a44/$totalhm)*100; echo number_format($porcentaje,1)."%"; ?></div></td>
        </tr>
        <tr>
          <td><div align="center">45 a 54</div></td>
          <td><div align="center"><? echo $e45a54; ?></div></td>
          <td><div align="center"><? $porcentaje = ($e45a54/$totalhm)*100; echo number_format($porcentaje,1)."%"; ?></div></td>
        </tr>
        <tr>
          <td><div align="center">55 a 64</div></td>
          <td><div align="center"><? echo $e55a64; ?></div></td>
          <td><div align="center"><? $porcentaje = ($e55a64/$totalhm)*100; echo number_format($porcentaje,1)."%"; ?></div></td>
        </tr>
        <tr>
          <td><div align="center">65 o más</div></td>
          <td><div align="center"><? echo $e65mas; ?></div></td>
          <td><div align="center"><? $porcentaje = ($e65mas/$totalhm)*100; echo number_format($porcentaje,1)."%"; ?></div></td>
        </tr>
      </tbody>
    </table>
    
    <h2>2. Cuestionario</h2>
    
    <div style="width:46%; margin:10px 2%; float:left;">
      <p>1. ¿Qué tanto te interesan los temas de política?</p>
      <div id="pregunta01" style="width:100%;height:275px;float:left;border:#FFF solid 1px;margin:0px;"></div>
    </div>

    <div style="width:46%; margin:10px 2%; float:left;">
      <p>2. ¿Acostumbras platicar con amigos y familiares sobre política?</p>
      <div id="pregunta02" style="width:100%;height:275px;float:left;border:#FFF solid 1px;margin:0px;"></div>
    </div>
    
    <div style="clear:both"></div>
    
    <div style="width:46%; margin:10px 2%; float:left;">
      <p>3. ¿Acostumbras participar en discusiones políticas en redes sociales?</p>
      <div id="pregunta03" style="width:100%;height:275px;float:left;border:#FFF solid 1px;margin:0px;"></div>
    </div>
    
    <div style="width:46%; margin:10px 2%; float:left;">
      <p>4. ¿Acostumbras leer periódicos con temas de política?</p>
      <div id="pregunta04" style="width:100%;height:275px;float:left;border:#FFF solid 1px;margin:0px;"></div>
    </div>
    
    <div style="clear:both"></div>
    
    <div style="width:46%; margin:10px 2%; float:left;">
      <p>5. ¿Qué tan interesado estás en votar para Presidente de la República en 2018?</p>
      <div id="pregunta05" style="width:100%;height:275px;float:left;border:#FFF solid 1px;margin:0px;"></div>
    </div>
    
    <div style="width:46%; margin:10px 2%; float:left;">
      <p>6. ¿Acostumbras escuchar noticieros en radio?</p>
      <div id="pregunta06" style="width:100%;height:275px;float:left;border:#FFF solid 1px;margin:0px;"></div>
    </div>
    
    <div style="clear:both"></div>
    
    <div style="width:46%; margin:10px 2%; float:left;">
      <p>7. ¿Acostumbras ver noticieros en televisión?</p>
      <div id="pregunta07" style="width:100%;height:275px;float:left;border:#FFF solid 1px;margin:0px;"></div>
    </div>
    
    <div style="width:46%; margin:10px 2%; float:left;">
      <p>8. ¿Acostumbras leer o ver noticias en internet y redes sociales?</p>
      <div id="pregunta08" style="width:100%;height:275px;float:left;border:#FFF solid 1px;margin:0px;"></div>
    </div>
    
    <div style="clear:both"></div>

    <div style="width:46%; margin:10px 2%; float:left;">
      <p>9. ¿Sigues en redes sociales a algún político o gobernante?</p>
      <div id="pregunta09" style="width:100%;height:275px;float:left;border:#FFF solid 1px;margin:0px;"></div>
    </div>
    
    <div style="width:46%; margin:10px 2%; float:left;">
      <p>10. ¿Qué tanto crees que influirá en tu voto lo que lees, ves o escuchas en las noticias sobre los candidatos?</p>
      <div id="pregunta10" style="width:100%;height:275px;float:left;border:#FFF solid 1px;margin:0px;"></div>
    </div>
    
    <div style="clear:both"></div>
    
    <div style="width:100%; margin:10px 0px; float:left;">
      <p>11. Si pudieras describir tu sentimiento con respecto al presente de México en una sola palabra, ¿Cuál palabra sería la más adecuada?</p>
      <div id="pregunta11" style="width:100%;height:275px;float:left;border:#FFF solid 1px;margin:0px;"></div>
    </div>
    
    <div style="clear:both"></div>
    
    <div style="width:46%; margin:10px 2%; float:left;">
      <p>12. ¿Crees que, en lo general, México está avanzando como país?</p>
      <div id="pregunta12" style="width:100%;height:275px;float:left;border:#FFF solid 1px;margin:0px;"></div>
    </div>
    
    <div style="width:46%; margin:10px 2%; float:left;">
      <p>13. ¿Crees que, en lo general, el estado en el que vives está avanzando?</p>
      <div id="pregunta13" style="width:100%;height:275px;float:left;border:#FFF solid 1px;margin:0px;"></div>
    </div>
    
    <div style="clear:both"></div>
    
    <div style="width:46%; margin:10px 2%; float:left;">
      <p>14. Este año, ¿cómo sientes que es tu situación económica actual?</p>
      <div id="pregunta14" style="width:100%;height:275px;float:left;border:#FFF solid 1px;margin:0px;"></div>
    </div>
    
    <div style="width:46%; margin:10px 2%; float:left;">
      <p>15. ¿Crees que la situación actual de México podría estar peor de lo que actualmente está?</p>
      <div id="pregunta15" style="width:100%;height:275px;float:left;border:#FFF solid 1px;margin:0px;"></div>
    </div>
    
    <div style="clear:both"></div>
    
    <div style="width:100%; margin:10px 0px; float:left;">
      <p>16. ¿Por cuál partido  político definitivamente NO votarías para Presidente de la República para el próximo año?</p>
      <div id="pregunta16" style="width:100%;height:275px;float:left;border:#FFF solid 1px;margin:0px;"></div>
    </div>
    
    <div style="clear:both"></div>
    
    <div style="width:100%; margin:10px 0px; float:left;">
      <p>17. ¿Por cuál personaje político definitivamente NO votarías para Presidente de la República para el próximo año?</p>
      <div id="pregunta17" style="width:100%;height:275px;float:left;border:#FFF solid 1px;margin:0px;"></div>
    </div>
    
    <div style="clear:both"></div>
  <? } ?>  
  </div>
</div>
</body>
</html>