<?
class TConeccion{
  var $Query;
  var $C;
  var $Link;
  
  function Error(){
    echo mysql_error();
  }

  function TConeccion(){

	$Server		= "45.40.164.81";
	$User		= "cerebro";
	$Password	= "ToMa7802189j3";
	$Database	= "cerebro";

	$Result = true;
	if (!$this->Link = mysql_connect($Server, $User, $Password)){
	  $Result = false; 
	} 
	if (!mysql_select_db($Database, $this->Link)){
	  $Result = false;
	}
    return $Result;
  }
  
  function Gestion($Gestion){
    $Result = true; 
    if ($this->Query = mysql_query($Gestion, $this->Link)){
	  if (strpos($Gestion, "ELECT") == 1) {		//Cuando la gestion es ELIMINAR o INSERTAR no se cuenta nada, solo cuando es un SELECT se cuentan los elementos que se seleccionaron 
	    $this->C = mysql_num_rows($this->Query);
      }
	}else{
	  $this->Error();
	  $Result = false;
	}
	return $Result;
  }
  
  function Close(){
    mysql_close($this->Link); 
  }
} 
?>