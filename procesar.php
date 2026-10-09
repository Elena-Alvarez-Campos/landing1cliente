<?php
	
    // Arrays para guardar mensajes y errores:
	$aErrores = array();
	$aMensajes = array();

    // Patrón para usar en expresiones regulares (admite letras acentuadas y espacios):
	$patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚüÜàèìòùÀÈÌÒÙ\s]+$/";

	// Comprobar si se ha enviado el formulario:
	if( !empty($_POST) )
	{

		echo "FORMULARIO RECIBIDO:<br/>";
		echo "====================<p/>";

		// Mostrar la información recibida del formulario:
		print_r( $_POST );
		echo "<hr/>";

		// Comprobar si llegaron los campos requeridos:
		if( isset($_POST['nombretxt']) /*&& isset($_POST['apellidostxt'])*/)
		{
			
			// Nombre:
			if( empty($_POST['nombretxt']) )
				$aErrores[] = "Debe especificar el nombre";
			else
			{
				// Comprobar mediante una expresión regular, que sólo contiene letras y espacios:
				if( preg_match($patron_texto, $_POST['nombretxt']) )
					$aMensajes[] = "Nombre: [".$_POST['nombretxt']."]";
				else
					$aErrores[] = "El nombre sólo puede contener letras y espacios";
			}
			// Apellidos:
			if( empty($_POST['apellidostxt']) )
				$aErrores[] = "Debe especificar los apellidos";
			else
			{
				// Comprobar mediante una expresión regular, que sólo contienen letras y espacios:
				if( preg_match($patron_texto, $_POST['apellidostxt']) )
					$aMensajes[] = "Apellidos: [".$_POST['apellidostxt']."]";
				else
					$aErrores[] = "Los apellidos sólo pueden contener letras y espacios";
			}
			//Teléfono
			
			if( empty($_POST['tlfnnum']) )
				$aErrores[] = "Debe especificar el teléfono";
			else
			{
				if (is_numeric($_POST['tlfnnum'])) {
    		    //echo var_export($_POST['tlfnnum'], true) . " es numérico", PHP_EOL;
    			else {
    	    		$aErrores[] ="El número de";
    			}		
			}
			//Correo
			if( empty($_POST['correoemail']) )
				$aErrores[] = "Debe especificar el correo";
			else
			{
				if (filter_var($_POST['correoemail'], FILTER_VALIDATE_EMAIL)) {
    				//echo "La dirección de email [".$_POST['correoemail']."] es válida.\n";
					} else {
    					$aErrores[] = "La dirección de email no [".$_POST['correoemail']."] es válida.\n";
					}
			}
			//Tema

			
		}
		else
		{
			echo "<p>No se han especificado todos los datos requeridos.</p>";
			// Si han habido errores se muestran, sino se mostrán los mensajes
			if( count($aErrores) > 0 )
			{
				echo "<p>ERRORES ENCONTRADOS:</p>";

			// Mostrar los errores:
			for( $contador=0; $contador < count($aErrores); $contador++ ) 
				echo $aErrores[$contador]."<br/>";
		}
		else
		{
			// Mostrar los mensajes:
			for( $contador=0; $contador < count($aMensajes); $contador++ ) 
				echo $aMensajes[$contador]."<br/>";
		}
		}


	}
	else
	{
		echo "<p>No se ha enviado el formulario.</p>";
	}

	echo "<p><a href='index.php'>Haz click aquí para volver al formulario</a></p>";
	// ///////////////////////////////////////////////
	// $email = validar_input($_POST["email"]);
	// // Verifica el correcto formato de email
	// if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	// $emailErr = "Formato de email invalido";
	// }
	
?>