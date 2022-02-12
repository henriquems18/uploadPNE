<?php

	
	session_start();
	include("conexao.php");
	
	

	$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
	$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));
	$confirmarsenha = mysqli_real_escape_string($conexao, trim(md5($_POST['confirmarsenha'])));
	//$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	//$confirmarsenha = filter_input(INPUT_POST, 'confirmarsenha', FILTER_SANITIZE_STRING);
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$nasc = filter_input(INPUT_POST, 'nasc', FILTER_SANITIZE_STRING);
	$numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
	$cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
	$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
	$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
	$uf = filter_input(INPUT_POST, 'uf', FILTER_SANITIZE_STRING);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
	$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
	$novo_nome = filter_input(INPUT_POST, 'arquivo', FILTER_SANITIZE_STRING);
	$deficiencia = filter_input(INPUT_POST, 'deficiencia', FILTER_SANITIZE_STRING);
	$escolaridade = filter_input(INPUT_POST, 'escolaridade', FILTER_SANITIZE_STRING);	
	$situacao = mysqli_real_escape_string($conexao, trim($_POST['situacao']));
	$nomecurso = mysqli_real_escape_string($conexao, trim($_POST['nomecurso']));
	$nomeinstituto = mysqli_real_escape_string($conexao, trim($_POST['nomeinstituto']));
	$escolaridade2 = mysqli_real_escape_string($conexao, trim($_POST['escolaridade2']));
	$situacao2 = mysqli_real_escape_string($conexao, trim($_POST['situacao2']));
	$nomecurso2 = mysqli_real_escape_string($conexao, trim($_POST['nomecurso2']));
	$nomeinstituto2 = mysqli_real_escape_string($conexao, trim($_POST['nomeinstituto2']));
	$curso1 = mysqli_real_escape_string($conexao, trim($_POST['curso1']));
	$curso2 = mysqli_real_escape_string($conexao, trim($_POST['curso2']));
	$curso3 = mysqli_real_escape_string($conexao, trim($_POST['curso3']));
	$curso4 = mysqli_real_escape_string($conexao, trim($_POST['curso4']));
	$curso5 = mysqli_real_escape_string($conexao, trim($_POST['curso5']));
	$idioma = mysqli_real_escape_string($conexao, trim($_POST['idioma']));
	$informatica = mysqli_real_escape_string($conexao, trim($_POST['informatica']));
	$nomeempresa = mysqli_real_escape_string($conexao, trim($_POST['nomeempresa']));
	$ultimocargo = mysqli_real_escape_string($conexao, trim($_POST['ultimocargo']));
	$atribuicoes = mysqli_real_escape_string($conexao, trim($_POST['atribuicoes']));

	
	
$sql = "select count(*) as total from candidato where email = '$email'";
	$result = mysqli_query($conexao, $sql);
	$row = mysqli_fetch_assoc($result);

		if($senha != $confirmarsenha){
		$_SESSION['senha_dif'] = true;
		header('Location: perfil-candidate.php');
		exit;
		
		}

$result_candidato = "UPDATE candidato SET nome = '$nome', senha='$senha', confirmarsenha='$confirmarsenha', nasc='$nasc', numero='$numero', cep='$cep', endereco='$endereco', cidade='$cidade', uf='$uf', email='$email', telefone='$telefone', deficiencia='$deficiencia', escolaridade='$escolaridade', situacao='$situacao', nomecurso='$nomecurso', nomeinstituto='$nomeinstituto', escolaridade2='$escolaridade2' ,situacao2='$situacao2', nomecurso2='$nomecurso2',nomeinstituto2='$nomeinstituto2', curso1='$curso1', curso2='$curso2', curso3='$curso3', curso4='$curso4', curso5='$curso5', idioma='$idioma', informatica='$informatica', nomeempresa ='$nomeempresa', ultimocargo='$ultimocargo', atribuicoes='$atribuicoes' where cpf ='$cpf'";
$resultado_candidato = mysqli_query($conexao, $result_candidato);

if($conexao->query($result_candidato) === TRUE) {
		$_SESSION['status_atualizado'] = true;
	}
	
	$conexao->close();

	header('Location: perfil-candidate.php');
	exit;

?>