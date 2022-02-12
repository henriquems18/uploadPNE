<?php
ini_set('default_charset','UTF-8');
	header("content-type: text/html;charset=utf-8");
	session_start();
	include("conexao.php");
error_reporting(0); 
	

$cnpj = $_SESSION['cnpj'];
$result_empresa = "SELECT * FROM empresa where cnpj ='$cnpj'";

$resultado_empresa = mysqli_query($conexao, $result_empresa);
$row_empresa = mysqli_fetch_assoc($resultado_empresa);

$foto = $row_empresa['arquivo'];
$texto = $row_empresa['sobre'];
$cnpj = $row_empresa['cnpj'];
$nomeempresa = $row_empresa['nome'];
$buscarfoto = $row_empresa['arquivo'];
$emailempresa = $row_empresa['email'];


	$cargo = mysqli_real_escape_string($conexao,trim($_POST['cargo']));
	$deficiencia = mysqli_real_escape_string($conexao,trim($_POST['deficiencia']));
    $cep = mysqli_real_escape_string($conexao, trim($_POST['cep']));
	$endereco = mysqli_real_escape_string($conexao, trim($_POST['endereco']));
	$numero = mysqli_real_escape_string($conexao, trim($_POST['numero']));
	$cidade = mysqli_real_escape_string($conexao, trim($_POST['cidade']));
	$uf = mysqli_real_escape_string($conexao, trim($_POST['uf']));

	$salario = mysqli_real_escape_string($conexao, trim($_POST['salario']));
	$vaga = mysqli_real_escape_string($conexao, trim($_POST['vaga']));	
	$horario = mysqli_real_escape_string($conexao, trim($_POST['horario']));
	$sobre = mysqli_real_escape_string($conexao, trim($_POST['sobre']));
	$requisito1 = mysqli_real_escape_string($conexao, trim($_POST['requisito1']));
	$requisito2 = mysqli_real_escape_string($conexao, trim($_POST['requisito2']));
	$requisito3 = mysqli_real_escape_string($conexao, trim($_POST['requisito3']));
	$requisito4 = mysqli_real_escape_string($conexao, trim($_POST['requisito4']));	
	$requisito5 = mysqli_real_escape_string($conexao, trim($_POST['requisito5']));
	$beneficio1 = mysqli_real_escape_string($conexao, trim($_POST['beneficio1']));
	$beneficio2 = mysqli_real_escape_string($conexao, trim($_POST['beneficio2']));
	$beneficio3 = mysqli_real_escape_string($conexao, trim($_POST['beneficio3']));
	$beneficio4 = mysqli_real_escape_string($conexao, trim($_POST['beneficio4']));	
	$beneficio5 = mysqli_real_escape_string($conexao, trim($_POST['beneficio5']));

$sql = "insert into vagas(cnpj, cargo, deficiencia, endereco, cep, cidade, uf, numero, salario, vaga, horario, sobre, requisito1, requisito2, requisito3, requisito4, requisito5, beneficio1, beneficio2, beneficio3, beneficio4, beneficio5,nomeempresa, emailempresa, buscarfoto) VALUES ('$cnpj', '$cargo', '$deficiencia', '$endereco', '$cep', '$cidade', '$uf', '$numero', '$salario', '$vaga', '$horario', '$sobre', '$requisito1', '$requisito2', '$requisito3', '$requisito4', '$requisito5', '$beneficio1', '$beneficio2', '$beneficio3', '$beneficio4', '$beneficio5', '$nomeempresa', '$emailempresa', '$buscarfoto')";
	
	if($conexao->query($sql) === TRUE) {
		$_SESSION['status_cadastro'] = true;
	}





//$cargo = utf8_decode($cargo);
$sql = mysqli_query($conexao, "SELECT email FROM notificacao_vagas");
		
		while($col = mysqli_fetch_assoc($sql)){

// multiple recipients
$to  = $col['email']; // note the comma


// subject
$subject = 'Nova vaga para '.$cargo;
//<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
$subject = utf8_decode($subject);
// message
$message ='
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Pessoas com Necessidades Especiais</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<h2>'.$row_empresa['nome'].' esta contratando para vaga de '.$cargo.'</h2>
<table>
 <tr>
  <h3>Informações da Vaga</h3>
 </tr>
 <tr>
  <th style ="float: left;">Cargo:</th><td>'.$cargo.'</td>
 </tr>
 <tr>
  <th style ="float: left;">CEP:</th><td>'.$cep.'</td>
 </tr>
 <tr>
  <th style ="float: left;">Endereço:</th><td>'.$endereco.'</td>
 </tr>
 <tr>
  <th style ="float: left;">Número:</th><td>'.$numero.'</td>
 </tr>
 <tr>
  <th style ="float: left;">Cidade:</th><td>'.$cidade.'</td>
 </tr>
 <tr>
  <th style ="float: left;">Estado:</th><td>'.$uf.'</td>
 </tr>
 <tr>
  <th style ="float: left;">Salário R&#x00024;:</th><td>'.$salario.'</td>
 </tr>
 <tr>
  <th style ="float: left;">Tipo da Vaga:</th><td>'.$vaga.'</td>
 </tr>
 <tr>
  <th style ="float: left;">Carga Horária:</th><td>'.$horario.'</td>
 </tr>
 <tr>
  <th style ="float: left;">Deficiência:</th><td>'.$deficiencia.'</td>
 </tr>
 <tr>
  <h3>Sobre a Vaga</h3>
 </tr>
  <tr>
  <th style ="float: left;">'.$sobre.'</th>
 </tr>
  <tr>
  <h3>Requisitos</h3>
 </tr>
 <tr>
 <td>'.$requisito1.'</td>
 </tr>
 <tr>
 <td>'.$requisito2.'</td>
 </tr>
 <tr>
 <td>'.$requisito3.'</td>
 </tr>
 <tr>
 <td>'.$requisito4.'</td>
 </tr>
 <tr>
 <td>'.$requisito5.'</td>
 </tr>
 <tr>
  <h3>Benefícios Adicionais</h3>
 </tr>
 <tr>
 <td>'.$beneficio1.'</td>
 </tr>
 <tr>
 <td>'.$beneficio2.'</td>
 </tr>
 <tr>
 <td>'.$beneficio3.'</td>
 </tr>
 <tr>
 <td>'.$beneficio4.'</td>
 </tr>
 <tr>
 <td>'.$beneficio5.'</td>
 </tr>

</table>

<p><b><u><a href="http://localhost/php/browse-job.php"> Clique aqui para entrar em nosso portal para se candidatar, ou ver mais vagas como esta! </a></b></u></p>
</body>
</html>'
	;

$message = utf8_decode($message);
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'From: PNE <suporte1.pne@gmail.com>' . "\r\n";

// Mail it
mail($to, $subject, $message, $headers);

}

$conexao->close();
	
	header('Location: new-job.php');
	exit;
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
		<link rel="stylesheet" href="css/plugins.css">
		
		<!-- Style & Common Css --> 
		<link rel="stylesheet" href="css/common.css">
        <link rel="stylesheet" href="css/main.css">

    </head>

</html>