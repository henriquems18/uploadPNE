<?php

	
	session_start();
	include("conexao.php");
	
	

	$cnpj = filter_input(INPUT_POST, 'cnpj', FILTER_SANITIZE_STRING);
	$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));
	$confirmarsenha = mysqli_real_escape_string($conexao, trim(md5($_POST['confirmarsenha'])));
	//$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	//$confirmarsenha = filter_input(INPUT_POST, 'confirmarsenha', FILTER_SANITIZE_STRING);
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
	$cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
	$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
	$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
	$uf = filter_input(INPUT_POST, 'uf', FILTER_SANITIZE_STRING);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
	$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
	$novo_nome = filter_input(INPUT_POST, 'arquivo', FILTER_SANITIZE_STRING);
	$sobre = filter_input(INPUT_POST, 'sobre', FILTER_SANITIZE_STRING);
	
	
$sql = "select count(*) as total from empresa where email = '$email'";
	$result = mysqli_query($conexao, $sql);
	$row = mysqli_fetch_assoc($result);

if($senha != $confirmarsenha){
		$_SESSION['senha_dif'] = true;
		header('Location: perfil-empresa.php');
		exit;
		
		}
	


$result_empresa = "UPDATE empresa SET nome = '$nome', senha='$senha', confirmarsenha='$confirmarsenha', numero='$numero', cep='$cep', endereco='$endereco', cidade='$cidade', uf='$uf', email='$email', telefone='$telefone', sobre='$sobre' where cnpj ='$cnpj'";
$resultado_empresa = mysqli_query($conexao, $result_empresa);

if($conexao->query($result_empresa) === TRUE) {
		$_SESSION['status_atualizado'] = true;
	}
	
	$conexao->close();

	header('Location: perfil-empresa.php');
	exit;

?>