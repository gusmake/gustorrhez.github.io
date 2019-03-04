<? include ("tconnection.php"); ?>
<?
  $stats = new TConeccion();
  $consulta  = "SELECT * FROM social_twittonomy_nuevo WHERE date >= '2014-".$_GET['mes']."-01' AND date <= '2014-".$_GET['mes']."-31' AND type = 'New'";
  $stats->Gestion($consulta);
  while($list = mysql_fetch_array($stats->Query)){
    $id = $list['id'];
    $engagement = $list['retweet']+$list['favorite'];

    $Coneccion2 = new TConeccion();
    $SQL = "UPDATE social_twittonomy_nuevo SET engagement='$engagement' WHERE id='$id'";
    $Coneccion2->Gestion($SQL);
  }
?>
<?
  $stats = new TConeccion();
  $consulta  = "SELECT * FROM social_posts";
  $stats->Gestion($consulta);
  while($list = mysql_fetch_array($stats->Query)){
    $id = $list['id'];
    $engagement = $list['comment']+$list['likes']+$list['share'];

    $Coneccion2 = new TConeccion();
    $SQL = "UPDATE social_posts SET engagement='$engagement' WHERE id='$id'";
    $Coneccion2->Gestion($SQL);
  }
?>
<?
  $mes_legend = $_GET['mes'];
  switch ($mes_legend) {
    case "01":
	  $mes_txt = "Enero";
	  break;
    case "02":
	  $mes_txt = "Febrero";
	  break;
    case "03":
	  $mes_txt = "Marzo";
	  break;
    case "04":
	  $mes_txt = "Abril";
	  break;
    case "05":
	  $mes_txt = "Mayo";
	  break;
    case "06":
	  $mes_txt = "Junio";
	  break;
    case "07":
	  $mes_txt = "Julio";
	  break;
    case "08":
	  $mes_txt = "Agosto";
	  break;
    case "09":
	  $mes_txt = "Septiembre";
	  break;
    case "10":
	  $mes_txt = "Octubre";
	  break;
    case "11":
	  $mes_txt = "Noviembre";
	  break;
    case "12":
	  $mes_txt = "Diciembre";
	  break;
    }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Portal del Empleo | Social Metrics</title>
<link href="style.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">google.load('visualization', '1', {packages: ['corechart']});</script>
    
<!--SEGUIDORES POR MES-->
<script type="text/javascript">
  function drawVisualization() {
  // Some raw data (not necessarily accurate)
    var data = google.visualization.arrayToDataTable([
	  ['Mes', 'Seguidores', 'Proyección'],
	  ['Ene',  986, 1100],
	  ['Feb',  <? if ($_GET['mes']>='02') { echo "1075"; } ?>, 1100],
	  ['Mar',  <? if ($_GET['mes']>='03') { echo "1102"; } ?>, 1100],
	  ['Abr',  <? $followers_month04 = 0; $graph = new TConeccion(); $consulta  = "SELECT * FROM social_followers WHERE date >= '2014-04-01' AND date <= '2014-04-30'"; $graph->Gestion($consulta); while($data = mysql_fetch_array($graph->Query)){ $followers_month04 = $followers_month04+$data['per_day']; } echo $followers_month04; ?>, 1200],
	  ['May',  <? $followers_month05 = 0; $graph = new TConeccion(); $consulta  = "SELECT * FROM social_followers WHERE date >= '2014-05-01' AND date <= '2014-05-31'"; $graph->Gestion($consulta); while($data = mysql_fetch_array($graph->Query)){ $followers_month05 = $followers_month05+$data['per_day']; } if($_GET['mes']>=5) { echo $followers_month05; } else { echo 0; } ?>, 1200],
	  ['Jun',  <? $followers_month06 = 0; $graph = new TConeccion(); $consulta  = "SELECT * FROM social_followers WHERE date >= '2014-06-01' AND date <= '2014-06-30'"; $graph->Gestion($consulta); while($data = mysql_fetch_array($graph->Query)){ $followers_month06 = $followers_month06+$data['per_day']; } if($_GET['mes']>=6) { echo $followers_month06; } else { echo 0; } ?>, 1200],
	  ['Jul',  <? $followers_month07 = 0; $graph = new TConeccion(); $consulta  = "SELECT * FROM social_followers WHERE date >= '2014-07-01' AND date <= '2014-07-31'"; $graph->Gestion($consulta); while($data = mysql_fetch_array($graph->Query)){ $followers_month07 = $followers_month07+$data['per_day']; } if($_GET['mes']>=7) { echo $followers_month07; } else { echo 0; } ?>, 1300],
	  ['Ago',  0,	1300],
	  ['Sep',  0,	1300],
	  ['Oct',  0,	1450],
	  ['Nov',  0,	1450],
	  ['Dic',  0,	1450]
    ]);
	
	var options = {
	  title : 'Nuevos seguidores por mes / Twitter <? echo $mes_txt; ?> 2014',
	  fontSize:11,
	  legendfontSize:11,
	  titleFontSize:15,
	  hAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
	  vAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
	  colors:['#88a252','#5f7a18'],
	  legend: { position: 'bottom', maxLines: 3 },
	  seriesType: "bars",
	  series: {1: {type: "line",lineWidth: 1, pointSize: 10}}	  
	};
	
	var formatter1 = new google.visualization.NumberFormat({groupingSymbol:','}, {decimalSymbol:'.'});
	formatter1.format(data, 1);
	
	var chart = new google.visualization.ComboChart(document.getElementById('chart_div01'));
	chart.draw(data, options);
  }
  google.setOnLoadCallback(drawVisualization);
</script>

<!--ME GUSTA POR MES-->
<script type="text/javascript">
  function drawVisualization() {
  // Some raw data (not necessarily accurate)
    var data = google.visualization.arrayToDataTable([
	  ['Mes', 'Me gusta', 'Proyección'],
	  ['Ene',  2607, 2500],
	  ['Feb',  2359, 2500],
	  ['Mar',  2651, 2500],
	  ['Abr',  <? $megusta_month04 = 0; $graph = new TConeccion(); $consulta  = "SELECT * FROM social_megusta WHERE date >= '2014-04-01' AND date <= '2014-04-30'"; $graph->Gestion($consulta); while($data = mysql_fetch_array($graph->Query)){ $megusta_month04 =  $megusta_month04+$data['per_day']; } if($_GET['mes']>=4) { echo $megusta_month04; } else { echo 0; } ?>, 2750],
	  ['May',  <? $megusta_month05 = 0; $graph = new TConeccion(); $consulta  = "SELECT * FROM social_megusta WHERE date >= '2014-05-01' AND date <= '2014-05-31'"; $graph->Gestion($consulta); while($data = mysql_fetch_array($graph->Query)){ $megusta_month05 =  $megusta_month05+$data['per_day']; } if($_GET['mes']>=5) { echo $megusta_month05; } else { echo 0; } ?>, 2750],
	  ['Jun',  <? $megusta_month06 = 0; $graph = new TConeccion(); $consulta  = "SELECT * FROM social_megusta WHERE date >= '2014-06-01' AND date <= '2014-06-30'"; $graph->Gestion($consulta); while($data = mysql_fetch_array($graph->Query)){ $megusta_month06 =  $megusta_month06+$data['per_day']; } if($_GET['mes']>=6) { echo $megusta_month06; } else { echo 0; } ?>, 2750],
	  ['Jul',  <? $megusta_month07 = 0; $graph = new TConeccion(); $consulta  = "SELECT * FROM social_megusta WHERE date >= '2014-07-01' AND date <= '2014-07-31'"; $graph->Gestion($consulta); while($data = mysql_fetch_array($graph->Query)){ $megusta_month07 =  $megusta_month07+$data['per_day']; } if($_GET['mes']>=7) { echo $megusta_month07; } else { echo 0; } ?>, 3000],
	  ['Ago',  0,	3000],
	  ['Sep',  0,	3000],
	  ['Oct',  0,	3330],
	  ['Nov',  0,	3330],
	  ['Dic',  0,	3330]
    ]);
	
	var options = {
	  title : 'Nuevos me gusta por mes / Facebook <? echo $mes_txt; ?> 2014',
	  fontSize:11,
	  legendfontSize:11,
	  titleFontSize:15,
	  hAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
	  vAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
	  colors:['#88a252','#5f7a18'],
	  legend: { position: 'bottom', maxLines: 3 },
	  seriesType: "bars",
	  series: {1: {type: "line",lineWidth: 1, pointSize: 10}}
	};
	
	var chart = new google.visualization.ComboChart(document.getElementById('chart_div02'));
	chart.draw(data, options);
  }
  google.setOnLoadCallback(drawVisualization);
</script>


<!--SEGUIDORES DIARIOS POR DIA-->
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Element', 'Seguidores'],
		  <?
		    $mas_seguidores_qty = 0;
			$graph = new TConeccion();
			$consulta  = "SELECT * FROM social_followers WHERE date >= '2014-".$_GET['mes']."-01' AND date <= '2014-".$_GET['mes']."-31' ORDER BY date ASC";
			$graph->Gestion($consulta);
			while($data = mysql_fetch_array($graph->Query)){
			  if ($data['per_day']>=$mas_seguidores_qty) { $mas_seguidores_dia = substr($data['date'],8,2); $mas_seguidores_qty = $data['per_day']; }
		  ?>
		  ['<? echo substr($data['date'],8,2); ?>', <? echo $data['per_day']; ?>]<? echo ","; ?>
		  <? } ?>
        ]);

        var options = {
          title: 'Nuevos seguidores diarios / Twitter <? echo $mes_txt; ?> 2014',
		  curveType: 'function',
		  lineWidth:8,
		  hAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		  vAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		  legend: { position: 'bottom' },
		  fontSize:13,
		  legendFontSize:13,
		  titleFontSize:15,
		  colors:['#88a252','#5f7a18'],
        };
		
        var chart = new google.visualization.LineChart(document.getElementById('chart_div03'));
        chart.draw(data, options);
      }
    </script>


<!--ME GUSTA DIARIOS POR DIA-->
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Element', 'Me gusta'],
		  <?
		    $mas_megusta_qty = 0;
			$graph = new TConeccion();
			$consulta  = "SELECT * FROM social_megusta WHERE date >= '2014-".$_GET['mes']."-01' AND date <= '2014-".$_GET['mes']."-31' ORDER BY date ASC";
			$graph->Gestion($consulta);
			while($data = mysql_fetch_array($graph->Query)){
			  if ($data['per_day']>=$mas_megusta_qty) { $mas_megusta_dia = substr($data['date'],8,2); $mas_megusta_qty = $data['per_day']; }
		  ?>
		    ['<? echo substr($data['date'],8,2); ?>', <? echo $data['per_day']; ?>]<? echo ","; ?>
		  <? } ?>
        ]);

        var options = {
          title: 'Nuevos me gusta diarios / Facebook <? echo $mes_txt; ?> 2014',
		  curveType: 'function',
		  lineWidth:8,
		  hAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		  vAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		  legend: { position: 'bottom' },
		  fontSize:13,
		  legendFontSize:13,
		  titleFontSize:15,
		  colors:['#88a252','#5f7a18'],
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div04'));
        chart.draw(data, options);
      }
    </script>


