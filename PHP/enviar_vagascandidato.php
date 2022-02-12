	<?php
	session_start();
	include("conexao.php");
	
	
	$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
	
	
	$sql = "select count(*) as total from notificacao_vagas where email = '$email'";
	$result = mysqli_query($conexao, $sql);
	$row = mysqli_fetch_assoc($result);
	
	if($row['total']==1){
		$_SESSION['email_existe'] = true;
		header('Location: indexlogincandidato.php');
		exit;
	}
	
	
	$sql = "insert into notificacao_vagas(email) VALUES ('$email')";
	
	if($conexao->query($sql) === TRUE) {
		$_SESSION['status_cadastro'] = true;
	}
	
	$conexao->close();
	
	header('Location: indexlogincandidato.php');
	exit;
	
	?>