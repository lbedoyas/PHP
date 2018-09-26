<?php

$serverName =  "DESKTOP-K4N9TPP";
$connectionInfo = array("Database"=>"prueba_usuarios", "UID"=>"prueba2", "PWD"=>"12345", "characterSet"=>"UTF-8");
$conn_sis = sqlsrv_connect($serverName, $connectionInfo);

if($conn_sis)
{
	echo "conexion exitosa";
}
else
{
	echo "fallo la conexion";
	die(print_r(sqlsrv_errors(), true));
}

?>