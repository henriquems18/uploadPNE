<?php
header("content-type: text/html;charset=utf-8");
	session_start();
	include("conexao.php");
	
	$cpf = mysqli_real_escape_string($conexao,trim($_POST['cpf']));
	$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));
	$confirmarsenha = mysqli_real_escape_string($conexao, trim(md5($_POST['confirmarsenha'])));
	$nome = mysqli_real_escape_string($conexao,trim($_POST['nome']));
	$nasc = mysqli_real_escape_string($conexao,trim($_POST['nasc']));
	$numero = mysqli_real_escape_string($conexao, trim($_POST['numero']));
	$cep = mysqli_real_escape_string($conexao, trim($_POST['cep']));
	$endereco = mysqli_real_escape_string($conexao, trim($_POST['endereco']));
	$cidade = mysqli_real_escape_string($conexao, trim($_POST['cidade']));
	$uf = mysqli_real_escape_string($conexao, trim($_POST['uf']));
	$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
	$telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));
	$deficiencia = mysqli_real_escape_string($conexao, trim($_POST['deficiencia']));
	$escolaridade = mysqli_real_escape_string($conexao, trim($_POST['escolaridade']));
	$situacao = mysqli_real_escape_string($conexao, trim($_POST['situacao']));
	$nomecurso = mysqli_real_escape_string($conexao, trim($_POST['nomecurso']));
	$nomeinstituto = mysqli_real_escape_string($conexao, trim($_POST['nomeinstituto']));
	$escolaridade2 = mysqli_real_escape_string($conexao, trim($_POST['escolaridade2']));
	$situacao2 = mysqli_real_escape_string($conexao, trim($_POST['situacao2']));
	$nomecurso2 = mysqli_real_escape_string($conexao, trim($_POST['nomecurso2']));
	$nomeinstituto2 = mysqli_real_escape_string($conexao, trim($_POST['nomeinstituto2']));
	$curso1 = mysqli_real_escape_string($conexao, trim($_POST['curso1']));
	$curso2 = mysqli_real_escape_string($conexao, trim($_POST['curso2']));
	$curso3 = mysqli_real_escape_string($conexao, trim($_POST['curso3']));
	$curso4 = mysqli_real_escape_string($conexao, trim($_POST['curso4']));
	$curso5 = mysqli_real_escape_string($conexao, trim($_POST['curso5']));
	$idioma = mysqli_real_escape_string($conexao, trim($_POST['idioma']));
	$informatica = mysqli_real_escape_string($conexao, trim($_POST['informatica']));
	$nomeempresa = mysqli_real_escape_string($conexao, trim($_POST['nomeempresa']));
	$ultimocargo = mysqli_real_escape_string($conexao, trim($_POST['ultimocargo']));
	$atribuicoes = mysqli_real_escape_string($conexao, trim($_POST['atribuicoes']));
	
	
	$sql = "select count(*) as total from candidato where cpf = '$cpf'";
	$result = mysqli_query($conexao, $sql);
	$row = mysqli_fetch_assoc($result);
	
		if($senha != $confirmarsenha){
		$_SESSION['senha_dif'] = true;
		header('Location: new-candidate.php');
		exit;
		
		}

	if($row['total']==1){
		$_SESSION['usuario_existe'] = true;
		header('Location: new-candidate.php');
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
		

	$novo_nome = $_POST['cpf'].'.jpg';


// MOVER A IMAGEM

	move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta']. $novo_nome);


// CAMPO IMAGEM

function validaCPF($cpf = null) {

	// Verifica se um número foi informado
	if(empty($cpf)) {
		return false;
	}

	// Elimina possivel mascara
	$cpf = preg_replace("/[^0-9]/", "", $cpf);
	$cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
	
	// Verifica se o numero de digitos informados é igual a 11 
	if (strlen($cpf) != 11) {
		return false;
	}
	// Verifica se nenhuma das sequências invalidas abaixo 
	// foi digitada. Caso afirmativo, retorna falso
	else if ($cpf == '00000000000' || 
		$cpf == '11111111111' || 
		$cpf == '22222222222' || 
		$cpf == '33333333333' || 
		$cpf == '44444444444' || 
		$cpf == '55555555555' || 
		$cpf == '66666666666' || 
		$cpf == '77777777777' || 
		$cpf == '88888888888' || 
		$cpf == '99999999999') {
		return false;
	 // Calcula os digitos verificadores para verificar se o
	 // CPF é válido
	 } else {   
		
		for ($t = 9; $t < 11; $t++) {
			
			for ($d = 0, $c = 0; $c < $t; $c++) {
				$d += $cpf{$c} * (($t + 1) - $c);
			}
			$d = ((10 * $d) % 11) % 10;
			if ($cpf{$c} != $d) {
				return false;
			}
		}

		return true;
	}
}

	if(validaCPF ($cpf) == false) {
		$_SESSION['cpfinvalido'] = true;
		header('Location: new-candidate.php');
		exit;}






$sql = "insert into candidato(cpf, nome, nasc, senha, confirmarsenha, endereco, cep, cidade, uf, email, telefone, numero,deficiencia, escolaridade, situacao, nomecurso, nomeinstituto, escolaridade2, situacao2, nomecurso2, nomeinstituto2, curso1, curso2, curso3, curso4, curso5, idioma, informatica, nomeempresa, ultimocargo, atribuicoes, arquivo) VALUES ('$cpf', '$nome', '$nasc', '$senha', '$confirmarsenha', '$endereco', '$cep', '$cidade', '$uf', '$email', '$telefone', '$numero', '$deficiencia', '$escolaridade', '$situacao', '$nomecurso', '$nomeinstituto', '$escolaridade2', '$situacao2', '$nomecurso2', '$nomeinstituto2', '$curso1', '$curso2', '$curso3', '$curso4', '$curso5', '$idioma', '$informatica', '$nomeempresa', '$ultimocargo', '$atribuicoes', '$novo_nome')";
	
	
	
	if($conexao->query($sql) === TRUE) {
		$_SESSION['status_cadastro'] = true;
	}
	
	$conexao->close();
	
	header('Location: new-candidate.php');
	exit;
	
?>