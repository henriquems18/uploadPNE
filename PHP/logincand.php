<?php
session_start();
include("conexao.php");


if(empty($_POST['cpf']) || empty($_POST['senha'])) {
	header('Location: logincandidato.php');
	exit();
}

$cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select * from candidato where cpf = '$cpf' and senha = md5('{$senha}')";

$result = mysqli_query($conexao, $query);


$row = mysqli_num_rows($result);

if($row == 1) {
	$_SESSION['cpf'] = $cpf;
	header('Location: indexlogincandidato.php');
	exit();
} else {
	$_SESSION['invalido'] = true;
	header('Location: logincandidato.php');
	exit();
}

?>