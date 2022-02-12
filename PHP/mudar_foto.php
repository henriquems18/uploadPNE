<?php
	session_start();
	include("conexao.php");
	

	
	

	
$_UP['alterar'] = true;
//CAMPO IMAGEM

	$_UP['pasta'] = 'foto/';
	
//RENOMEAR FOTO
		

	$novo_nome = $_POST['cpf'].".jpg";
	


// MOVER A IMAGEM

	move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta']. $novo_nome);


// CAMPO IMAGEM

	
	if($_UP['renomearr'] == true){
	
	$result_candidato = "UPDATE candidato SET arquivo='$novo_nome' where cpf ='$cpf'";
$resultado_candidato = mysqli_query($conexao, $result_candidato);
	
}

header('Location: perfil-candidate.php');
	exit;


?>