<!--ACUMULADO DE SEGUIDORES-->
<script type="text/javascript">
  function drawVisualization() {
  // Some raw data (not necessarily accurate)
    var data = google.visualization.arrayToDataTable([
	  ['Mes', 'Seguidores', 'Proyección'],
	  ['Ene',  31936, 31759],
	  ['Feb',  33011, 32850],
	  ['Mar',  34088, 34000],
	  ['Abr',  <? $graph = new TConeccion(); $consulta  = "SELECT * FROM social_followers WHERE date >= '2014-04-01' AND date <= '2014-04-30' ORDER BY date DESC LIMIT 1"; $graph->Gestion($consulta); $data = mysql_fetch_array($graph->Query); $acumulado_seguidores = $data['acumulado']/1000; echo $data['acumulado']; ?>, 35200],
	  ['May',  <? $graph = new TConeccion(); $consulta  = "SELECT * FROM social_followers WHERE date >= '2014-05-01' AND date <= '2014-05-31' ORDER BY date DESC LIMIT 1"; $graph->Gestion($consulta); $data = mysql_fetch_array($graph->Query); $acumulado_seguidores = $data['acumulado']/1000; echo $data['acumulado']; ?>, 36400],
	  ['Jun',  <? $graph = new TConeccion(); $consulta  = "SELECT * FROM social_followers WHERE date >= '2014-06-01' AND date <= '2014-06-30' ORDER BY date DESC LIMIT 1"; $graph->Gestion($consulta); $data = mysql_fetch_array($graph->Query); $acumulado_seguidores = $data['acumulado']/1000; echo $data['acumulado']; ?>, 37600],
	  ['Jul',  <? $graph = new TConeccion(); $consulta  = "SELECT * FROM social_followers WHERE date >= '2014-07-01' AND date <= '2014-07-31' ORDER BY date DESC LIMIT 1"; $graph->Gestion($consulta); $data = mysql_fetch_array($graph->Query); $acumulado_seguidores = $data['acumulado']/1000; echo $data['acumulado']; ?>, 38900],
	  ['Ago',  0,	40200],
	  ['Sep',  0,	41500],
	  ['Oct',  0,	42950],
	  ['Nov',  0,	44400],
	  ['Dic',  0,	45850]
    ]);
	
	var options = {
	  title : 'Acumulado de seguidores / Twitter 2014',
	  fontSize:11,
	  legendfontSize:11,
	  titleFontSize:15,
	  hAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
	  vAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
	  colors:['#88a252','#5f7a18'],
	  legend: { position: 'bottom', maxLines: 3 },
	  seriesType: "bars",
	  series: {1: {type: "line",lineWidth: 1, pointSize: 10}}
	};
	
	var chart = new google.visualization.ComboChart(document.getElementById('chart_div05'));
	chart.draw(data, options);
  }
  google.setOnLoadCallback(drawVisualization);
</script>

<!--ACUMULADO DE MEGUSTA-->
<script type="text/javascript">
  function drawVisualization() {
  // Some raw data (not necessarily accurate)
    var data = google.visualization.arrayToDataTable([
	  ['Mes', 'Me gusta', 'Proyección'],
	  ['Ene',  6707, 6200],
	  ['Feb',  9066, 8950],
	  ['Mar',  11717, 11700],
	  ['Abr',  <? $graph = new TConeccion(); $consulta  = "SELECT * FROM social_megusta WHERE date >= '2014-04-01' AND date <= '2014-04-30' ORDER BY id DESC LIMIT 1"; $graph->Gestion($consulta); $data = mysql_fetch_array($graph->Query); $acumulado_megusta = $data['acumulado']/1000; echo $data['acumulado']; ?>, 14450],
	  ['May',  <? $graph = new TConeccion(); $consulta  = "SELECT * FROM social_megusta WHERE date >= '2014-05-01' AND date <= '2014-05-31' ORDER BY id DESC LIMIT 1"; $graph->Gestion($consulta); $data = mysql_fetch_array($graph->Query); $acumulado_megusta = $data['acumulado']/1000; echo $data['acumulado']; ?>, 17200],
	  ['Jun',  <? $graph = new TConeccion(); $consulta  = "SELECT * FROM social_megusta WHERE date >= '2014-06-01' AND date <= '2014-06-30' ORDER BY id DESC LIMIT 1"; $graph->Gestion($consulta); $data = mysql_fetch_array($graph->Query); $acumulado_megusta = $data['acumulado']/1000; echo $data['acumulado']; ?>, 19950],
	  ['Jul',  <? $graph = new TConeccion(); $consulta  = "SELECT * FROM social_megusta WHERE date >= '2014-07-01' AND date <= '2014-07-31' ORDER BY id DESC LIMIT 1"; $graph->Gestion($consulta); $data = mysql_fetch_array($graph->Query); $acumulado_megusta = $data['acumulado']/1000; echo $data['acumulado']; ?>, 22950],
	  ['Ago',  0,	25950],
	  ['Sep',  0,	28950],
	  ['Oct',  0,	32280],
	  ['Nov',  0,	35610],
	  ['Dic',  0,	38940]
    ]);
	
	var options = {
	  title : 'Acumulado de me gusta / Facebook 2014',
	  fontSize:11,
	  legendfontSize:11,
	  titleFontSize:15,
	  hAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
	  vAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
	  colors:['#88a252','#5f7a18'],
	  legend: { position: 'bottom', maxLines: 3 },
	  seriesType: "bars",
	  series: {1: {type: "line",lineWidth: 1, pointSize: 10}}
	};
	
	var chart = new google.visualization.ComboChart(document.getElementById('chart_div06'));
	chart.draw(data, options);
  }
  google.setOnLoadCallback(drawVisualization);
</script>

<!--SEGUIDORES INSTITUCIONALES-->
<?
  $seguidor_inst = 0;
  $total = 0;
  $graph = new TConeccion();
  $consulta  = "SELECT * FROM social_institucionales WHERE date <= '2014-".$_GET['mes']."-31' AND active = 0";
  $graph->Gestion($consulta);
  while($data = mysql_fetch_array($graph->Query)){
	$seguidor_inst = $seguidor_inst+$data['status'];
	$total++;
	$cuentas_institucionales = $total;
	$dif = $total-$seguidor_inst;
	$perc_seguidor = ($seguidor_inst/$total)*100;
	$perc_faltante = ($dif/$total)*100;
  }
?>
<script type="text/javascript">
  google.load('visualization', '1.0', {'packages':['corechart']});
  google.setOnLoadCallback(drawChart);
  
  function drawChart() {

    var data = new google.visualization.DataTable();
	data.addColumn('string', 'Topping');
	data.addColumn('number', 'Slices');
	data.addRows([	
	  ['Seguidores', <? echo $seguidor_inst; ?>],
	  ['No seguidores', <? echo $dif; ?>],
	]);

    var options = {
	  title:"Seguidores institucionales / Twitter <? echo $mes_txt; ?> 2014",
	  is3D: true,
	  fontSize:11,
	  legendfontSize:11,
	  titleFontSize:15,
	  colors:['#88a252','#aaa'],
	  legend: { position: 'bottom', maxLines: 3 }
    };
	
	var chart = new google.visualization.PieChart(document.getElementById('chart_div07'));
	chart.draw(data, options);
  }
</script>

<!--PERFIL DE LOS SUSCRIPTORES POR EDAD-->
<?
  $graph = new TConeccion();
  $consulta  = "SELECT * FROM social_edadysexo WHERE date >= '2014-".$_GET['mes']."-01' AND date <= '2014-".$_GET['mes']."-31'";
  $graph->Gestion($consulta);
  $data = mysql_fetch_array($graph->Query);
  $mujeres = $data['F13-17']+$data['F18-24']+$data['F25-34']+$data['F35-44']+$data['F45-54']+$data['F55-64']+$data['F65'];
  $hombres = $data['M13-17']+$data['M18-24']+$data['M25-34']+$data['M35-44']+$data['M45-54']+$data['M55-64']+$data['M65'];
  $porcentaje_mujeres = $mujeres/($mujeres+$hombres)*100;
  $porcentaje_hombres = $hombres/($mujeres+$hombres)*100;
  $totalhm = $mujeres+$hombres;
  $g18a24 = $data['F18-24']+$data['M18-24'];
  $g25a34 = $data['F25-34']+$data['M25-34'];
  $porcentaje_g18a24 = $g18a24/$totalhm*100;
  $porcentaje_g25a34 = $g25a34/$totalhm*100;
?>
<script type="text/javascript">
  function drawVisualization() {
  // Some raw data (not necessarily accurate)
    var data = google.visualization.arrayToDataTable([
	  ['Mes', 'Mujeres', 'Hombres'],
	  ['13 a 17',  <? echo $data['F13-17']; ?>,	<? echo $data['M13-17']; ?>],
	  ['18 a 24',  <? echo $data['F18-24']; ?>,	<? echo $data['M18-24']; ?>],
	  ['25 a 34',  <? echo $data['F25-34']; ?>,	<? echo $data['M25-34']; ?>],
	  ['35 a 44',  <? echo $data['F35-44']; ?>,	<? echo $data['M35-44']; ?>],
	  ['45 a 54',  <? echo $data['F45-54']; ?>,	<? echo $data['M45-54']; ?>],
	  ['55 a 64',  <? echo $data['F55-64']; ?>,	<? echo $data['M55-64']; ?>],
	  ['65+',  <? echo $data['F65']; ?>,	<? echo $data['M65']; ?>],
    ]);
	
	var view = new google.visualization.DataView(data);
	view.setColumns([0, 1, 2,
	  { calc: "stringify",
	    sourceColumn: 1,
		type: "string",
		role: "annotation" },
	]);

	var options = {
	  title : 'Suscriptores por edad-sexo / Facebook <? echo $mes_txt; ?> 2014',
	  fontSize:11,
	  legendfontSize:11,
	  titleFontSize:15,
	  hAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
	  vAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
	  colors:['#88a252','#5f7a18'],
	  bar: {groupWidth: "90%"},
	  legend: { position: 'bottom', maxLines: 3 },
	  seriesType: "bars",
	};
	
	var chart = new google.visualization.ComboChart(document.getElementById('chart_div08'));
	chart.draw(data, options);
  }
  google.setOnLoadCallback(drawVisualization);
</script>

<!--SUSCRIPTORES JÓVENES 18-24-->
<script type="text/javascript">
  function drawVisualization() {
  // Some raw data (not necessarily accurate)
    var data = google.visualization.arrayToDataTable([
	  ['Mes', 'Me gusta', 'Proyección'],
	  ['Abr',  5982, 8000],
	  ['May',  7114, 9000],
	  ['Jun',  8526, 10000],
	  ['Jul',  9668, 12000],
	  ['Ago',  0,	13000],
	  ['Sep',  0,	14000],
	  ['Oct',  0,	18000],
	  ['Nov',  0,	19000],
	  ['Dic',  0,	20000]
    ]);
	
	var options = {
	  title : 'Suscriptores jóvenes / Facebook <? echo $mes_txt; ?> 2014',
	  fontSize:11,
	  legendfontSize:11,
	  titleFontSize:15,
	  hAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
	  vAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
	  colors:['#88a252','#5f7a18'],
	  legend: { position: 'bottom', maxLines: 3 },
	  seriesType: "bars",
	  series: {1: {type: "line",lineWidth: 1, pointSize: 10}}
	};
	
	var chart = new google.visualization.ComboChart(document.getElementById('chart_div08A'));
	chart.draw(data, options);
  }
  google.setOnLoadCallback(drawVisualization);
