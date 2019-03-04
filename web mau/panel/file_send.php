<?
  include ("tconnection.php");
  $Coneccion = new TConeccion();
?>
<?
  $file			=	$_FILES['filename']['name']; 
  $format 		=	pathinfo($file, PATHINFO_EXTENSION);
  $title		=	utf8_decode($_POST['title']);	
  $tag			=	$_POST['tag'];
  $id_autor		=	$_POST['id_autor'];
  $size			=	$_FILES['filename']['size'];
  $date			=	date('Y').date('m').date('d');
?>
<?
  $sql = "INSERT INTO exp_file (format,title,filename,tag,id_autor,size) VALUES ('$format','$title','$file','$tag','$id_autor','$size')";
  $Coneccion->Gestion($sql);
  
  //Subiendo documento adjunto
  if($_FILES['filename']['name']){
    $file = "files/video/".$file;
	move_uploaded_file($_FILES['filename']['tmp_name'], $file);
  }
  
  echo ("<script>location.href='file_list.php?msg=El nuevo contenido ha sido publicado';</script>");
?>