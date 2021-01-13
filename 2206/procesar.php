<?php
	
	if (substr($_FILES['excel']['name'],-3))
	{
		$fecha		= date("Y-m-d");
		$carpeta 	= "../2205/base/";
		$excel  	= $_FILES['excel']['name'];
		move_uploaded_file($_FILES['excel']['tmp_name'], "$carpeta$excel");
		
		$row = 1;
		$fp = fopen ("$carpeta$excel","r");
		//fgetcsv. obtiene los valores que estan en el csv y los extrae.
		
		fclose ($fp);
		$url = "http://charter.aliadostravel.com/2205/";
		echo '<script>window.location.href="'.$url.'";</script>'; 
		
		exit;
	}
?>