</script>


<!--PERFIL DE LOS SUSCRIPTORES POR GÉNERO-->
<script type="text/javascript">
  google.load('visualization', '1.0', {'packages':['corechart']});
  google.setOnLoadCallback(drawChart);
  
  function drawChart() {

    var data = new google.visualization.DataTable();
	data.addColumn('string', 'Topping');
	data.addColumn('number', 'Slices');
	data.addRows([	
	  
	  ['Hombres', <? echo $hombres; ?>],
	  ['Mujeres', <? echo $mujeres; ?>],
	]);

    var options = {
	  title:"Suscriptores por sexo / Facebook <? echo $mes_txt; ?> 2014",
	  is3D: true,
	  fontSize:11,
	  legendfontSize:11,
	  titleFontSize:15,
	  colors:['#88a252','#5f7a18'],
	  legend: { position: 'bottom', maxLines: 2 }
    };
	
	var chart = new google.visualization.PieChart(document.getElementById('chart_div08B'));
	chart.draw(data, options);
  }
</script>

<!-- SEGMENTACIÓN GEOGRÁFICA  -->
<script type='text/javascript'>
  google.load('visualization', '1', {'packages': ['geochart']});
  google.setOnLoadCallback(drawRegionsMap);
  
  function drawRegionsMap() {
    var data = google.visualization.arrayToDataTable([
	  ['País', 'Suscriptores'],
	  <?
	    $graph = new TConeccion();
		$consulta  = "SELECT * FROM social_country WHERE date >= '2014-".$_GET['mes']."-01' AND date <= '2014-".$_GET['mes']."-31'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){
	  ?>
	  ['<? echo $data['country_code']; ?>', <? echo $data['users']; ?>],
	  <? } ?>
    ]);
	
	var options = {
	  title : 'Suscriptores por país / Facebook <? echo $mes_txt; ?> 2014',
	  fontSize:11,
	  legendfontSize:11,
	  titleFontSize:15,
	  colorAxis : {minValue: 0,  colors: ['#e0e6d4', '#5f7a18']}
	};
	
	var chart = new google.visualization.GeoChart(document.getElementById('chart_div09'));
	chart.draw(data, options);
  };
</script>

<!-- MÉXICO -->
    <script type='text/javascript' src='https://www.google.com/jsapi'></script>
    <script type='text/javascript'>
     google.load('visualization', '1', {'packages': ['geochart']});
     google.setOnLoadCallback(drawMarkersMap);

      function drawMarkersMap() {
      var data = google.visualization.arrayToDataTable([
        ['Country',   'Votos'],
	  <?
	    $graph = new TConeccion();
		$consulta  = "SELECT * FROM demo_registro WHERE id_segmento = 1 AND id_state = MEX";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){
	  ?>
        ['<? echo $data['country_code']; ?>',  65700000],
		<? } ?>
      ]);

      var options = {
        sizeAxis: { minValue: 0, maxValue: 100 },
        region: 'MX', // Mexico
        displayMode: 'regions',
		resolution: 'provinces',
        colorAxis: {colors: ['#fff', '#000']} // orange to blue
      };

      var chart = new google.visualization.GeoChart(document.getElementById('chart_div09_demo'));
      chart.draw(data, options);
    };
    </script>
<!-- FIN MÉXICO --->


<!--TWEETS POR MES-->
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
	  ["Element", "Tweets", { role: "style" } ],
	  ["Ene", 1106, "#88a252"],
	  ["Feb", 1310, "#88a252"],
	  ["Mar", 1551, "#88a252"],
	  ["Abr", 1384, "#88a252"],
	  ["May", 1447, "#88a252"],
	  ["Jun", 1394, "#88a252"],
	  ["Jul", 1406, "#88a252"],
	  ["Ago", , "#88a252"],
	  ["Sep", , "#88a252"],
	  ["Oct", , "#88a252"],
	  ["Nov", , "#88a252"],
	  ["Dic", , "#88a252"],
    ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
	    { calc: "stringify",
		  sourceColumn: 1,
		  type: "string",
		  role: "annotation" },
      2]);

      var options = {
	    title: "Publicaciones por mes / Twitter <? echo $mes_txt; ?> 2014",
		fontSize:11,
		legendfontSize:11,
		titleFontSize:15,
		hAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		vAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		colors:['#88a252','#5f7a18'],
		legend: { position: 'bottom', maxLines: 3 },
		bar: {groupWidth: "85%"},
		seriesType: "bars",
		series: {1: {type: "line",lineWidth: 5, pointSize: 8}}
      };

      var chart = new google.visualization.ColumnChart(document.getElementById("chart_div09A"));
      chart.draw(view, options);
  }
</script>


<!--POSTS POR MES-->
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
	  ["Element", "Posts", { role: "style" } ],
	  ["Ene", 39, "#88a252"],
	  ["Feb", 50, "#88a252"],
	  ["Mar", 47, "#88a252"],
	  ["Abr", 39, "#88a252"],
	  ["May", 24, "#88a252"],
	  ["Jun", 36, "#88a252"],
	  ["Jul", 42, "#88a252"],
	  ["Ago", , "#88a252"],
	  ["Sep", , "#88a252"],
	  ["Oct", , "#88a252"],
	  ["Nov", , "#88a252"],
	  ["Dic", , "#88a252"],
    ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
	    { calc: "stringify",
		  sourceColumn: 1,
		  type: "string",
		  role: "annotation" },
      2]);

      var options = {
	    title: "Publicaciones por mes / Facebook <? echo $mes_txt; ?> 2014",
		fontSize:11,
		legendfontSize:11,
		titleFontSize:15,
		hAxis: {gridlines: {color: '#ccc', count: 2}},
		vAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		colors:['#88a252','#5f7a18'],
		legend: { position: 'bottom', maxLines: 2 },
		bar: {groupWidth: "85%"},
		seriesType: "bars",
		series: {1: {type: "line",lineWidth: 5, pointSize: 8}}
      };

      var chart = new google.visualization.ColumnChart(document.getElementById("chart_div09B"));
      chart.draw(view, options);
  }
</script>


<!--TWEETS POR DIA-->
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Element', 'Tweets'],
		<?
		  for ($x=1; $x<=30; $x++) {
		    if($x<=9) { $day = "0".$x; } else { $day = $x; }
		?>
		<?
		  $suma = 0;
		  $graph = new TConeccion();
		  $consulta  = "SELECT * FROM social_twittonomy_nuevo WHERE date >= '2014-".$_GET['mes']."-01' AND date <= '2014-".$_GET['mes']."-31' ORDER BY date ASC";
		  $graph->Gestion($consulta);
		  while($data = mysql_fetch_array($graph->Query)){
		    $dia = substr($data['date'],8,2);
			if($day==$dia) { $suma++; } 
		  }
		?>  
		
		  ['<? echo $day; ?>', <? echo $suma; ?>]<? echo ","; ?>
		<? $suma = 0; } ?>
        ]);

        var options = {
          title: 'Publicaciones por día / Twitter <? echo $mes_txt; ?> 2014',
		  curveType: 'function',
		  lineWidth:8,
		  hAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		  vAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		  legend: { position: 'bottom' },
		  fontSize:13,
		  legendFontSize:13,
		  titleFontSize:15,
		  colors:['#88a252','#5f7a18'],
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div10'));
        chart.draw(data, options);
      }
    </script>


<!--POSTS POR DIA-->
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Element', 'Posts'],
		<?
		  for ($x=1; $x<=30; $x++) {
		    if($x<=9) { $day = "0".$x; } else { $day = $x; }
		?>
		<?
		  $suma = 0;
		  $graph = new TConeccion();
		  $consulta  = "SELECT * FROM social_posts WHERE date >= '2014-".$_GET['mes']."-01' AND date <= '2014-".$_GET['mes']."-31' ORDER BY date ASC";
		  $graph->Gestion($consulta);
		  while($data = mysql_fetch_array($graph->Query)){
		    $dia = substr($data['date'],8,2);
			if($day==$dia) { $suma++; } 
		  }
		?>  
		
		  ['<? echo $day; ?>', <? echo $suma; ?>]<? echo ","; ?>
		<? $suma = 0; } ?>
        ]);

        var options = {
          title: 'Publicaciones por día / Facebook <? echo $mes_txt; ?> 2014',
		  curveType: 'function',
		  lineWidth:8,
		  vAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		  legend: { position: 'bottom' },
		  fontSize:13,
		  legendFontSize:13,
		  titleFontSize:15,
		  colors:['#88a252','#5f7a18'],
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div11'));
        chart.draw(data, options);
      }
    </script>

<!--TWEETS POR TIPO-->
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
	  ["Element", "Publicaciones", { role: "style" } ],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM social_twittonomy_nuevo WHERE date >= '2014-".$_GET['mes']."-01' AND date <= '2014-".$_GET['mes']."-31' AND type LIKE 'Reply%'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["Replies", <? echo $suma; ?>, "#5f7a18"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM social_twittonomy_nuevo WHERE date >= '2014-".$_GET['mes']."-01' AND date <= '2014-".$_GET['mes']."-31' AND type LIKE 'Retweet%'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["Retweets", <? echo $suma; ?>, "#4e632e"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM social_twittonomy_nuevo WHERE date >= '2014-".$_GET['mes']."-01' AND date <= '2014-".$_GET['mes']."-31' AND type = 'New'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["Nuevos", <? echo $suma; ?>, "#88a252"],
	  ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
	    { calc: "stringify",
		  sourceColumn: 1,
		  type: "string",
		  role: "annotation" },
      2]);

      var options = {
	    title: "Publicaciones por tipo / Twitter <? echo $mes_txt; ?> 2014",
		fontSize:12,
		legendfontSize:12,
		titleFontSize:15,
		hAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		vAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		colors:['#88a252','#5f7a18'],
		legend: { position: 'none', maxLines: 3 },
		bar: {groupWidth: "85%"},
		seriesType: "bars",
		series: {1: {type: "line",lineWidth: 5, pointSize: 8}}
      };

      var chart = new google.visualization.ColumnChart(document.getElementById("chart_div11A2"));
      chart.draw(view, options);
  }
</script>


<!--POST POR TIPO-->
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
	  ["Element", "Publicaciones", { role: "style" } ],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM social_posts WHERE date >= '2014-".$_GET['mes']."-01' AND date <= '2014-".$_GET['mes']."-31' AND tipo LIKE '%estado'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["Actualización", <? echo $suma; ?>, "#5f7a18"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM social_posts WHERE date >= '2014-".$_GET['mes']."-01' AND date <= '2014-".$_GET['mes']."-31' AND tipo = 'Compartir'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["Enlace", <? echo $suma; ?>, "#4e632e"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM social_posts WHERE date >= '2014-".$_GET['mes']."-01' AND date <= '2014-".$_GET['mes']."-31' AND tipo = 'Foto'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma++; }
	  ?>
	    ["Foto", <? echo $suma; ?>, "#88a252"],
	  ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
	    { calc: "stringify",
		  sourceColumn: 1,
		  type: "string",
		  role: "annotation" },
      2]);

      var options = {
	    title: "Publicaciones por tipo / Facebook <? echo $mes_txt; ?> 2014",
		fontSize:12,
		legendfontSize:12,
		titleFontSize:15,
		hAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		vAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		colors:['#88a252','#5f7a18'],
		legend: { position: 'none', maxLines: 3 },
		bar: {groupWidth: "85%"},
		seriesType: "bars",
		series: {1: {type: "line",lineWidth: 5, pointSize: 8}}
      };

      var chart = new google.visualization.ColumnChart(document.getElementById("chart_div11B"));
      chart.draw(view, options);
  }
