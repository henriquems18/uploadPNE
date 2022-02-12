<?php
	require 'PHPMailer/PHPMailerAutoload.php';
	
	$Mailer = new PHPMailer();
	
	//Define que será usado SMTP
	$Mailer->IsSMTP();
	
	//Enviar Email em HTML
	$Mailer->isHTML(true);
	
	$Mailer->Charset = 'UTF-8';

	//Configurações
	$Mailer->SMTPAuth = true;
	$Mailer->SMTPSecure = 'ssl';
	
	//nome do servidor
	$Mailer->Host = 'ftpupload.net';

	//Porta de Saida
	$Mailer->Port = 21;

	//Login
	$Mailer->Username = '98grillo@gmail.com';
	$Mailer->Password = 'Grillo98';

	//E-mail remetente
	$Mailer->From = '98grillo@gmail.com';

	//Nome do Remetente
	$Mailer->FromName = 'PNEVAGAS';
	
	//Assunto
	$Mailer->Subject = "Recuperar Senha";
	
	//Corpo
	$Mailer->Body = 'Sua Nova senha é: ***';

	//Corpo em Texto
	$Mailer->AltBody = 'sua nova senha é: em texto';

	//Destinatario
	$Mailer->AddAddress('vini_grillo@hotmail.com');

	if($Mailer->Send()){
		echo "Email enviado com sucesso!";
	}else{
		echo "Erro no envio do email:". $Mailer->ErrorInfo;
?>