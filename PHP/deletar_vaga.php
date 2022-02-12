<?php
	header("content-type: text/html;charset=utf-8");
	session_start();
	include("conexao.php");
	

$cnpj = $_SESSION['cnpj'];
$result_empresa = "SELECT * FROM empresa where cnpj ='$cnpj'";

$resultado_empresa = mysqli_query($conexao, $result_empresa);
$row_empresa = mysqli_fetch_assoc($resultado_empresa);

$cnpj = $row_empresa['cnpj'];


	
$id_vaga = $_SESSION['id_vaga'];
$result_vagas = "SELECT * FROM vagas where id_vaga ='$id_vaga'";

$resultado_vagas = mysqli_query($conexao, $result_vagas);
$row_vagas = mysqli_fetch_assoc($resultado_vagas);

$id_vaga = $row_vagas['id_vaga'];

	
	
	//$result_vagas = "DELETE from vagas where id_vaga='$id_vaga'";
$result_vagas = "UPDATE vagas SET status = 'encerrado' where id_vaga='$id_vaga'";
$resultado_vagas = mysqli_query($conexao, $result_vagas);	


	if($conexao->query($result_vagas) === TRUE) {
		$_SESSION['excluido'] = true;
	}
	
	$conexao->close();
	
	header('Location: listar-vagas.php');
	exit;
	
	?>