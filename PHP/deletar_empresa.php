<?php
	header("content-type: text/html;charset=utf-8");
	session_start();
	include("conexao.php");
	

$cnpj = $_SESSION['cnpj'];
$result_empresa = "SELECT * FROM empresa where cnpj ='$cnpj'";

$resultado_empresa = mysqli_query($conexao, $result_empresa);
$row_empresa = mysqli_fetch_assoc($resultado_empresa);

$cnpj = $row_empresa['cnpj'];

$sql = mysqli_query($conexao,"SELECT * FROM empresa where cnpj ='$cnpj'");

while($col = mysqli_fetch_assoc($sql)){
	
$result_vagas = "SELECT * FROM vagas where cnpj ='$cnpj'";

$resultado_vagas = mysqli_query($conexao, $result_vagas);
$row_vagas = mysqli_fetch_assoc($resultado_vagas);	
	
$result_vagas = "DELETE from vagas where cnpj='$cnpj'";
$resultado_vagas = mysqli_query($conexao, $result_vagas);
}



$result_empresa = "DELETE from empresa where cnpj='$cnpj'";
$resultado_empresa = mysqli_query($conexao, $cnpj);	


	if($conexao->query($result_empresa) === TRUE) {
		$_SESSION['excluido'] = true;
	}
	
	$conexao->close();
	
	header('Location: index.php');
	exit;
	
?>