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
		if( isset($_POST['nombretxt']) && isset($_POST['txtApellidos']) )
		{
			
			// Nombre:
			if( empty($_POST['nombretxt']) )
				$aErrores[] = "Debe especificar el nombre";
			else
			{
				// Comprobar mediante una expresión regular, que sólo contiene letras y espacios:
				if( preg_match($patron_texto, $_POST['txtNombre']) )
					$aMensajes[] = "Nombre: [".$_POST['txtNombre']."]";
				else
					$aErrores[] = "El nombre sólo puede contener letras y espacios";
			}

		}
		else
		{
			echo "<p>No se han especificado todos los datos requeridos.</p>";
		}


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
	else
	{
		echo "<p>No se ha enviado el formulario.</p>";
	}

	echo "<p><a href='03_form3.html'>Haz click aquí para volver al formulario</a></p>";

?>