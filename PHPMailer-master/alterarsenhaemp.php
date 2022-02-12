<?php 
	include("../PHP/conexao.php");
	error_reporting(0); 
	$erro ="0";

// subject
$subject = 'Sua senha foi atualizada';
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'From: PNE <suporte1.pne@gmail.com>' . "\r\n";

	
	if(isset($_POST['ok'])){
		$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
		
		
		$sql_code= "SELECT senha, email FROM empresa where email= '$email'";
		$sql_query = mysqli_query($conexao, $sql_code);
		$total = mysqli_fetch_assoc($sql_query);
	
	
		
		if ($erro==0 && $total > 0){ 
		$novasenha = substr(md5(time()),0,6);
		$nscriptografada = md5($novasenha);

	

			
			
		if(mail($email,$subject,"<table><tr><th>Nova Senha:</th><td>$novasenha</td></tr></table>",$headers)){
			$sql_code = "UPDATE empresa SET senha = '$nscriptografada' WHERE email = '$email'"; 
			$sql_query = mysqli_query($conexao, $sql_code);
			echo '<section class="login-wrapper">
				<div class="col-md-6 col-sm-8 col-md-offset-3 col-sm-offset-2">
					
						<img class="img-responsive" alt="logo" src="../PHP/img/logo.png">
						<div class="row heading">
							<p>Senha Alterada com Sucesso! <br> Verifique seu e-mail!<p>
						</div>
						<a type="button" class="btn brows-btn1" href="../PHP/loginempresa.php"/>VOLTAR</a>
						
					
				</div>
			</div>
		</section>'
;

		}


		}else{
			
	echo '<section class="login-wrapper">
				<div class="col-md-6 col-sm-8 col-md-offset-3 col-sm-offset-2">
					
						<img class="img-responsive" alt="logo" src="../PHP/img/logo.png">
						<div class="row heading">
							<p>E-mail não encontrado!<p>
						</div>
						<a type="button" class="btn brows-btn1" href="../PHP/loginempresa.php"/>VOLTAR</a>
						
					
				</div>
			</div>
		</section>'
;
}

		}
	
?>

<!doctype html>
<html class="no-js" lang="pt-br">
 <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Pessoas com Necessidades Especiais</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
        <!-- Todos Plugin Css --> 
		<link rel="stylesheet" href="../PHP/css/plugins.css">
		
		<!-- Style & Common Css --> 
		<link rel="stylesheet" href="../PHP/css/common.css">
        <link rel="stylesheet" href="../PHP/css/main.css">

    </head>



</html>