</script>

<!--ALCANCE POR TIPO DE PUBLICACIÓN-->
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
	  ["Element", "Publicaciones", { role: "style" } ],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM social_posts WHERE date >= '2014-".$_GET['mes']."-01' AND date <= '2014-".$_GET['mes']."-31' AND tipo LIKE '%estado'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma = $suma+$data['alcance']; }
		$resultado_status = $suma/1000;
	  ?>
	    ["Actualización", <? echo number_format($resultado_status,1); ?>, "#5f7a18"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM social_posts WHERE date >= '2014-".$_GET['mes']."-01' AND date <= '2014-".$_GET['mes']."-31' AND tipo = 'Compartir'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma = $suma+$data['alcance']; }
		$resultado_enlace = $suma/1000;
	  ?>
	    ["Enlace", <? echo number_format($resultado_enlace,1); ?>, "#4e632e"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM social_posts WHERE date >= '2014-".$_GET['mes']."-01' AND date <= '2014-".$_GET['mes']."-31' AND tipo = 'Foto'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma = $suma+$data['alcance']; }
		$resultado_foto = $suma/1000;
	  ?>
	    ["Foto", <? echo number_format($resultado_foto,1); ?>, "#88a252"],
	  ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
	    { calc: "stringify",
		  sourceColumn: 1,
		  type: "string",
		  role: "annotation" },
      2]);

      var options = {
	    title: "Alcance de publicaciones / Facebook <? echo $mes_txt; ?> 2014",
		fontSize:12,
		legendfontSize:12,
		titleFontSize:15,
		hAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		vAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		colors:['#88a252','#5f7a18'],
		legend: { position: 'none', maxLines: 3 },
		bar: {groupWidth: "85%"},
		seriesType: "bars",
		series: {1: {type: "line",lineWidth: 5, pointSize: 8}}
      };

      var chart = new google.visualization.ColumnChart(document.getElementById("chart_div11C"));
      chart.draw(view, options);
  }
</script>


<!--INTERACCIÓN POR TIPO DE PUBLICACIÓN-->
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
	  ["Element", "Publicaciones", { role: "style" } ],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM social_posts WHERE date >= '2014-".$_GET['mes']."-01' AND date <= '2014-".$_GET['mes']."-31' AND tipo LIKE '%estado%'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma = $suma+$data['engagement']; }
		$resultado = $suma;
	  ?>
	    ["Actualización", <? echo number_format($resultado,1); ?>, "#5f7a18"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM social_posts WHERE date >= '2014-".$_GET['mes']."-01' AND date <= '2014-".$_GET['mes']."-31' AND tipo = 'Compartir'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma = $suma+$data['engagement']; }
		$resultado = $suma;
	  ?>
	    ["Enlace", <? echo number_format($resultado,1); ?>, "#4e632e"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT * FROM social_posts WHERE date >= '2014-".$_GET['mes']."-01' AND date <= '2014-".$_GET['mes']."-31' AND tipo = 'Foto'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma = $suma+$data['comment']+$data['likes']; }
		$resultado = $suma;
	  ?>
	    ["Foto", <? echo number_format($resultado,1); ?>, "#88a252"],
	  ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
	    { calc: "stringify",
		  sourceColumn: 1,
		  type: "string",
		  role: "annotation" },
      2]);

      var options = {
	    title: "Interacciones por tipo / Facebook <? echo $mes_txt; ?> 2014",
		fontSize:12,
		legendfontSize:12,
		titleFontSize:15,
		hAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		vAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		colors:['#88a252','#5f7a18'],
		legend: { position: 'none', maxLines: 3 },
		bar: {groupWidth: "85%"},
		seriesType: "bars",
		series: {1: {type: "line",lineWidth: 5, pointSize: 8}}
      };

      var chart = new google.visualization.ColumnChart(document.getElementById("chart_div11D"));
      chart.draw(view, options);
  }
</script>


<!--INTERACCIÓN POR TIPO DE PUBLICACIÓN EN TWITTER-->
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
	  ["Element", "Publicaciones", { role: "style" } ],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT favorite FROM social_twittonomy_nuevo WHERE date >= '2014-".$_GET['mes']."-01' AND date <= '2014-".$_GET['mes']."-31' AND type = 'New'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma = $suma+$data['favorite']; }
		$resultado = $suma;
	  ?>
	    ["Favoritos", <? echo $resultado; ?>, "#4e632e"],
	  <?
	    $suma = 0;
		$graph = new TConeccion();
		$consulta  = "SELECT retweet FROM social_twittonomy_nuevo WHERE date >= '2014-".$_GET['mes']."-01' AND date <= '2014-".$_GET['mes']."-31' AND type = 'New'";
		$graph->Gestion($consulta);
		while($data = mysql_fetch_array($graph->Query)){ $suma = $suma+$data['retweet']; }
		$resultado = $suma;
	  ?>
	    ["Retweets", <? echo $resultado; ?>, "#88a252"],
	  ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
	    { calc: "stringify",
		  sourceColumn: 1,
		  type: "string",
		  role: "annotation" },
      2]);

      var options = {
	    title: "Interacciones por tipo / Twitter <? echo $mes_txt; ?> 2014",
		fontSize:12,
		legendfontSize:12,
		titleFontSize:15,
		hAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		vAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		colors:['#88a252','#5f7a18'],
		legend: { position: 'none', maxLines: 3 },
		bar: {groupWidth: "85%"},
		seriesType: "bars",
		series: {1: {type: "line",lineWidth: 5, pointSize: 8}}
      };

      var chart = new google.visualization.ColumnChart(document.getElementById("chart_div11M"));
      chart.draw(view, options);
  }
</script>


<!--INTERACCIONES CON SEGUIDORES INSTITUCIONALES-->
<?
  $seguidor = 0;
  $total = 0;
  $graph = new TConeccion();
  $consulta  = "SELECT * FROM social_institucionales";
  $graph->Gestion($consulta);
  while($data = mysql_fetch_array($graph->Query)){
  }
?>
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
	  ['Mes', 'Interacciones', 'Proyección' ],
	  ['Jul', 78, 20],
	  ['Ago', 0, 20],
	  ['Sep', 0, 20],
	  ['Oct', 0, 20],
	  ['Nov', 0, 20],
	  ['Dic', 0, 20],
    ]);
	
	var options = {
	  title : 'Total de interacciones con cuentas institucionales / Twitter <? echo $mes_txt; ?> 2014',
	  fontSize:11,
	  legendfontSize:11,
	  titleFontSize:15,
	  width: 550,
	  height: 400,
	  legend: { position: 'bottom', maxLines: 3 },
	  colors:['#88a252','#4e632e'],
	  bar: { groupWidth: '75%' },
	  isStacked: true,
	  hAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
	  vAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
	  series: {1: {type: "line",lineWidth: 1, pointSize: 10}}
	};
	
	var chart = new google.visualization.BarChart(document.getElementById('chart_div11E'));
	chart.draw(data, options);
  }
</script>

<!--INTERACCIONES CON JÓVENES-->
<?
  $seguidor = 0;
  $total = 0;
  $graph = new TConeccion();
  $consulta  = "SELECT * FROM social_institucionales";
  $graph->Gestion($consulta);
  while($data = mysql_fetch_array($graph->Query)){
  }
?>
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
	  ['Mes', 'Interacciones', 'Faltantes', 'Proyección' ],
	  <? if($_GET['mes']>='04') { ?>['1T', 0, 15, 15],<? ; }?>
	  <? if($_GET['mes']>='05') { ?>['1T', 68, 0, 15],<? ; }?>
	  <? if($_GET['mes']>='06') { ?>['1T', 21, 0, 15],<? ; }?>
	  <? if($_GET['mes']=='07') { ?>['2T', 61, 0, 20],<? ; }?>
	  ['3T', 0, 0, 25],
    ]);
	
	var options = {
	  title : 'Promedio de interacciones por publicación dirigida a jóvenes / Facebook <? echo $mes_txt; ?> 2014',
	  fontSize:11,
	  legendfontSize:11,
	  titleFontSize:15,
	  width: 550,
	  height: 275,
	  legend: { position: 'bottom', maxLines: 3 },
	  colors:['#88a252','#ddd', '#4e632e'],
	  bar: { groupWidth: '75%' },
	  isStacked: true,
	  hAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
	  vAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
	  series: {2: {type: "line",lineWidth: 1, pointSize: 10}}
	};
	
	var chart = new google.visualization.BarChart(document.getElementById('chart_div11H'));
	chart.draw(data, options);
  }
</script>


<!--TRÁFICO DIRIGIDO AL PORTAL-->
<script type="text/javascript">
  google.load('visualization', '1.0', {'packages':['corechart']});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = new google.visualization.DataTable();
	data.addColumn('string', 'Topping');
	data.addColumn('number', 'Slices');
	data.addRows([	
	  ['Facebook', 4162],
	  ['Twitter', 911],
	  ['Otros', 246]
	]);
	
	var options = {
	  title:"Visitas al portal desde redes sociales, <? echo $mes_txt; ?> 2014",
	  is3D: true,
	  fontSize:11,
	  legendfontSize:11,
	  titleFontSize:15,
	  colors:['#88a252','#5f7a18', '#4e632e'],
	  legend: { position: 'bottom', maxLines: 3 }
	};
	
	var chart = new google.visualization.PieChart(document.getElementById('chart_div12'));
	chart.draw(data, options);
  }
</script>
   
<!--TRÁFICO DIRIGIDO AL PORTAL VISITAS ACUMULADAS-->
<script type="text/javascript">
  function drawVisualization() {
    var data = google.visualization.arrayToDataTable([
	  ['Mes', 'Visitas', 'Proyección'],
	  ['Ene',  15800, 15800],
	  ['Feb',  36750, 36750],
	  ['Mar',  56150, 56150],
	  ['Abr',  70937, 76000],
	  ['May',  89800, 98600],
	  ['Jun',  107914, 124500],
	  ['Jul',  113233, 151000],
	  ['Ago',  0,	180650],
	  ['Sep',  0,	208000],
	  ['Oct',  0,	235000],
	  ['Nov',  0,	255000],
	  ['Dic',  0,	266000]
    ]);
	
	var options = {
	  title : 'Acumulado de visitas al portal, 2014',
	  fontSize:10,
	  legendfontSize:10,
	  titleFontSize:15,
	  hAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
	  vAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
	  colors:['#88a252','#5f7a18'],
	  legend: { position: 'bottom', maxLines: 3 },
	  seriesType: "bars",
	  series: {1: {type: "line",lineWidth: 1, pointSize: 10}}	 
    };
	
	var chart = new google.visualization.ComboChart(document.getElementById('chart_div13'));
        chart.draw(data, options);
  }
  google.setOnLoadCallback(drawVisualization);
</script>

