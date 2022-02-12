<?php
session_start();
include("conexao.php");


$cnpj = $_SESSION['cnpj'];
$result_empresa = "SELECT * FROM empresa where cnpj ='$cnpj'";

$resultado_empresa = mysqli_query($conexao, $result_empresa);
$row_empresa = mysqli_fetch_assoc($resultado_empresa);

$cnpjempresa= $row_empresa['cnpj'];


$id_vaga = mysqli_real_escape_string($conexao, $_POST['id_vaga']);

$query = "select * from vagas where id_vaga = '$id_vaga' and cnpj = '$cnpjempresa'";

$result = mysqli_query($conexao, $query);


$row = mysqli_num_rows($result);

if($row == 1) {
	$_SESSION['cnpj'] = $cnpj and $_SESSION['id_vaga'] = $id_vaga;
	header('Location: perfil-job-encerrada.php');
	exit();
} else {
	$_SESSION['invalido'] = true;
	header('Location: listar-vagas.php');
	exit();
}

?>