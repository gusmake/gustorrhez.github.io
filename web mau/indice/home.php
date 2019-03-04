<?
 session_start();
 set_time_limit(0);
 error_reporting (E_ALL ^ E_NOTICE);
 include ("tconnection.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<title>Índice semanal</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div align="center">
 <!--<img src="img/expertaria.png">-->
 <? if($_SESSION['type'] == "EDITOR"){ ?>
 <div style="float:right; margin:10px;"><input name="logout" type="button" value="Salir" onClick="location.href='logoff.php'" class="button"></div>

   <div id="contenido">
	   <h2>Top 10 Publicaciones el Facebook</h2>
	   <h3>Del 01 de febrero al 02 de julio 2018. Índice de Interacción (Relación 'shares' entre total de suscriptores)</h3>
     <table>
       <thead>
       <tr>
         <th>Fanpage</th>
         <th>Formato</th>
         <th>Link</th>
         <th>Alcance</th>
         <th>% paid</th>
         <th>Engage</th>
         <th>Índice</th>
       </tr>
       </thead>
       <tfoot>
       <tr>
         <td colspan="7"><!--<input name="logout" type="button" value="Descargar archivo" onClick="location.href='http://demoexpertaria.info/indice/files/reporte_20180121.xls'">--></td>
       </tr>
       </tfoot>
       <tbody>
       <?
		 $top10 = 0;
		 $coneccion = new TConeccion();
		 $consulta  = "SELECT * FROM exp_indice_resultados ORDER BY indice DESC";
		 $coneccion->Gestion($consulta);
		 while($indice = mysql_fetch_array($coneccion->Query) AND $top10 < 10 ){
		   $coneccion2 = new TConeccion();
		   $consulta2  = "SELECT * FROM exp_indice WHERE id = '".$indice['id_post']."' AND date <= '2018-07-02' AND date >= '2018-02-01'";
		   $coneccion2->Gestion($consulta2);
		   while($post = mysql_fetch_array($coneccion2->Query)){
		     $top10++;
	   ?>
       <tr>
	     <?
		   $mes_legend = substr($post['date'],5,2);
		   switch ($mes_legend) {
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
         <td><div align="left"><b><? echo $top10; ?>. <? echo utf8_encode($post['fanpage']); ?></b> (<? echo substr($post['date'],8,2)."/".$mes_txt; ?>)</div></td>
         <td><div align="center"><? echo $post['type'] ?></div></td>
         <td><div align="center"><a href="<? echo $post['permalink'] ?>" target="_blank">Link</a></div></td>
         <td><div align="center"><? echo number_format($post['reach_total']); ?></div></td>
         <? $tasa_organica = ($post['reach_paid']/$post['reach_total'])*100; ?>
         <td><div align="center"><? echo number_format($tasa_organica)."%"; ?></div></td>
         <? $engage = (($post['like']+$post['share']+$post['comment'])/$post['reach_total'])*100; ?>
         <td><div align="center"><? echo number_format($engage,1)."%"; ?></div></td>
         <td><div align="center"><? echo $indice['indice']; ?></div></td>
       </tr>
       <? } } ?>
       </tbody>
     </table>


     <p>&nbsp;</p>
     <h2>Top 10 Videos con mejor Índice de Interacción</h2>
	 <h3>El Índice de Interacción mide la relación de 'shares' entre total de suscriptores</h3>
     <table>
       <thead>
       <tr>
         <th>Fanpage</th>
         <th>Link</th>
         <th>Alcance</th>
         <th>% paid</th>
         <th>Engage</th>
         <th>Índice</th>
       </tr>
       </thead>
       <tfoot>
       <tr>
         <td colspan="6"><!--<input name="logout" type="button" value="Descargar archivo" onClick="location.href='http://demoexpertaria.info/indice/files/reporte_20180121.xls'">--></td>
       </tr>
       </tfoot>
       <tbody>
       <?
		 $top10 = 0;
		 $coneccion = new TConeccion();
		 $consulta  = "SELECT * FROM exp_indice_resultados ORDER BY indice DESC";
		 $coneccion->Gestion($consulta);
		 while($indice = mysql_fetch_array($coneccion->Query) AND $top10 < 10 ){
		   $coneccion2 = new TConeccion();
		   $consulta2  = "SELECT * FROM exp_indice WHERE id = '".$indice['id_post']."' AND date <= '2018-07-02' AND date >= '2018-02-01' AND type = 'Video'";
		   $coneccion2->Gestion($consulta2);
		   while($post = mysql_fetch_array($coneccion2->Query)){
		     $top10++;
	   ?>
       <tr>
	     <?
		   $mes_legend = substr($post['date'],5,2);
		   switch ($mes_legend) {
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
         <td><div align="left"><b><? echo $top10; ?>. <? echo utf8_encode($post['fanpage']); ?></b> (<? echo substr($post['date'],8,2)."/".$mes_txt; ?>)</div></td>
         <td><div align="center"><a href="<? echo $post['permalink'] ?>" target="_blank">Link</a></div></td>
         <td><div align="center"><? echo number_format($post['reach_total']); ?></div></td>
         <? $tasa_organica = ($post['reach_paid']/$post['reach_total'])*100; ?>
         <td><div align="center"><? echo number_format($tasa_organica)."%"; ?></div></td>
         <? $engage = (($post['like']+$post['share']+$post['comment'])/$post['reach_total'])*100; ?>
         <td><div align="center"><? echo number_format($engage,1)."%"; ?></div></td>
         <td><div align="center"><? echo $indice['indice']; ?></div></td>
       </tr>
       <? } } ?>
       </tbody>
     </table>

     <p>&nbsp;</p>
     <h2>Top 10 Videos con mayor alcance del periodo</h2>
	 <h3>Cantidad de personas que vieron la publicación que contiene el video</h3>
     <table>
       <thead>
       <tr>
         <th>Fanpage</th>
         <th>Link</th>
         <th>Alcance</th>
         <th>% paid</th>
         <th>Engage</th>
       </tr>
       </thead>
       <tfoot>
       <tr>
         <td colspan="6"><!--<input name="logout" type="button" value="Descargar archivo" onClick="location.href='http://demoexpertaria.info/indice/files/reporte_20180121.xls'">--></td>
       </tr>
       </tfoot>
       <tbody>
       <?
		 $top10 = 0;
		 $coneccion2 = new TConeccion();
		 $consulta2  = "SELECT * FROM exp_indice WHERE date <= '2018-07-02' AND date >= '2018-02-01' AND type = 'Video' ORDER BY reach_total DESC LIMIT 10";
		 $coneccion2->Gestion($consulta2);
		 while($post = mysql_fetch_array($coneccion2->Query)){
		   $top10++;
	   ?>
       <tr>
	     <?
		   $mes_legend = substr($post['date'],5,2);
		   switch ($mes_legend) {
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
         <td><div align="left"><b><? echo $top10; ?>. <? echo utf8_encode($post['fanpage']); ?></b> (<? echo substr($post['date'],8,2)."/".$mes_txt; ?>)</div></td>
         <td><div align="center"><a href="<? echo $post['permalink'] ?>" target="_blank">Link</a></div></td>
         <td><div align="center"><? echo number_format($post['reach_total']); ?></div></td>
         <? $tasa_organica = ($post['reach_paid']/$post['reach_total'])*100; ?>
         <td><div align="center"><? echo number_format($tasa_organica)."%"; ?></div></td>
         <? $engage = (($post['like']+$post['share']+$post['comment'])/$post['reach_total'])*100; ?>
         <td><div align="center"><? echo number_format($engage,1)."%"; ?></div></td>
       </tr>
       <? } ?>
       </tbody>
     </table>

     <p>&nbsp;</p>
     <h2>Top 10 Videos promocionados con más reproducciones completas</h2>
	 <h3>Reproducciones de al menos 95% de la duración total del video</h3>
	 <table>
       <thead>
       <tr>
         <th>Fanpage</th>
         <th>Link</th>
         <th>Reproducciones 95%</th>
		 <th>Reproducciones 3 seg.</th>
       </tr>
       </thead>
       <tfoot>
       <tr>
         <td colspan="6"><!--<input name="logout" type="button" value="Descargar archivo" onClick="location.href='http://demoexpertaria.info/indice/files/reporte_20180121.xls'">--></td>
       </tr>
       </tfoot>
       <tbody>
       <?
		 $top10 = 0;
		 $coneccion2 = new TConeccion();
		 $consulta2  = "SELECT * FROM exp_indice WHERE date <= '2018-07-02' AND date >= '2018-02-01' AND type = 'Video' ORDER BY rep95_paid DESC LIMIT 10";
		 $coneccion2->Gestion($consulta2);
		 while($post = mysql_fetch_array($coneccion2->Query)){
		   $top10++;
	   ?>
       <tr>
	     <?
		   $mes_legend = substr($post['date'],5,2);
		   switch ($mes_legend) {
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
         <td><div align="left"><b><? echo $top10; ?>. <? echo utf8_encode($post['fanpage']); ?></b> (<? echo substr($post['date'],8,2)."/".$mes_txt; ?>)</div></td>
         <td><div align="center"><a href="<? echo $post['permalink'] ?>" target="_blank">Link</a></div></td>
         <td><div align="center"><? echo number_format($post['rep95_paid']); ?></div></td>
		   <td><div align="center"><? echo number_format($post['rep03_paid']); ?></div></td>
       </tr>
       <? } ?>
       </tbody>
     </table>
	   
     
     <p>&nbsp;</p>
     <h2>Numeralia del periodo</h2>
	 <h3>Del 01/febrero al 02/julio de 2018</h3>
     <ul>
     <?
	   $reach_total	= 0;
	   $reach_paid	= 0;
	   $reach_tasa	= 0;
	   $engagement	= 0;
	   $post_qty	= 0;
	   $coneccion3 = new TConeccion();
	   $consulta3  = "SELECT * FROM exp_indice WHERE date <= '2018-07-02' AND date >= '2018-02-01'";
	   $coneccion3->Gestion($consulta3);
	   while($numeralia = mysql_fetch_array($coneccion3->Query)){
	     $reach_total = $reach_total + $numeralia['reach_total'];
		 $reach_paid = $reach_paid + $numeralia['reach_paid'];
		 $reach_tasa = ($reach_paid/$reach_total)*100;
		 $engagement = $engagement+$numeralia['like']+$numeralia['comment']+$numeralia['share'];
		 $post_qty++;
	   }
	 ?>
       <li>Alcance total: <b><? echo number_format($reach_total); ?> usuarios acumulados (no únicos)</b></li>
       <li>Alcance pagado: <b><? echo number_format($reach_paid); ?> usuarios acumulados (no únicos)</b> (<? echo number_format($reach_tasa,1); ?>%)</li>
       <li>Interacciones: <b><? echo number_format($engagement); ?></b> (Likes + Comments + Shares)</li>
       <li>Publicaciones: <b><? echo number_format($post_qty); ?> posts</b></li>

     <!-- FANS -->
	 <?
	   $totalfans	= 0;
	   $coneccion4 = new TConeccion();
	   $consulta4  = "SELECT * FROM exp_fanpages WHERE date = '2018-07-02'";
	   $coneccion4->Gestion($consulta4);
	   while($sumafans = mysql_fetch_array($coneccion4->Query)){
	     $totalfans = $totalfans + $sumafans['fans'];
	   }
	 ?>
       <li>Suscriptores: <b><? echo number_format($totalfans); ?> usuarios</b></li>
     <!-- END FANS -->
     </ul>

     <p>&nbsp;</p>
     <h2>Ranking de páginas en Facebook</h2>
	 <h3>Corte al 02/Julio/2018</h3>
     <table>
       <thead>
       <tr>
         <th>Fanpage</th>
         <th>Suscriptores</th>
       </tr>
       </thead>
       <tbody>
       <?
		 $top10 = 0;
		 $sumatoria = 0;
		 $coneccion2 = new TConeccion();
		 $consulta2  = "SELECT * FROM exp_fanpages WHERE date = '2018-07-02' ORDER BY fans DESC";
		 $coneccion2->Gestion($consulta2);
		 while($post = mysql_fetch_array($coneccion2->Query)){
		   $top10++;
		   $sumatoria = $post['fans'] + $sumatoria;
	   ?>
       <tr>
         <td><div align="left"><? echo $top10; ?>. <? echo utf8_encode($post['fanpage']); ?></div></td>
         <td><div align="center"><? echo number_format($post['fans']); ?></div></td>
       </tr>
       <? } ?>
       </tbody>
       <tfoot>
       <tr>
         <td><div align="right">Total</div></td>
         <td><div align="center"><? echo number_format($sumatoria); ?></div></td>
       </tr>
       </tfoot>
     </table>

     <p>&nbsp;</p>
     <h2>Relación de videos promocionados</h2>
	 <h3>Ordenados por cantidad de reproducciones de al menos 3 segundos</h3>
     <table>
       <thead>
       <tr>
         <th>Fanpage</th>
         <th>Link</th>
         <th>Alcance</th>
         <th>Rep. 95%</th>
         <th>Rep. 3seg</th>
		 <th>Interacciones</th>
		 <th>Inversión estimada</th>
       </tr>
       </thead>
       <tbody>
       <?
		 $top10 = 0;
	     $pauta = 0;
		 $coneccion2 = new TConeccion();
		 $consulta2  = "SELECT * FROM exp_indice WHERE date <= '2018-07-02' AND date >= '2018-02-01' AND type = 'Video' AND reach_paid != 0 ORDER BY rep03_paid DESC";
		 $coneccion2->Gestion($consulta2);
		 while($post = mysql_fetch_array($coneccion2->Query)){
		   $top10++;
	   ?>
       <tr>
	     <?
		   $mes_legend = substr($post['date'],5,2);
		   switch ($mes_legend) {
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
         <td><div align="left"><b><? echo $top10; ?>. <? echo utf8_encode($post['fanpage']); ?></b> (<? echo substr($post['date'],8,2)."/".$mes_txt; ?>)</div></td>
         <td><div align="center"><a href="<? echo $post['permalink'] ?>" target="_blank">Link</a></div></td>
         <td><div align="center"><? echo number_format($post['reach_total']); ?></div></td>
         <td><div align="center"><? echo number_format($post['rep95_paid']); ?></div></td>
		 <td><div align="center"><? echo number_format($post['rep03_paid']); ?></div></td>
		 <? $interaction = $post['like']+$post['comment']+$post['share'] ?>  
		 <td><div align="center"><? echo number_format($interaction); ?></div></td>
		 <?
			 $roi = $post['rep03_paid']*0.05;
			 $pauta = $pauta+$roi;
		 ?>  
		 <td><div align="center"><? echo "$ ".number_format($roi)." MN"; ?></div></td>
       </tr>
       <? } ?>
       </tbody>
       <tfoot>
       <tr>
         <td colspan="7"><div align="right"><? echo "$ ".number_format($pauta)." MN"; ?></td>
       </tr>
       </tfoot>
     </table>
	   

     <p>&nbsp;</p>
     <h2>Relación de publicaciones promocionadas</h2>
	 <h3>Ordenadas por alcance total</h3>
     <table>
       <thead>
       <tr>
         <th>Fanpage</th>
         <th>Link</th>
         <th>Alcance</th>
		 <th>Interacciones</th>
		 <th>Inversión estimada</th>
       </tr>
       </thead>
       <tbody>
       <?
		 $top10 = 0;
	     $pauta = 0;
		 $coneccion2 = new TConeccion();
		 $consulta2  = "SELECT * FROM exp_indice WHERE date <= '2018-07-02' AND date >= '2018-02-01' AND reach_paid != 0 ORDER BY reach_paid DESC";
		 $coneccion2->Gestion($consulta2);
		 while($post = mysql_fetch_array($coneccion2->Query)){
		   $top10++;
	   ?>
       <tr>
	     <?
		   $mes_legend = substr($post['date'],5,2);
		   switch ($mes_legend) {
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
         <td><div align="left"><b><? echo $top10; ?>. <? echo utf8_encode($post['fanpage']); ?></b> (<? echo substr($post['date'],8,2)."/".$mes_txt; ?>)</div></td>
         <td><div align="center"><a href="<? echo $post['permalink'] ?>" target="_blank">Link</a></div></td>
         <td><div align="center"><? echo number_format($post['reach_total']); ?></div></td>
		 <? $interaction = $post['like']+$post['comment']+$post['share'] ?>  
		 <td><div align="center"><? echo number_format($interaction); ?></div></td>
		 <?
			 $roi = $post['reach_paid']*0.02377976;
			 $pauta = $pauta+$roi;
		 ?>
		 <td>
			 <div style="width: 35%; text-align: left; float: left;">$</div>
			 <div style="width: 65%; text-align: right; float: left;"><? echo number_format($roi)." MN"; ?></div>
		 </td>
       </tr>
       <? } ?>
       </tbody>
       <tfoot>
       <tr>
         <td colspan="7"><div align="right"><? echo "$ ".number_format($pauta)." MN"; ?></td>
       </tr>
       </tfoot>
     </table>

	   
   </div>

 <? } ?>
</div>
</body>
</html>