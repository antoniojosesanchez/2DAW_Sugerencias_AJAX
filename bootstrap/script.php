<?php

	require_once "../Database.php" ;

	// capturamos el patrón proporcionado por el usuario
	$patron = $_GET["pattern"] ;

	// buscamos si el patrón trae algún valor; en otro caso, no
	// hacemos nada.
	if (empty($patron)) return ;

	// conectamos con la base de datos y realizamos la consulta
	$db = Database::getDatabase("inventario") ;
	$db->consulta("SELECT * FROM items WHERE item LIKE '$patron%' ; ") ;

	// construimos la lista de opciones
	$datos = "" ;
	while ($obj = $db->getObjeto())
		$datos.="<li class=\"list-group-item\">{$obj->item}</li>" ;
	//
	// "devolvemos" el resultado
	echo $datos ;