<!--PUBLICACIONES A CUENTAS INSTITUCIONALES-->
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
	  ['Genre', 'Publicaciones', 'Faltantes', 'Proyección' ],
	  ['Abr', 0, 20, 20],
	  ['May', 0, 0, 20],
	  ['Jun', 0, 0, 20],
	  ['Jul', 0, 0, 20],
	  ['Ago', 0, 0, 20],
	  ['Sep', 0, 0, 20],
	  ['Oct', 0, 0, 20],
	  ['Nov', 0, 0, 20],
	  ['Dic', 0, 0, 20],
    ]);
	
	var options = {
	  title : 'Mensajes a cuentas institucionales / Twitter 2014',
	  fontSize:11,
	  legendfontSize:11,
	  titleFontSize:15,
	  width: 600,
	  height: 400,
	  legend: { position: 'bottom', maxLines: 3 },
	  colors:['#88a252','#ddd', '#4e632e'],
	  bar: { groupWidth: '75%' },
	  isStacked: true,
	  hAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
	  vAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
	  series: {2: {type: "line",lineWidth: 1, pointSize: 10}}
	};
	
	var chart = new google.visualization.BarChart(document.getElementById('chart_div21'));
	chart.draw(data, options);
  }
</script>

<!--COMPARATIVO TWITTER-->
<script type="text/javascript">
google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
	  ["Element", "Miles de suscriptores", { role: "style" } ],
	  <?
	    $Coneccion = new TConeccion();
		$consulta  = "SELECT * FROM social_comparativo WHERE date >= '2014-".$_GET['mes']."-01' AND date <= '2014-".$_GET['mes']."-31'";
		$Coneccion->Gestion($consulta);
		$row = mysql_fetch_array($Coneccion->Query);
	  ?>
	  ["ManpowerMeCA", <? echo $row['ManpowerMeCA']; ?>, "#4E632E"],
	  ["empleogob_mx", <? echo $row['empleogob_mx']; ?>, "#5F7A18"],
	  ["OCCMundial", <? echo $row['OCCMundial']; ?>, "#88a252"],
    ]);
	
	var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
	    { calc: "stringify",
		  sourceColumn: 1,
		  type: "string",
		  role: "annotation" },
      2]);

      var options = {
	    title: "Comparativo de seguidores (miles) / Twitter <? echo $mes_txt; ?> 2014",
		fontSize:12,
		legendfontSize:13,
		titleFontSize:15,
		hAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0, textPosition: 'out'},
		vAxis: {gridlines: {color: '#ccc', count: 4}, baseline:0},
		colors:['#88a252','#5f7a18'],
		legend: {position: 'bottom', maxLines: 3 },
		bar: {groupWidth: "85%"},
		seriesType: "bars",
		series: {1: {type: "line",lineWidth: 5, pointSize: 8}}
      };

      var chart = new google.visualization.ColumnChart(document.getElementById("chart_div30A"));
      chart.draw(view, options);
  }
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
</script>
</head>


<body>
<div align="center">
<div id="contenido">
<form name="form" id="form">
  <select name="jumpMenu" id="jumpMenu" onChange="MM_jumpMenu('parent',this,0)">
    <option value="index.php">Seleccione...</option>
    <option value="index.php?mes=02">Febrero</option>
    <option value="index.php?mes=03">Marzo</option>
    <option value="index.php?mes=04">Abril</option>
    <option value="index.php?mes=05">Mayo</option>
	<option value="index.php?mes=06">Junio</option>
  </select>
</form>
<div align="center"><img src="encuesta/img/expertaria.png"></div>
<h1>Presentación</h1>
<p>Este es un texto breve</p>
<h1>I. Suscriptores</h1>
<h2>1. Nuevas suscripciones</h2>
<? $nuevos_seguidores = $followers_month06/1000; $prom_followers = $followers_month06/30; ?>
<div style="width:575px;float:left; margin:0px;">
  <div style="padding:0px;width:575px;"><p>En Twitter se obtuvieron <b><? echo number_format($nuevos_seguidores,1); ?></b> mil nuevos seguidores en el mes, un promedio diario de <? echo number_format($prom_followers,1); ?></p></div>
  <div id="chart_div01" style="width:575px;height:275px;border:#FFF solid 1px;margin:0px;"></div>
</div>

<? $nuevos_megusta = $megusta_month06/1000; $prom_megusta = $megusta_month06/30; ?>
<div style="width:575px; float:left; margin:0px;">
  <div style="padding:0px;width:575px;"><p>En Facebook se obtuvieron <b><? echo number_format($nuevos_megusta,1); ?></b> mil nuevos me gusta en el mes, un promedio diario de <? echo number_format($prom_megusta,1); ?></p></div>
  <div id="chart_div02" style="width:575px;height:275px;border:#FFF solid 1px;margin:0px;"></div>
</div>
<div style="clear:both"></div>

<p>El día con la mayor cantidad de suscriptores en Twitter fue el <b><? echo $mas_seguidores_dia; ?></b>, con <b><? echo $mas_seguidores_qty; ?> nuevos seguidores</b>. En tanto, en Facebook el día con mayor cantidad suscriptores fue el <b><? echo $mas_megusta_dia; ?></b> con <b><? echo $mas_megusta_qty; ?> nuevos me gusta</b>.</p>

<div style="width:575px; float:left; margin:0px;">
  <div id="chart_div03" style="width:575px;height:275px;float:left;border:#FFF solid 1px;margin:0px;"></div>
</div>
<div style="width:575px; float:left; margin:0px;">
  <div id="chart_div04" style="width:575px;height:275px;float:left;border:#FFF solid 1px;margin:0px;"></div>
</div>
<div style="clear:both;"></div>

<div style="width:575px; float:left; margin:0px;">
  <p>El total acumulado de suscriptores en Twitter fue de <b><? echo number_format($acumulado_seguidores,1); ?> mil seguidores.</b></p>
  <div id="chart_div05" style="width:575px;height:275px;float:left;border:#FFF solid 1px;margin:0px;"></div>
</div>

<div style="width:575px; float:left; margin:0px;">
  <p>El total acumulado de suscriptores en Facebook fue de <b><? echo number_format($acumulado_megusta,1); ?> mil me gusta.</b></p>
  <div id="chart_div06" style="width:575px;height:275px;float:left;border:#FFF solid 1px;margin:0px;"></div>
</div>
<div style="clear:both"></div>

<h2>2. Porcentaje de seguidores institucionales en Twitter</h2>

<div style="width:600px; float:left; margin:0px;">
  <p>Se tienen identificadas <? echo $cuentas_institucionales; ?> cuentas institucionales en Twitter, de las cuales <b><? echo $seguidor_inst; ?></b> siguen al Portal del Empleo.</p>
  <div id="chart_div07" style="width:600px;height:400px;float:left;border:#FFF solid 1px;margin:0px;"></div>
</div>
<div style="width:350px; float:left; height:430px; margin:10px; text-align:center;">
<p><b>Cuentas institucionales identificadas en Twitter que no siguen al Portal del Empleo</b></p>
<table width="350px" cellspacing="0">
  <tr>
    <th width="45">No.</th>
    <th>Cuenta</th>
    <th>Categoría</th>
    <th width="65">Estatus</th>
  </tr>
  <?
    $id = 0;
	$Coneccion = new TConeccion();
	$consulta  = "SELECT * FROM social_institucionales WHERE date <= '2014-".$_GET['mes']."-31' AND status = 0 AND active = 0 ORDER BY categoria ASC, cuenta ASC";
	$Coneccion->Gestion($consulta);
	while($row = mysql_fetch_array($Coneccion->Query)){
	  $id++;
  ?>
  <tr>
    <td align="center"><? echo $id; ?>.</td>
    <td><div align="left"><a href="http://twitter.com/<? echo utf8_encode($row['cuenta']); ?>" target="_blank">@<? echo utf8_encode($row['cuenta']); ?></a></div></td>
    <td><div align="center"><? echo utf8_encode($row['categoria']); ?></div></td>
    <td><div align="center">No sigue</div></td>
  </tr>
  <? } ?>
</table>
</div>
<div style="clear:both;"></div>
<div style="width:965px; text-align:center">
<p><b>Cuentas institucionales identificadas en Twitter que ya siguen al Portal del Empleo</b></p>
<div style="width:300px; margin:10px; margin-top:0px; float:left;">
<table width="300px" cellspacing="0">
  <tr>
    <th width="45">No.</th>
    <th>Cuenta</th>
    <th>Categoría</th>
  </tr>
  <?
    $id = 0;
	$Coneccion = new TConeccion();
	$consulta  = "SELECT * FROM social_institucionales WHERE date <= '2014-".$_GET['mes']."-31' AND status = 1 AND active = 0 ORDER BY categoria ASC, cuenta ASC LIMIT 0,20";
	$Coneccion->Gestion($consulta);
	while($row = mysql_fetch_array($Coneccion->Query)){
	  $id++;
  ?>
  <tr>
    <td align="center"><? echo $id; ?>.</td>
    <td><div align="left"><a href="http://twitter.com/<? echo utf8_encode($row['cuenta']); ?>" target="_blank">@<? echo utf8_encode($row['cuenta']); ?></a></div></td>
    <td><div align="center"><? echo utf8_encode($row['categoria']); ?></div></td>
  </tr>
  <? } ?>
</table>
</div>
<div style="width:300px; margin:10px; margin-top:0px; float:left;">
<table width="300px" cellspacing="0">
  <tr>
    <th width="45">No.</th>
    <th>Cuenta</th>
    <th>Categoría</th>
  </tr>
  <?
    $id = 20;
	$Coneccion = new TConeccion();
	$consulta  = "SELECT * FROM social_institucionales WHERE date <= '2014-".$_GET['mes']."-31' AND status = 1 AND active = 0 ORDER BY categoria ASC, cuenta ASC LIMIT 20,20";
	$Coneccion->Gestion($consulta);
	while($row = mysql_fetch_array($Coneccion->Query)){
	  $id++;
  ?>
  <tr>
    <td align="center"><? echo $id; ?>.</td>
    <td><div align="left"><a href="http://twitter.com/<? echo utf8_encode($row['cuenta']); ?>" target="_blank">@<? echo utf8_encode($row['cuenta']); ?></a></div></td>
    <td><div align="center"><? echo utf8_encode($row['categoria']); ?></div></td>
  </tr>
  <? } ?>
</table>
</div>
<div style="width:300px; margin:10px; margin-top:0px; float:left;">
<table width="300px" cellspacing="0">
  <tr>
    <th width="45">No.</th>
    <th>Cuenta</th>
    <th>Categoría</th>
  </tr>
  <?
    $id = 40;
	$Coneccion = new TConeccion();
	$consulta  = "SELECT * FROM social_institucionales WHERE date <= '2014-".$_GET['mes']."-31' AND status = 1 AND active = 0 ORDER BY categoria ASC, cuenta ASC LIMIT 40,20";
	$Coneccion->Gestion($consulta);
	while($row = mysql_fetch_array($Coneccion->Query)){
	  $id++;
  ?>
  <tr>
    <td align="center"><? echo $id; ?>.</td>
    <td><div align="left"><a href="http://twitter.com/<? echo utf8_encode($row['cuenta']); ?>" target="_blank">@<? echo utf8_encode($row['cuenta']); ?></a></div></td>
    <td><div align="center"><? echo utf8_encode($row['categoria']); ?></div></td>
  </tr>
  <? } ?>
