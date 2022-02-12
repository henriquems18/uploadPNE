<?php 
session_start();
include("conexao.php");
error_reporting(0); 
$cpf = $_SESSION['cpf'];
$result_candidato = "SELECT * FROM candidato where cpf ='$cpf'";

$resultado_candidato = mysqli_query($conexao, $result_candidato);
$row_candidato = mysqli_fetch_assoc($resultado_candidato);

$foto = $row_candidato['arquivo'];
$texto = $row_candidato['deficiencia'];


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
	
    <body>
	
		<!-- Inicio da Navegação  -->
		<nav class="navbar navbar-default navbar-sticky bootsnav">

			<div class="container">      
				<!-- Inicio da Navegação do Cabeçalho -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
						<i class="fa fa-bars"></i>
					</button>
					<a class="navbar-brand" href="indexlogincandidato.php"><img src="img/logo.png" class="logo" alt=""></a>
				</div>
				<!-- Final da Navegação do Cabeçalho -->

				<!-- Aba de Links para navegar no site -->
				<div class="collapse navbar-collapse" id="navbar-menu">
					<ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
							<li><a href="indexlogincandidato.php">Home</a></li> 
							<li><a href="perfil-candidate.php">Perfil Candidato</a></li>							
							<li><a href="browse-joblogincandidato.php">Vagas</a></li>
							<li><a href="logout.php">Sair</a></li> 							
						</ul>
				</div>
			</div>   
		</nav>
		<!-- Final Navegação -->
   	
    


	<section class="profile-detail">
		<div class="container">
		<div class="row heading">
					<h2>Lei 8213/91 Lei de Cotas para Deficientes e Pessoas com Deficiencia</h2>					
				</div>
			<div class="col-md-12">
				<div class="row">
					<div class="basic-information">
						
					
						
							<div class="panel-body">
							<p>No que diz respeito à empregabilidade, a Lei de Cotas é uma das leis mais importantes para a inserção desta parcela da população no mercado de trabalho – além de ser o principal instrumento de inclusão. A Lei nº 8.213 foi implantada em 24 de julho de 1991 e teve sua regulamentação nove anos depois – período em que a fiscalização de seu cumprimento tornou-se mais presente nas empresas.
O objetivo da Lei de Cotas é promover a inclusão, estabelecendo a reserva de 2% a 5% das vagas de emprego para pessoas com deficiência ou usuários reabilitados pela Previdência Social nas empresas com 100 ou mais funcionários. O preenchimento da cota varia de acordo com a proporção abaixo (e o seu não-cumprimento é punível com multa):

<br><br>Até 200 funcionários: 2%
<br>De 201 a 500 funcionários: 3%
<br>De 501 a 1000 funcionários: 4%
<br>De 1001 em diante funcionários: 5%
<br><br>A fiscalização da Lei de Cotas é feita por auditores fiscais do Ministério do Trabalho e Emprego (MTE) e do Ministério Público do Trabalho (MPT). O seu não-cumprimento é punível com multa. Uma vez que é identificado que a empresa não cumpre a cota corretamente, é emitido um aviso para que o cumprimento seja feito em até 90 dias. Caso não apresente avanços neste período, a empresa é autuada.

O principal papel da Lei de Cotas e da fiscalização é servir como instrumento de conscientização, já que a obrigatoriedade de contratar pessoas com deficiência contribui para a criação de um mercado de trabalho inclusivo e democrático, pensado para todos.</p>	
							</div>
						
							</div>
						</div>
					</div>
				</div>
		
				
		
	</section>

<!-- Inicio Rodape -->
		<footer>
			<div class="container">
			
		
            	<div class="col-md-3 col-sm-6">
					<h4>Para Candidato e Empresa</h4>
					<ul>
						<li><a href="leicandidato.php">Lei de Cotas</a></li>
					</ul>
				</div>
				
				
				
				<div class="col-md-3 col-sm-6">
					<h4>Sobre Nós</h4>
					<address>
					<ul>
					<li>Av. Imperatriz Leopoldina, 550 - Vila Leopoldina, São Paulo</li>
					<li>Email: suporte1.pne@gmail.com</li>
					<li>Telefone: (011) 9 6856 0789</li>
					
					</ul>
					</address>
				</div>
				<div class="col-md-3 col-sm-6">
					<h4>PNE</h4>
                    <p>Pessoas com Necessidades Especiais é um sistema desenvolvido afim de facilitar a comunicação entre empresas e PCD (Pessoas com Deficiência) a fim de preencher as cotas exigidas por lei </p>
				</div>
	<div class="col-md-3 col-sm-6">
   <img class="img-responsive" alt="logo" src="img/logo1.png">
				</div>
			
				
			</div>
			<div class="copy-right">
			 
			</div>
		</footer>
		<!-- Fim rodape -->		 
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/owl.carousel.min.js"></script>
		<script src="js/bootsnav.js"></script>
		<script src="js/main.js"></script>
    </body>
</html>