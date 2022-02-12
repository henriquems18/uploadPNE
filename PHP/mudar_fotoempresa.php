<?php
	session_start();
	include("conexao.php");
	

	
$_UP['alterar'] = true;
//CAMPO IMAGEM

	$_UP['pasta'] = 'foto/';
	
//RENOMEAR FOTO
		
$cnpj = $_SESSION['cnpj'];
$result_empresa = "SELECT * FROM empresa where cnpj ='$cnpj'";
$resultado_empresa = mysqli_query($conexao, $result_empresa);
$row_empresa = mysqli_fetch_assoc($resultado_empresa);

$novo_nome = $row_empresa['arquivo'];

	


// MOVER A IMAGEM

	move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta']. $novo_nome);


// CAMPO IMAGEM

	
	if($_UP['renomearr'] == true){
	
	$result_empresa = "UPDATE empresa SET arquivo='$novo_nome' where cnpj ='$cnpj'";
$resultado_empresa = mysqli_query($conexao, $result_empresa);
	
}

header('Location: perfil-empresa.php');
	exit;


?>