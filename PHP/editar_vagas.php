<?php
	header("content-type: text/html;charset=utf-8");
	session_start();
	include("conexao.php");
	

$cnpj = $_SESSION['cnpj'];
$result_empresa = "SELECT * FROM empresa where cnpj ='$cnpj'";

$resultado_empresa = mysqli_query($conexao, $result_empresa);
$row_empresa = mysqli_fetch_assoc($resultado_empresa);

$foto = $row_empresa['arquivo'];
$texto = $row_empresa['sobre'];
$cnpj = $row_empresa['cnpj'];


	
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
		

	
	
	$result_vagas = "UPDATE vagas SET cargo = '$cargo', deficiencia= '$deficiencia', endereco ='$endereco', cep= '$cep', cidade= '$cidade', uf = '$uf', numero = '$numero', salario = '$salario', vaga = '$vaga', horario = '$horario', sobre= '$sobre',  requisito1 = '$requisito1', requisito2 = '$requisito2', requisito3 = '$requisito3', requisito4 = '$requisito4', requisito5 = '$requisito5', beneficio1= '$beneficio1', beneficio2= '$beneficio2', beneficio3= '$beneficio3', beneficio4= '$beneficio4', beneficio5 ='$beneficio5' where cnpj='$cnpj' ";
$resultado_vagas = mysqli_query($conexao, $result_vagas);	


	if($conexao->query($result_vagas) === TRUE) {
		$_SESSION['status_atualizado'] = true;
	}
	
	$conexao->close();
	
	header('Location: perfil-job.php');
	exit;
	
	?>