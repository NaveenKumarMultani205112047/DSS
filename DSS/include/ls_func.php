<?php
function tipo_archivo($archivo,$camino) {

	if (is_dir($camino."/".$archivo)) {
	return 1; // Directory
	}
	else{
	return 2; // File
	}
}
function tamanio_archivo($archivo, $camino){
	return filesize($camino."/".$archivo);
}

function logentradas($cadena)
{
$fecha = getdate();

$cadena =  $fecha["hours"] . ":" . $fecha["minutes"] .  " - ".$fecha["month"] . " " . $fecha["mday"] . "," . " " . $fecha["year"]. "	" . $cadena;
$cadena = $cadena . "	" . getenv("QUERY_STRING") ;
$filename = "log.txt";
   if (!$handle = fopen($filename, 'a')) {
         print "Unable to open the file ($filename)";
         exit;
   }
$somecontent = $cadena."\n";
if(is_writable($filename)){
   if (!fwrite($handle, $somecontent)) {
       print "Unable to write the file: ($filename)";
       exit;
   }
} else {
   chmod ($filename , 0777) or die ("They present a problem when trying to write the file, you probably do not have permission or the file is busy");
   echo "Please Reload the Page";
}


}

if ($Tipo != 0)
{
	$dire = gethostbyaddr(getenv("REMOTE_ADDR"));
	$dires= explode(".",$dire);
	$Listaip = explode(",",$Listado);
	$encontro = 0;
	for ($i = 0;count($dires) > $i; $i++)
	{
		for ($t=0; count($Listaip) > $t; $t++)
		{
			if (strcasecmp($dires[$i],$Listaip[$t]) == 0)
				$encontro = 1;
				
		}
	}
	
	$mensaje = $dire . "<b>access denied</b> <br> Access to the application was denied. <br> Contact the Manager Application.";

	if ($Tipo == 1 && $encontro == 0)
	{
		echo $mensaje;
		exit();
	}
	if ($Tipo == 2 && $encontro == 1)
	{
		echo $mensaje;
		exit();
	}
	logentradas($dire);

}


function setUpperPath($path){
	$lista = explode('/',$path);
	$path = "";
	for ($i = 1;(count($lista)-1) > $i; $i++)
	{
		if (count($lista) > 2 )
			$path = $path ."/". $lista[$i];
		else
			$path = $path . $lista[$i];
	}
	return $path;
}
?>