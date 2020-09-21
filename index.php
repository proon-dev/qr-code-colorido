<!DOCTYPE html>
<html lang="pt-BR">
    <head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css"  href="estilo.css" />
        <title>V-card</title>
    </head>
    <body>
			<h1>QR Code Cartão de Visita</h1>
			<form action="index.php" method="post">
				Nome:  <input type="text" name="nome" />
				Telefone: <input type="text" name="cel" />
				Email: <input type="text" name="email" />
				<button type="submit" name="submit">Gerar QR Code</button>
			</form>        
			<?php
/* Essa parte é pra ocultar a mensagem de erro que sempre aparece quando é executado. 
Depois que coloca as informações e gera o QR Code a mensagem não aparece. */
				error_reporting(0);
				ini_set(“display_errors”, 0 );
// Parte que gera o QR Code.	
				include('phpqrcode-master/qrlib.php');
				$backColor = 0xffffff;
				$foreColor = 0x247BA0;

				$cartao  = 'BEGIN:VCARD'."\n"; 
				$cartao .= 'FN:'.$_REQUEST['nome']."\n";  
				$cartao .= 'TEL;TYPE=cell:'.$_REQUEST['cel']."\n"; 
				$cartao .= 'EMAIL:'.$_REQUEST['email']."\n"; 
				$cartao .= 'END:VCARD'; 
				QRcode::png("$cartao", "QR_code.png", "L", 5, 5, false, $backColor, $foreColor);
			?>
			<br />
			<br />
			<br />
			<br />
			<img src="QR_code.png">
		<footer>
			<div class="footer">
				Copyright © 2020 Erick Ximenes Vasconcelos
			</div>
		</footer>
	</body>
</html>