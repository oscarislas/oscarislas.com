<?php
	error_reporting(E_ERROR | E_PARSE);
	$json ='{"client":{"name":"Alan","Tel":"1231231","Address":"Calle123","email":"email@mail.com"},"order":[{"name":"producto1","cantidad":5,"unidades":"u","precio":"$15.00"},{"name":"producto2","cantidad":0.5,"unidades":"kg","precio":"$15.00"},{"name":"productonuevo","cantidad":0.5,"unidades":"kg","precio":"$0"}],"total":"$500.00","indicacion":"Llevartemprano"}';
	$jsonArray = json_decode($json, true);
	$contact_email = 'oscar.islaso@gmail.com';
	
	define('DEST_EMAIL', $contact_email);
	define('SUBJECT_EMAIL', 'Pedido');
	define('SUCCESS_MESSAGE', 'Email Sent');
	define('ERROR_MESSAGE', 'Error sending Email');
	
	$mime_boundary_1 = md5(time());
    $mime_boundary_2 = "1_".$mime_boundary_1;
    $mail_sent = false;
 
    $headers = "";
    $headers .= "Message-ID: <".date('Y-m-d H:i:s')."webmaster@".$_SERVER['SERVER_NAME'].">";
    $headers .= "X-Mailer: PHP v".phpversion().PHP_EOL;                  // These two to help avoid spam-filters
    $headers .= 'MIME-Version: 1.0'.PHP_EOL;
    $headers .= "Content-Type: multipart/mixed;".PHP_EOL;
    $headers .= "   boundary=\"".$mime_boundary_1."\"".PHP_EOL;
	
	$message = "<html><body>";
	$message .= "<table rules='all' style='border-color: #666; min-width: 500px; border: 1px solid black;' cellpadding='10'>";
	$message .= "<tr style='background: #eee;'><td colspan='2'><strong>Nombre: " . $jsonArray["client"]["name"] . "</strong></td><td colspan='2'><strong>Tel: ". $jsonArray["client"]["tel"] ."</strong></td></tr>";
	$message .= "<tr style='background: #eee;'><td colspan='4'><strong>Direccion: ". $jsonArray["client"]["Address"] ."</strong></td></tr>";
	$message .= "<tr style='background: #eee;'><td colspan='4'><strong>E-mail: ". $jsonArray["client"]["email"] ."</strong></td></tr>";
	$message .= "<tr><td><strong>Producto</strong></td><td><strong>Cantidad</strong></td><td><strong>Precio</strong></td></tr>";
	
	
	foreach($jsonArray["order"] as $product){
		$message .= "<tr>";
		$message.= "<td>". $product["name"] ."</td>";
		$message.= "<td>". $product["cantidad"] . $product["unidades"] ."</td>";
		$message.= "<td>". $product["precio"] ."</td>";
		$message .= "</tr>";
	}
	
	$message .= "<tr><td style='text-align: right;' colspan='4'><strong>Total: ". $jsonArray["total"] ."</td></tr>";
	$message .= "<tr style='background: #eee;'><td colspan='4'><strong>Indicaciones: </strong>". $jsonArray["indicacion"] ."</td></tr>";
	$message .= "</table>";
	$message .= "</body></html>";
	
	echo $message;
?>