</table>
</div>
<div style="clear:both;"></div>
</div>
<div style="clear:both;"></div>
<div style="width:995px; float:left; margin:5px; text-align:center;">
<p><b>Cuentas institucionales identificadas en Twitter que no son consideradas, por inactividad o resistencia a seguir la cuenta del Portal del Empleo</b></p>
<div style="width:310px; margin:10px; margin-top:0px; float:left;">
<table width="310px" cellspacing="0">
  <tr>
    <th width="45">No.</th>
    <th>Cuenta</th>
    <th>Categoría</th>
    <th width="75">Estatus</th>
  </tr>
  <?
    $id = 0;
	$Coneccion = new TConeccion();
	$consulta  = "SELECT * FROM social_institucionales WHERE active = 1 ORDER BY categoria ASC, cuenta ASC LIMIT 0,2";
	$Coneccion->Gestion($consulta);
	while($row = mysql_fetch_array($Coneccion->Query)){
	  $id++;
  ?>
  <tr>
    <td align="center"><? echo $id; ?>.</td>
    <td><div align="left" style="font-size:0.9em;"><a href="http://twitter.com/<? echo utf8_encode($row['cuenta']); ?>" target="_blank">@<? echo utf8_encode($row['cuenta']); ?></a></div></td>
    <td><div align="center" style="font-size:0.9em;"><? echo utf8_encode($row['categoria']); ?></div></td>
    <td><div align="center" style="font-size:0.9em;">No sigue</div></td>
  </tr>
  <? } ?>
</table>
</div><div style="width:310px; margin:5px; margin-top:0px; float:left;">
<table width="310px" cellspacing="0">
  <tr>
    <th width="45">No.</th>
    <th>Cuenta</th>
    <th>Categoría</th>
    <th width="75">Estatus</th>
  </tr>
  <?
	$Coneccion = new TConeccion();
	$consulta  = "SELECT * FROM social_institucionales WHERE active = 1 ORDER BY categoria ASC, cuenta ASC LIMIT 2,2";
	$Coneccion->Gestion($consulta);
	while($row = mysql_fetch_array($Coneccion->Query)){
	  $id++;
  ?>
  <tr>
    <td align="center"><? echo $id; ?>.</td>
    <td><div align="left" style="font-size:0.9em;"><a href="http://twitter.com/<? echo utf8_encode($row['cuenta']); ?>" target="_blank">@<? echo utf8_encode($row['cuenta']); ?></a></div></td>
    <td><div align="center" style="font-size:0.9em;"><? echo utf8_encode($row['categoria']); ?></div></td>
    <td><div align="center" style="font-size:0.9em;">No sigue</div></td>
  </tr>
  <? } ?>
</table>
</div><div style="width:310px; margin:5px; margin-top:0px; float:left;">
<table width="310px" cellspacing="0">
  <tr>
    <th width="45">No.</th>
    <th>Cuenta</th>
    <th>Categoría</th>
    <th width="75">Estatus</th>
  </tr>
  <?
	$Coneccion = new TConeccion();
	$consulta  = "SELECT * FROM social_institucionales WHERE active = 1 ORDER BY categoria ASC, cuenta ASC LIMIT 4,2";
	$Coneccion->Gestion($consulta);
	while($row = mysql_fetch_array($Coneccion->Query)){
	  $id++;
  ?>
  <tr>
    <td align="center"><? echo $id; ?>.</td>
    <td><div align="left" style="font-size:0.9em;"><a href="http://twitter.com/<? echo utf8_encode($row['cuenta']); ?>" target="_blank">@<? echo utf8_encode($row['cuenta']); ?></a></div></td>
    <td><div align="center" style="font-size:0.9em;"><? echo utf8_encode($row['categoria']); ?></div></td>
    <td><div align="center" style="font-size:0.9em;">No sigue</div></td>
  </tr>
  <? } ?>
</table>
</div>
</div>
<div style="clear:both;"></div>
<h2>3. Perfil de los suscriptores (Facebook)</h2>
<h3>Segmentación por edad y género</h3>
<p>Los grupos de edad más numerosos son los de 18 a 24 años, que representa <b><? echo number_format($porcentaje_g18a24,1); ?> por ciento</b> y el de 25 a 34 años que representa <b><? echo number_format($porcentaje_g25a34,1); ?> por ciento</b>, es decir, en conjunto representan <b><? $conjunto = $porcentaje_g18a24+$porcentaje_g25a34; echo number_format($conjunto,1); ?> por ciento</b>. En un análisis por género, las mujeres representan <b><? echo number_format($porcentaje_mujeres,1); ?> por ciento</b>, mientras los hombres componen el <b><? echo number_format($porcentaje_hombres,1); ?> por ciento</b>.</p>

<div style="width:575px; float:left; margin:0px;">
  <div id="chart_div08" style="width:575px;height:275px;float:left;border:#FFF solid 1px;margin:0px;"></div>
</div>
<div style="width:575px; float:left; margin:0px;">
  <div id="chart_div08B" style="width:575px;height:275px;float:left;border:#FFF solid 1px;margin:0px;"></div>
</div>
<div style="clear:both"></div>

<h2>4. Suscriptores jóvenes de 18-24 años (Facebook)</h2>
<p>Los jóvenes suscriptores de la cuenta, de entre 18 y 24 años, sumaron <b><? echo number_format($g18a24); ?></b> en <? echo $mes_txt; ?> de 2014.</p>
<div id="chart_div08A" style="width:575px;height:275px;float:left;border:#FFF solid 1px;margin:0px;"></div>
<div style="clear:both;"></div>

<h2>5. Segmentación geográfica (Facebook)</h2>
<div style="width:600px; float:left; margin:0px;">
  <div id="chart_div09" style="width:600px;height:300px;float:left;border:#FFF solid 1px;margin:0px;"></div>
</div>
<div style="clear:both;"></div>

<div style="width:575px; float:left; margin:0px;">
<h3>Cantidad de me gusta por país</h3>
<?
  $paises = 0;
  $Coneccion = new TConeccion();
  $consulta  = "SELECT * FROM social_country WHERE date >= '2014-".$_GET['mes']."-01' AND date <= '2014-".$_GET['mes']."-31'";
  $Coneccion->Gestion($consulta);
  while($row = mysql_fetch_array($Coneccion->Query)){ $paises++; }
?>
<p>De una lista de <b><? echo $paises; ?></b> países, los primeros 5 lugares fueron ocupados por:</p>
<table width="390" cellspacing="0">
  <tr>
    <th width="40">Pos.</th>
    <th>País</th>
    <th width="65">Totales</th>
    <th width="60">Nuevos</th>
    <th width="65">Var.</th>
  </tr>
  <?
    $rank = 0;
	$Coneccion = new TConeccion();
	$consulta  = "SELECT * FROM social_country WHERE date >= '2014-".$_GET['mes']."-01' AND date <= '2014-".$_GET['mes']."-31' ORDER BY users DESC LIMIT 5";
	$Coneccion->Gestion($consulta);
	while($row = mysql_fetch_array($Coneccion->Query)){
      $rank++;
	  $country = $row['country_code'];
	  switch ($country) {
	    case "MX":
		  $country_code = "México";
		  break;
	    case "ES":
		  $country_code = "España";
		  break;
	    case "US":
		  $country_code = "Estados Unidos";
		  break;
	    case "CO":
		  $country_code = "Colombia";
		  break;
	    case "CL":
		  $country_code = "Chile";
		  break;
	    case "AR":
		  $country_code = "Argentina";
		  break;
	    case "CR":
		  $country_code = "Costa Rica";
		  break;
	    case "PR":
		  $country_code = "Puerto Rico";
		  break;
	    case "PE":
		  $country_code = "Perú";
		  break;
	    case "VE":
		  $country_code = "Venezuela";
		  break;
	    case "DO":
		  $country_code = "República Dominicana";
		  break;
	    case "PY":
		  $country_code = "Paraguay";
		  break;
	    case "GT":
		  $country_code = "Guatemala";
		  break;
	    case "FR":
		  $country_code = "Francia";
		  break;
	    case "IT":
		  $country_code = "Italia";
		  break;
	  }
  ?>
  <tr>
    <td align="center"><? echo $rank; ?>.</td>
    <td><div align="left"><? echo $country_code; ?><span style="float:right;color:#00F;margin-right:5px;font-weight:bold;">=</span></div></td>
    <td><div align="right"><? echo number_format($row['users']); ?></div></td>
    <?
      $mes_anterior = $_GET['mes']-1;
	  $Coneccion2 = new TConeccion();
	  $consulta2  = "SELECT * FROM social_country WHERE date >= '2014-".$mes_anterior."-01' AND date <= '2014-".$mes_anterior."-31' AND country_code = '".$row['country_code']."'";
	  $Coneccion2->Gestion($consulta2);
	  $fila = mysql_fetch_array($Coneccion2->Query);
	  $nuevos = $row['users']-$fila['users'];
	  $variacion = (($row['users']/$fila['users'])-1)*100;
    ?>
    <td><div align="right"><? echo number_format($nuevos); ?></div></td>
    <td><div align="center">(+<? echo number_format($variacion,1); ?>%)</div></td>
  </tr>
  <? } ?>
</table>
</div>

<div style="width:575px; float:left; margin:0px;">
<h3>Cantidad de me gusta por ciudad</h3>
<?
  $ciudades = 0;
  $Coneccion = new TConeccion();
  $consulta  = "SELECT * FROM social_cities WHERE date >= '2014-".$_GET['mes']."-01' AND date <= '2014-".$_GET['mes']."-31'";
  $Coneccion->Gestion($consulta);
  while($row = mysql_fetch_array($Coneccion->Query)){ $ciudades++; }
?>
<p>De una lista de <b><? echo $ciudades; ?></b> ciudades, las 5 más populares fueron:</p>
<table width="480" cellspacing="0">
  <tr>
    <th width="35">Pos.</th>
    <th>Ciudad</th>
    <th width="65">Totales</th>
    <th width="60">Nuevos</th>
    <th width="65">Var.</th>
  </tr>
  <?
    $rank = 0;
	$Coneccion = new TConeccion();
	$consulta  = "SELECT * FROM social_cities WHERE date >= '2014-".$_GET['mes']."-01' AND date <= '2014-".$_GET['mes']."-31' ORDER BY users DESC LIMIT 5";
	$Coneccion->Gestion($consulta);
	while($row = mysql_fetch_array($Coneccion->Query)){
	  $rank++;
  ?>
  <tr>
    <td align="center"><? echo $rank; ?>.</td>
    <td><div align="left"><? echo utf8_encode($row['city_code']); ?><span style="float:right;color:#00F;margin-right:5px;font-weight:bold;">=</span></div></td>
    <td><div align="right"><? echo number_format($row['users']); ?></div></td>
    <?
      $mes_anterior = $_GET['mes']-1;
	  $Coneccion2 = new TConeccion();
	  $consulta2  = "SELECT * FROM social_cities WHERE date >= '2014-".$mes_anterior."-01' AND date <= '2014-".$mes_anterior."-31' AND city_code = '".$row['city_code']."'";
	  $Coneccion2->Gestion($consulta2);
	  $fila = mysql_fetch_array($Coneccion2->Query);
	  $nuevos = $row['users']-$fila['users'];
	  $variacion = (($row['users']/$fila['users'])-1)*100;
    ?>
    <td><div align="right"><? echo number_format($nuevos); ?></div></td>
    <td><div align="center">(+<? echo number_format($variacion,1); ?>%)</div></td>
  </tr>
  <? } ?>
