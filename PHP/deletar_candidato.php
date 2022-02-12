<?php
	header("content-type: text/html;charset=utf-8");
	session_start();
	include("conexao.php");
	

$cpf = $_SESSION['cpf'];
$result_candidato = "SELECT * FROM candidato where cpf ='$cpf'";

$resultado_candidato = mysqli_query($conexao, $result_candidato);
$row_candidato = mysqli_fetch_assoc($resultado_candidato);

$cpf = $row_candidato['cpf'];


	
	
$result_candidato = "DELETE from candidato where cpf='$cpf'";
$resultado_candidato = mysqli_query($conexao, $result_candidato);	


	if($conexao->query($result_candidato) === TRUE) {
		$_SESSION['excluido'] = true;
	}
	
	$conexao->close();
	
	header('Location: index.php');
	exit;
	
	?>