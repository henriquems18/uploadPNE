<?php
session_start();
include("conexao.php");


if(empty($_POST['cnpj']) || empty($_POST['senha'])) {
	header('Location: loginempresa.php');
	exit();
}

$cnpj = mysqli_real_escape_string($conexao, $_POST['cnpj']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select * from empresa where cnpj = '$cnpj' and senha = md5('{$senha}')";

$result = mysqli_query($conexao, $query);


$row = mysqli_num_rows($result);

if($row == 1) {
	$_SESSION['cnpj'] = $cnpj;
	header('Location: indexloginempresa.php');
	exit();
} else {
	$_SESSION['invalido'] = true;
	header('Location: loginempresa.php');
	exit();
}

?>