</table>
</div>
<div style="clear:both;"></div>

<h1>II. Publicaciones</h1>
<h2>1. Nuevas publicaciones (Tweets / Posts)</h2>
<div style="width:575px; float:left; margin:0px;">
  <div id="chart_div09A" style="width:575px;height:275px;border:#FFF solid 1px;margin:0px;"></div>
</div>
<div style="width:575px; float:left; margin:0px;">
  <div id="chart_div09B" style="width:575px;height:275px;border:#FFF solid 1px;margin:0px;"></div>
</div>
<div style="clear:both"></div>


<div style="width:575px; float:left;">
  <div id="chart_div10" style="width:575px;height:275px;float:left;border:#FFF solid 1px;margin:0px;"></div>
</div>
<div style="width:575px; float:left;">
  <div id="chart_div11" style="width:575px;height:275px;float:left;border:#FFF solid 1px;margin:0px;"></div>
</div>
<div style="clear:both"></div>

<div style="width:575px; float:left;">
  <div id="chart_div11A2" style="width:575px;height:275px;float:left;border:#FFF solid 1px;margin:0px;"></div>
</div>
<div style="width:575px; float:left;">
  <div id="chart_div11B" style="width:575px;height:275px;float:left;border:#FFF solid 1px;margin:0px;"></div>
</div>
<div style="clear:both"></div>


<h2>2. Publicaciones más populares (interacciones)</h2>
<div style="width:560px; float:left;">
<h3>Top 5 de interacciones en el mes en Twitter</h3>
<table width="550" cellspacing="0">
  <tr>
    <th width="50">Día</th>
    <th>Tweets</th>
    <th width="35"><img src="retweet.png" border="0"></th>
    <th width="35"><img src="fav.png" border="0"></th>
    <th width="45">Suma</th>
  </tr>
  <?
	$Coneccion = new TConeccion();
	$consulta  = "SELECT * FROM social_twittonomy_nuevo WHERE date >= '2014-".$_GET['mes']."-01' AND date <= '2014-".$_GET['mes']."-31' AND type = 'New' ORDER BY engagement DESC LIMIT 5";
	$Coneccion->Gestion($consulta);
	while($row = mysql_fetch_array($Coneccion->Query)){
  ?>
  <tr>
    <td valign="top"><div align="center"><? echo substr($row['date'],8,2); ?>/<? echo substr($mes_txt,0,3); ?></div></td>
    <td valign="top"><a href="<? echo $row['url']; ?>" target="_blank"><? echo nl2br(utf8_encode($row['text'])); ?></a></td>
    <td valign="top"><div align="center"><? echo $row['retweet']; ?></div></td>
    <td valign="top"><div align="center"><? echo $row['favorite']; ?></div></td>
    <td valign="top"><div align="center"><b><? echo $row['engagement']; ?></b></div></td>
  </tr>
  <? } ?>
</table>
</div>
<div style="width:560px; float:left;">
<h3>Top 5 de interacciones en el mes en Facebook</h3>
<table width="550" cellspacing="0">
  <tr>
    <th width="50">Día</th>
    <th>Posts</th>
    <th width="50">Tipo</th>
    <th width="35"><img src="comment.png" border="0"></th>
    <th width="35"><img src="like.png" border="0"></th>
    <th width="35"><img src="share.png" border="0"></th>
    <th width="45">Suma</th>
  </tr>
  <?
	$Coneccion = new TConeccion();
	$consulta  = "SELECT * FROM social_posts WHERE date >= '2014-".$_GET['mes']."-01' AND date <= '2014-".$_GET['mes']."-31' ORDER BY engagement DESC LIMIT 5";
	$Coneccion->Gestion($consulta);
	while($row = mysql_fetch_array($Coneccion->Query)){
  ?>
  <tr>
    <td valign="top"><div align="center"><? echo substr($row['date'],8,2); ?>/<? echo substr($mes_txt,0,3); ?></div></td>
    <td valign="top"><a href="<? echo $row['url']; ?>" target="_blank"><? if($row['post']!='') { echo utf8_encode($row['post']); } else { echo "<b>-Sin texto-</b>"; } ?></a></td>
    <td valign="top"><div align="center"><? echo $row['tipo']; ?></div></td>
    <td valign="top"><div align="center"><? echo $row['comment']; ?></div></td>
    <td valign="top"><div align="center"><? echo $row['likes']; ?></div></td>
    <td valign="top"><div align="center"><? echo $row['share']; ?></div></td>
    <td valign="top"><div align="center"><b><? echo $row['engagement']; ?></b></div></td>
  </tr>
  <? } ?>
</table>
</div>
<div style="clear:both"></div>
<div style="width:575px; float:left; margin:0px;">
  <div id="chart_div11M" style="width:575px;height:275px;float:left;border:#FFF solid 1px;margin:0px;"></div>
</div>
<div style="width:575px; float:left; margin:0px;">
  <div id="chart_div11D" style="width:575px;height:275px;float:left;border:#FFF solid 1px;margin:0px;"></div>
</div>
<div style="clear:both"></div>

<h2>3. Interacciones con cuentas institucionales (Twitter)</h2>
<div style="width:600px; float:left; margin:0px;">
  <div id="chart_div11E" style="width:600px;height:400px;float:left;border:#FFF solid 1px;margin:0px;"></div>
</div>
<div style="width:575px; float:left; margin:0px;">
  <div id="chart_div11H" style="width:575px;height:275px;float:left;border:#FFF solid 1px;margin:0px;"></div>
</div>
<div style="clear:both"></div>
<h2>5. Principales hashtags (Twitter)</h2>
<?
  $tipsempleo = 0;
  $rt = 0;
  $fv = 0;
  $Coneccion5 = new TConeccion();
  $consulta  = "SELECT * FROM social_twittonomy_nuevo WHERE date >= '2014-".$_GET['mes']."-01' AND date <= '2014-".$_GET['mes']."-31' AND text LIKE '%#TipsEmpleo%' AND type = 'New'";
  $Coneccion5->Gestion($consulta);
  while($hashtag = mysql_fetch_array($Coneccion5->Query)){
	$tipsempleo++;
	$rt = $rt+$hashtag['retweet'];
	$fv = $fv+$hashtag['favorite'];
  }
  echo "<p>El HT <b>#TipsEmpleo</b> ha sido utilizado en <b>".$tipsempleo."</b> ocasiones. Obtuvo ".$rt." retweets y ".$fv." favoritos.</p>";
?>
<?
  $ofertas = 0;
  $rt = 0;
  $fv = 0;
  $Coneccion5 = new TConeccion();
  $consulta  = "SELECT * FROM social_twittonomy_nuevo WHERE date >= '2014-".$_GET['mes']."-01' AND date <= '2014-".$_GET['mes']."-31' AND text LIKE '%#OfertasDestacadas%' AND type = 'New'";
  $Coneccion5->Gestion($consulta);
  while($hashtag = mysql_fetch_array($Coneccion5->Query)){
	$ofertas++;
	$rt = $rt+$hashtag['retweet'];
	$fv = $fv+$hashtag['favorite'];
  }
  echo "<p>El HT <b>#OfertasDestacadas</b> ha sido utilizado en <b>".$ofertas."</b> ocasiones. Obtuvo ".$rt." retweets y ".$fv." favoritos.</p>";
?>
<?
  $sihayempleo = 0;
  $rt = 0;
  $fv = 0;
  $Coneccion5 = new TConeccion();
  $consulta  = "SELECT * FROM social_twittonomy_nuevo WHERE date >= '2014-".$_GET['mes']."-01' AND date <= '2014-".$_GET['mes']."-31' AND text LIKE '%#SiHayEmpleo%' AND type = 'New'";
  $Coneccion5->Gestion($consulta);
  while($hashtag = mysql_fetch_array($Coneccion5->Query)){
	$sihayempleo++;
	$rt = $rt+$hashtag['retweet'];
	$fv = $fv+$hashtag['favorite'];
  }
  echo "<p>El HT <b>#SiHayEmpleo</b> ha sido utilizado en <b>".$sihayempleo."</b> ocasiones. Obtuvo ".$rt." retweets y ".$fv." favoritos.</p>";
?>
<?
  $feriaempleomx = 0;
  $rt = 0;
  $fv = 0;
  $Coneccion5 = new TConeccion();
  $consulta  = "SELECT * FROM social_twittonomy_nuevo WHERE date >= '2014-".$_GET['mes']."-01' AND date <= '2014-".$_GET['mes']."-31' AND text LIKE '%#FeriaEmpleoMX%'";
  $Coneccion5->Gestion($consulta);
  while($hashtag = mysql_fetch_array($Coneccion5->Query)){
	$feriaempleomx++;
	$rt = $rt+$hashtag['retweet'];
	$fv = $fv+$hashtag['favorite'];
  }
  echo "<p>El HT <b>#FeriaEmpleoMX</b> ha sido utilizado en <b>".$feriaempleomx."</b> ocasiones. Obtuvo ".$rt." retweets y ".$fv." favoritos.</p>";
?>
<h2>6. Alcance por tipo de publicación (Facebook)</h2>
<div style="width:575px; float:left; margin:0px;">
  <div id="chart_div11C" style="width:575px;height:275px;float:left;border:#FFF solid 1px;"></div>
</div>
<div style="width:575px; float:left; margin:10px;">
  <table width="300" cellspacing="0">
    <tr>
      <th width="200">Tipo de publicación</th>
      <th width="100">Alcance total</th>
    </tr>
    <tr>
      <td align="left">Foto</td>
      <td align="center"><? echo number_format($resultado_foto,1); ?> mil</td>
    </tr>
    <tr>
      <td align="left">Enlace</td>
      <td align="center"><? echo number_format($resultado_enlace,1); ?> mil</td>
    </tr>
    <tr>
      <td align="left">Actualización de estado</td>
      <td align="center"><? echo number_format($resultado_status,1); ?> mil</td>
    </tr>
    <? $resultado_total = $resultado_foto+$resultado_enlace+$resultado_status; ?>
    <tr>
      <th width="200"><div align="right">Total&nbsp;&nbsp;</div></th>
      <th width="100"><? echo number_format($resultado_total,1); ?> mil</th>
    </tr>
  </table>
</div>
<div style="clear:both"></div>

<h1>IV. Tráfico llevado hacia el Portal del Empleo</h1>
<div style="width:575px; float:left; margin:0px;">
  <div id="chart_div12" style="width:575px;height:300px;float:left;border:#FFF solid 1px;margin:0px;"></div>
</div>
<div style="width:575px; float:left; margin:0px;">
  <div id="chart_div13" style="width:575px;height:300px;float:left;border:#FFF solid 1px;margin:0px;"></div>
</div>
<div style="clear:both"></div>
  <table width="300" cellspacing="0">
    <tr>
      <th width="200">Fuente de tráfico</th>
      <th width="100">Alcance total</th>
    </tr>
    <tr>
      <td align="left">Facebook</td>
      <td align="center">4,162</td>
    </tr>
    <tr>
      <td align="left">Twitter</td>
      <td align="center">911</td>
    </tr>
    <tr>
      <td align="left">Otras</td>
      <td align="center">246</td>
    </tr>
    <tr>
      <th width="200"><div align="right">Total&nbsp;&nbsp;</div></th>
      <th width="100"><div align="center">5,319</div></th>
    </tr>
  </table>
