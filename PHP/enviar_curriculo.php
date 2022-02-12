<?php
ini_set('default_charset','UTF-8');
session_start();
include("conexao.php");
error_reporting(0); 
header('Content-Type: text/html; charset=utf-8');

$cpf = $_SESSION['cpf'];
$result_candidato = "SELECT * FROM candidato where cpf ='$cpf'";

$resultado_candidato = mysqli_query($conexao, $result_candidato);
$row_candidato = mysqli_fetch_assoc($resultado_candidato);
$nome = $row_candidato['nome'] ;
//$nome = utf8_decode($nome); // FAZER EM TODOS OS CAMPOS
$nasc = $row_candidato['nasc'];
$cep = $row_candidato['cep'];
$endereco = $row_candidato['endereco'];
//$endereco = utf8_decode($endereco); // FAZER EM TODOS OS CAMPOS
$numero = $row_candidato['numero'];
$cidade = $row_candidato['cidade'];
//$cidade = utf8_decode($cidade);
$uf = $row_candidato['uf'];
$email = $row_candidato['email'];
$telefone = $row_candidato['telefone'];
$deficiencia = $row_candidato['deficiencia'];
//$deficiencia = utf8_decode($deficiencia);
$idioma = $row_candidato['idioma'];
//$idioma = utf8_decode($idioma);
$informatica = $row_candidato['informatica'];
//$informatica = utf8_decode($informatica);
$curso1 = $row_candidato['curso1'];
//$curso1 = utf8_decode($curso1);
$curso2 = $row_candidato['curso2'];
//$curso2 = utf8_decode($curso2);
$curso3 = $row_candidato['curso3'];
//$curso3 = utf8_decode($curso3);
$curso4 = $row_candidato['curso4'];
//$curso4 = utf8_decode($curso4);
$curso5 = $row_candidato['curso5'];
//$curso5 = utf8_decode($curso5);
$nomeempresa = $row_candidato['nomeempresa'];
//$nomeempresa = utf8_decode($nomeempresa);
$ultimocargo = $row_candidato['ultimocargo'];
//$ultimocargo = utf8_decode($ultimocargo);
$atribuicoes = $row_candidato['atribuicoes'];
//$atribuicoes = utf8_decode($atribuicoes);
$escolaridade = $row_candidato['escolaridade'];
//$escolaridade = utf8_decode($escolaridade);
$escolaridade2 = $row_candidato['escolaridade2'];
//$escolaridade2 = utf8_decode($escolaridade2);
$situacao = $row_candidato['situacao'];
//$situacao = utf8_decode($situacao);
$situacao2 = $row_candidato['situacao2'];
//$situacao2 = utf8_decode($situacao2);
$nomecurso = $row_candidato['nomecurso'];
//$nomecurso = utf8_decode($nomecurso);
$nomecurso2 = $row_candidato['nomecurso2'];
//$nomecurso2 = utf8_decode($nomecurso2);
$nomeinstituto = $row_candidato['nomeinstituto'];
//$nomeinstituto = utf8_decode($nomeinstituto);
$nomeinstituto2 = $row_candidato['nomeinstituto2'];
//$nomeinstituto2 = utf8_decode($nomeinstituto2);
$emailemp = mysqli_real_escape_string($conexao, trim($_POST['emailempresa']));
$cargo = mysqli_real_escape_string($conexao, trim($_POST['cargo']));
//$cargo = utf8_decode($cargo);

// multiple recipients
$to  = $emailemp; // note the comma


