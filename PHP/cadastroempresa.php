<?php
header("content-type: text/html;charset=utf-8");
	session_start();
	include("conexao.php");
	
	$cnpj = mysqli_real_escape_string($conexao,trim($_POST['cnpj']));
	$nome = mysqli_real_escape_string($conexao,trim($_POST['nome']));
	$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));
	$confirmarsenha = mysqli_real_escape_string($conexao, trim(md5($_POST['confirmarsenha'])));
	$numero = mysqli_real_escape_string($conexao, trim($_POST['numero']));
	$cep = mysqli_real_escape_string($conexao, trim($_POST['cep']));
	$endereco = mysqli_real_escape_string($conexao, trim($_POST['endereco']));
	$cidade = mysqli_real_escape_string($conexao, trim($_POST['cidade']));
	$uf = mysqli_real_escape_string($conexao, trim($_POST['uf']));
	$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
	$telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));
	$sobre = mysqli_real_escape_string($conexao, trim($_POST['sobre']));
	
	
	$sql = "select count(*) as total from empresa where cnpj = '$cnpj'";
	$result = mysqli_query($conexao, $sql);
	$row = mysqli_fetch_assoc($result);
	
if($senha != $confirmarsenha){
		$_SESSION['senha_dif'] = true;
		header('Location: new-empresa.php');
		exit;
		
		}

	if($row['total']==1){
		$_SESSION['usuario_existe'] = true;
		header('Location: new-empresa.php');
		exit;
	}
	
$sql = "select count(*) as total from empresa where email = '$email'";
	$resultempresa = mysqli_query($conexao, $sql);
	$rowempresa = mysqli_fetch_assoc($resultempresa);

$sql2 = "select count(*) as total from candidato where email = '$email'";
	$resultcandidato = mysqli_query($conexao, $sql2);
	$rowcandidato = mysqli_fetch_assoc($resultcandidato);
	
	if(($rowempresa['total']==1) or ($rowcandidato['total']==1)){
		$_SESSION['email_existe'] = true;
		header('Location: new-empresa.php');
		exit;
	}
	
//CAMPO IMAGEM

	$_UP['pasta'] = 'foto/';
	
//RENOMEAR FOTO
		

	$novo_nome = md5(time()).'.jpg';


// MOVER A IMAGEM

	move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta']. $novo_nome);


// CAMPO IMAGEM



function validaCNPJ($cnpj = null) {

	// Verifica se um número foi informado
	if(empty($cnpj)) {
		return false;
	}

	// Elimina possivel mascara
	$cnpj = preg_replace("/[^0-9]/", "", $cnpj);
	$cnpj = str_pad($cnpj, 14, '0', STR_PAD_LEFT);
	
	// Verifica se o numero de digitos informados é igual a 11 
	if (strlen($cnpj) != 14) {
		return false;
	}
	
	// Verifica se nenhuma das sequências invalidas abaixo 
	// foi digitada. Caso afirmativo, retorna falso
	else if ($cnpj == '00000000000000' || 
		$cnpj == '11111111111111' || 
		$cnpj == '22222222222222' || 
		$cnpj == '33333333333333' || 
		$cnpj == '44444444444444' || 
		$cnpj == '55555555555555' || 
		$cnpj == '66666666666666' || 
		$cnpj == '77777777777777' || 
		$cnpj == '88888888888888' || 
		$cnpj == '99999999999999') {
		return false;
		
	 // Calcula os digitos verificadores para verificar se o
	 // CPF é válido
	 } else {   
	 
		$j = 5;
		$k = 6;
		$soma1 = "";
		$soma2 = "";

		for ($i = 0; $i < 13; $i++) {

			$j = $j == 1 ? 9 : $j;
			$k = $k == 1 ? 9 : $k;

			$soma2 += ($cnpj{$i} * $k);

			if ($i < 12) {
				$soma1 += ($cnpj{$i} * $j);
			}

			$k--;
			$j--;

		}

		$digito1 = $soma1 % 11 < 2 ? 0 : 11 - $soma1 % 11;
		$digito2 = $soma2 % 11 < 2 ? 0 : 11 - $soma2 % 11;

		return (($cnpj{12} == $digito1) and ($cnpj{13} == $digito2));
	 
	}
}

if(validaCNPJ ($cnpj) == false) {
		$_SESSION['cnpjinvalido'] = true;
		header('Location: new-empresa.php');
		exit;}


$sql = "insert into empresa(cnpj, nome, senha, confirmarsenha, endereco, cep, cidade, uf, email, telefone, numero,sobre, arquivo) VALUES ('$cnpj', '$nome', '$senha', '$confirmarsenha', '$endereco', '$cep', '$cidade', '$uf', '$email', '$telefone', '$numero', '$sobre', '$novo_nome')";
	
	if($conexao->query($sql) === TRUE) {
		$_SESSION['status_cadastro'] = true;
	}
	
	$conexao->close();
	
	header('Location: new-empresa.php');
	exit;
	
?>