<h1>V. Entorno (Twitter)</h1>
<h2>1. Comparativo</h2>
<div id="chart_div30A" style="width:630px;height:275px;float:left;border:#FFF solid 1px;margin:0px;"></div>
<div style="clear:both"></div>
<h1>VI. Seguimiento y recomendaciones</h1>
<h2>1. Avance de metas 2014</h2>
<img src="mapaderuta_<? echo $_GET['mes']; ?>.png" width="675">
<div style="width:800; text-align:center;"><p><b>Tabla de avance de metas 2014</b></p></div>
<table width="800" cellspacing="0">
  <tr>
    <th>Meta</th>
    <th width="300">Indicadores</th>
    <th width="80"><div align="center">Meta esperada</div></th>
    <th width="80"><div align="center">Resultado obtenido</div></th>
    <th width="90"><div align="center">Avance</div></th>
  </tr>
  <tr>
    <td valign="top"><b>Meta 1.</b> Obtención como seguidores del Portal del Empleo al 100% de las cuentas institucionales identificadas en Twitter durante el primer trimestre y entre 95 y 100 en los trimestres posteriores</td>
    <td valign="top"><div align="left">Porcentaje por mes de seguidores de cuentas institucionales<br><br>
      <strong>Fórmula:<br>
      </strong><em>=Mes { (Seguidores institucionales / Cuentas identificadas) / Porcentaje esperado }</em></div></td>
    <td valign="top"><div align="center">100%</div></td>
    <td valign="top"><div align="center">83.9%</div></td>
    <td valign="top"><div align="center">&nbsp;83.9%&nbsp;<img src="green.png" width="14" height="14"></div></td>
  </tr>
  <tr>
    <td valign="top"><b>Meta 2.</b> Obtención mensual de al menos 20 interacciones en Twitter con cuentas institucionales a partir del segundo trimestre de operación</td>
    <td valign="top"><div align="left">Interacciones por mes con cuentas institucionales<br><br>
    <strong>Fórmula:</strong> <em>=Mes { Retweets + Replies + Favoritos / Publicaciones a cuentas institucionales }</em></div></td>
    <td valign="top"><div align="center">20</div></td>
    <td valign="top"><div align="center">78</div></td>
    <td valign="top"><div align="center">390%&nbsp;<img src="green.png" alt="" width="14" height="14"></div></td>
  </tr>
  <tr>
    <td valign="top"><b>Meta 3.</b> Alcance de al menos 50% más visitas al Portal del Empleo durante 2014 con relación a 2013</td>
    <td valign="top"><div align="left">Visitas al Portal del Empleo desde redes sociales<br><br>
    <strong>Fórmula:<br>
    </strong><em>= Mes { Visitas acumuladas al portal desde redes sociales en 2014 / ( Visitas acumuladas al portal desde redes sociales en 2013  * 1.5 ) }</em></div></td>
    <td valign="top"><div align="center">151,000</div></td>
    <td valign="top"><div align="center">113,233</div></td>
    <td valign="top"><div align="center">&nbsp;74.9%&nbsp;<img src="yellow.png" alt="" width="14" height="14"></div></td>
  </tr>
  <tr>
    <td rowspan="2" valign="top"><b>Meta 4.</b> Incremento de al menos 10% en la cantidad de suscripciones cada trimestre</td>
    <td valign="top"><div align="left">Cantidad de seguidores acumulados en el trimestre<br><br>
    <strong>Fórmula:<br>
    </strong><em>= Mes { Seguidores acumulados / Seguidores esperados }</em></div></td>
    <td valign="top"><div align="center">38,900</div></td>
    <td valign="top"><div align="center">37,941</div></td>
    <td valign="top"><div align="center">&nbsp;97.5%&nbsp;<img src="green.png" alt="" width="14" height="14"></div></td>
  </tr>
  <tr>
    <td valign="top"><div align="left">Cantidad de me gusta acumulados en el trimestre<br><br>
    <strong>Fórmula:<br>
    </strong><em>= Mes { Me gusta acumulados / Me gusta esperados }</em></div></td>
    <td valign="top"><div align="center">22,950</div></td>
    <td valign="top"><div align="center">23,023</div></td>
    <td valign="top"><div align="center">&nbsp;100.3%&nbsp;<img src="green.png" alt="" width="14" height="14"></div></td>
  </tr>
  <tr>
    <td rowspan="2" valign="top"><b>Meta 5.</b> Incremento trimestral de 30% en las interacciones promedio por publicación</td>
    <td valign="top"><div align="left">Interacciones en promedio por publicación en Twitter<br><br>
    <strong>Fórmula:<br>
    </strong><em>= Mes { Total [Retweets + Replies + Favoritos] / Total de tweets }</em></div></td>
    <td valign="top"><div align="center">6.5</div></td>
    <td valign="top"><div align="center">1.2</div></td>
    <td valign="top"><div align="center">&nbsp;18.5%&nbsp;<img src="red.png" alt="" width="14" height="14"></div></td>
  </tr>
  <tr>
    <td valign="top"><div align="left">Interacciones en promedio por publicación en Facebook<br>
        <br>
        <strong>Fórmula:<br>
        </strong><em>= Mes { Total [Me gusta + Comentarios + Compartir] / Total de posts }</em></div></td>
    <td valign="top"><div align="center">12</div></td>
    <td valign="top"><div align="center">27.8</div></td>
    <td valign="top"><div align="center">231.7%&nbsp;<img src="green.png" alt="" width="14" height="14"></div></td>
  </tr>
  <tr>
    <td valign="top"><b>Meta 6.</b> Alcance de al menos 15 mil &quot;me gusta&quot; de usuarios entre 18 y 24 años de edad en la página de Facebook al cierre de 2014</td>
    <td valign="top"><div align="left">Cantidad de me gusta de usuarios entre 18 y 24 años acumulados en el trimestre<br>
      <br>
      <strong>Fórmula:<br>
      </strong><em>= Mes { Suscripciones acumuladas de jóvenes entre 18 y 24 años / Suscripciones esperadas de jóvenes entre 18 y 24 años }</em></div></td>
    <td valign="top"><div align="center">12,000</div></td>
    <td valign="top"><div align="center">9,668</div></td>
    <td valign="top"><div align="center">&nbsp;80.6%&nbsp;<img src="green.png" alt="" width="14" height="14"></div></td>
  </tr>
  <tr>
    <td valign="top"><b>Meta 7.</b> Obtención durante el primer trimestre de operación entre 12 y 15 interacciones en promedio por publicación en Facebook dirigida a jóvenes e incrementarlo trimestralmente en 30%</td>
    <td valign="top"><div align="left">Interacciones en promedio por publicación en Facebook dirigida a jóvenes<br>
      <br>
      <strong>Fórmula:<br>
      </strong><em>= Mes { Posts dirigidos a jóvenes [Me gusta + Comentarios + Compartir] / Total de posts dirigidos a jóvenes }</em></div></td>
    <td valign="top"><div align="center">20</div></td>
    <td valign="top"><div align="center">61</div></td>
    <td valign="top"><div align="center">305.0%&nbsp;<img src="green.png" alt="" width="14" height="14"></div></td>
  </tr>
</table>
<h2>2. Infotec sugiere</h2>
<h2>3. Acuerdos y compromisos</h2>
<table width="800" cellspacing="0">
  <tr>
    <th width="100">Clave</th>
    <th>Descripción</th>
    <th width="100">Responsable</th>
    <th width="90">Fecha inicio</th>
    <th width="90">Fecha fin</th>
    <th width="70">Estatus</th>
  </tr>
  <tr>
    <td valign="top"><div align="center">01-201405/M7</div></td>
    <td valign="top">Publicación de 2 posts dirigidos a jóvenes, una vez a la semana durante cuatro semanas, utilizando el hashtag <b>#MiPrimerEmpleo</b></td>
    <td valign="top"><div align="center">STPS-CGSNE</div></td>
    <td valign="top"><div align="center">21/May/2014</div></td>
    <td valign="top"><div align="center">Indefinido</div></td>
    <td valign="top"><div align="center">En proceso</div></td>
  </tr>
  <tr>
    <td valign="top"><div align="center">02-201405/M5</div></td>
    <td valign="top">Publicación de 5 tweets, una vez a la semana durante cuatro semanas, citando a cuentas institucionales que aún no siguen al Portal del Empleo</td>
    <td valign="top"><div align="center">STPS-CGSNE</div></td>
    <td valign="top"><div align="center">21/May/2014</div></td>
    <td valign="top"><div align="center">Indefinido</div></td>
    <td valign="top"><div align="center">En proceso</div></td>
  </tr>
  <tr>
    <td valign="top"><div align="center">03-201406/M1</div></td>
    <td valign="top">Citar al menos una vez a la semana a las cuentas <strong>@SNEMorelosMX</strong> y <strong>@SNENayarit</strong> con un enlace a las ofertas de empleo en sus respectivas entidades</td>
    <td valign="top"><div align="center">STPS-CGSNE</div></td>
    <td valign="top"><div align="center">17/Jun/2014</div></td>
    <td valign="top"><div align="center">04/Jul/2014</div></td>
    <td valign="top"><div align="center">Por iniciar</div></td>
  </tr>
  <tr>
    <td valign="top"><div align="center">04-201406/M3</div></td>
    <td valign="top">Retomar las publicaciones en Twitter durante fines de semana, usando el hashtag <strong>#TipsEmpleo</strong> e incluyendo enlaces a los contenidos del Portal del Empleo</td>
    <td valign="top"><div align="center">STPS-CGSNE</div></td>
    <td valign="top"><div align="center">17/Jun/2014</div></td>
    <td valign="top"><div align="center">Indefinido</div></td>
    <td valign="top"><div align="center">Por iniciar</div></td>
  </tr>
  <tr>
    <td valign="top"><div align="center">05-201406/M3</div></td>
    <td valign="top">Publicar  al menos dos veces al día, de lunes a viernes, enlaces a las ofertas de empleo disponibles en el Portal del Empleo</td>
    <td valign="top"><div align="center">STPS-CGSNE</div></td>
    <td valign="top"><div align="center">17/Jun/2014</div></td>
    <td valign="top"><div align="center">Indefinido</div></td>
    <td valign="top"><div align="center">Por iniciar</div></td>
  </tr>
  <tr>
    <td valign="top"><div align="center">06-201406/M5</div></td>
    <td valign="top">Publicar cada lunes un mensaje invitando a los seguidores a darle RT al mismo; por ejemplo: "<em>¡Feliz inicio de semana! Ayúdanos con RT a este enlace para ayudar a las personas que buscan <strong>#empleo</strong> www.empleo.gob.mx</em>"</td>
    <td valign="top"><div align="center">STPS-CGSNE</div></td>
    <td valign="top"><div align="center">17/Jun/2014</div></td>
    <td valign="top"><div align="center">Indefinido</div></td>
    <td valign="top"><div align="center">Por iniciar</div></td>
  </tr>
</table>
</div>
</div>
</body>
</html>