// subject
$subject = 'Você recebeu um curriculo para vaga '.$cargo;
//<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
// message
$message ='
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Pessoas com Necessidades Especiais</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<p><b><u>'.$nome.' lhe enviou um currículo para vaga de '.$cargo.'</b></u></p>
<table>
 <tr>
  <h1>Informações Candidato</h1>
 </tr>
 <tr>
  <th style ="float: left;">Nome:</th><td>'.$nome.'</td>
 </tr>
 <tr>
  <th style ="float: left;">Data de Nascimento:</th><td>'.$nasc.'</td>
 </tr>
 <tr>
  <th style ="float: left;">CEP:</th><td>'.$cep.'</td>
 </tr>
 <tr>
  <th style ="float: left;">Endereço:</th><td>'.$endereco.'</td>
 </tr>
 <tr>
  <th style ="float: left;">Número:</th><td>'.$numero.'</td>
 </tr>
 <tr>
  <th style ="float: left;">Cidade:</th><td>'.$cidade.'</td>
 </tr>
 <tr>
  <th style ="float: left;">Estado:</th><td>'.$uf.'</td>
 </tr>
 <tr>
  <th style ="float: left;">Email:</th><td>'.$email.'</td>
 </tr>
 <tr>
  <th style ="float: left;">Telefone:</th><td>'.$telefone.'</td>
 </tr>
 <tr>
  <th style ="float: left;">Detalhes da Deficiência:</th><td>'.$deficiencia.'</td>
 </tr>
 <tr>
  <h1>Formaçâo Acadêmica</h1>
 </tr>
 <tr>
  <th style ="float: left;">Formação 1:</th>
 </tr>
 <tr>
  <th style ="float: left;">Grau de Escolaridade:</th><td>'.$escolaridade.'</td>
 </tr>
 <tr>
  <th style ="float: left;">Situação:</th><td>'.$situacao.'</td>
 </tr>
 <tr>
  <th style ="float: left;">Curso:</th><td>'.$nomecurso.'</td>
 </tr>
 <tr>
  <th style ="float: left;">Nome da Instituição:</th><td>'.$nomeinstituto.'</td>
 </tr>
 <tr>
  <th style ="float: left;">Formação 2:</th>
 </tr>
 <tr>
  <th style ="float: left;">Grau de Escolaridade:</th><td>'.$escolaridade2.'</td>
 </tr>
 <tr>
  <th style ="float: left;">Situação:</th><td>'.$situacao2.'</td>
 </tr>
 <tr>
  <th style ="float: left;">Curso:</th><td>'.$nomecurso2.'</td>
 </tr>
 <tr>
  <th style ="float: left;">Nome da Instituição:</th><td>'.$nomeinstituto2.'</td>
 </tr>
  <tr>
  <h1>Conhecimento</h1>
 </tr>
 <tr>
  <th style ="float: left;">Idiomas</th>
 </tr>
<tr>
  <th style ="float: left;">Conhecimento de Idiomas:</th><td>'.$idioma.'</td>
</tr>
<tr>
  <th style ="float: left;">Informática</th>
 </tr>
<tr>
  <th style ="float: left;">Conhecimento de Informática:</th><td>'.$informatica.'</td>
</tr>
<tr>
  <h1>Cursos</h1>
 </tr>
 <tr>
 <td>'.$curso1.'</td>
 </tr>
 <tr>
 <td>'.$curso2.'</td>
 </tr>
 <tr>
 <td>'.$curso3.'</td>
 </tr>
 <tr>
 <td>'.$curso4.'</td>
 </tr>
 <tr>
 <td>'.$curso5.'</td>
 </tr>
 <tr>
  <h1>Experiência Profissional</h1>
 </tr>
 <th style ="float: left;">Última Experiência</th>
 </tr>
 <tr>
 <th style ="float: left;">Nome da Empresa</th><td>'.$nomeempresa.'</td>
 </tr>
 <tr>
<th style ="float: left;">Último Cargo</th> <td>'.$ultimocargo.'</td>
 </tr>
 <tr>
 <th style ="float: left;">Atribuições</th><td>'.$atribuicoes.'</td>
 </tr>

</table>
</body>
</html>'
	;

$message = utf8_decode($message);
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'To:' .$nomeempresa.' <'.$emailemp.'>' . "\r\n";
$headers .= 'From: PNE <suporte1.pne@gmail.com>' . "\r\n";

// Mail it
mail($to, $subject, $message, $headers);
?>
<!doctype html>
<html class="no-js" lang="pt-br">
 <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Pessoas com Necessidades Especiais</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
        <!-- Todos Plugin Css --> 
		<link rel="stylesheet" href="css/plugins.css">
		
		<!-- Style & Common Css --> 
		<link rel="stylesheet" href="css/common.css">
        <link rel="stylesheet" href="css/main.css">

    </head>


<section class="login-wrapper">
				<div class="col-md-6 col-sm-8 col-md-offset-3 col-sm-offset-2">
					
						<img class="img-responsive" alt="logo" src="../PHP/img/logo.png">
						<div class="row heading">
							<h1>VOCÊ SE CANDIDATOU A ESTA VAGA!<h1>
							<p>SEU CURRÍCULO FOI ENCAMINHADO A EMPRESA, AGORA AGUARDE UM RETORNO!<p>
						</div>						
						<a type="button" class="btn brows-btn1" href="../PHP/browse-joblogincandidato.php"/>VOLTAR PARA VAGAS</a>
						
					
				</div>
			</div>
		</section>
</html>