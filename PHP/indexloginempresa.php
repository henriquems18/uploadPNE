<?php 
session_start();
include("conexao.php");
error_reporting(0); 
$cnpj = $_SESSION['cnpj'];
$result_empresa = "SELECT * FROM empresa where cnpj ='$cnpj'";

$resultado_empresa = mysqli_query($conexao, $result_empresa);
$row_empresa = mysqli_fetch_assoc($resultado_empresa);

$cnpjempresa= $row_empresa['cnpj'];
$foto = $row_empresa['arquivo'];
$texto = $row_empresa['sobre'];
$nomedaempresa = $row_empresa['nome'];

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
					<a class="navbar-brand" href="indexloginempresa.php"><img src="img/logo.png" class="logo" alt=""></a>
				</div>
				<!-- Final da Navegação do Cabeçalho -->

				<!-- Aba de Links para navegar no site -->
				<div class="collapse navbar-collapse" id="navbar-menu">
					<ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
							<li><a href="indexloginempresa.php">Home</a></li> 
							<li><a href="perfil-empresa.php">Perfil Empresa</a></li>
							<li><a href="new-job.php">Postar Vaga</a></li>
							<li><a href="listar-vagas.php">Vagas Publicadas</a></li>
							<li><a href="logout.php">Sair</a></li> 							
						</ul>
				</div>
			</div>   
		</nav>
		<!-- Final Navegação -->
		
	<!-- Tela principal para pesquisa de vagas -->
		<section class="main-banner" style="background:#242c36 url(img/slider2.png) no-repeat">
			<div class="container">
				<div class="caption">
					<h2>Encontre novos talentos!</h2>
					<form>
						<fieldset>
						
							
								<input type="button" class="btn seub-btn" value="PUBLICAR NOVA VAGA" onclick="window.location='new-job.php';" />
							
						</fieldset>
					</form>
				</div>
			</div>
		</section>
		
		<!-- Tela de vagas em destaque -->
		<section class="jobs">
			<div class="container">
				<div class="row heading">
					<h2>Suas Vagas Publicada!</h2>					
				</div>
				<?php
					
						//Receber o numero da pagina
						$pagina_atual= filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);
						$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
						
				
					//Setar a quantidade de itens por pagina
						$qnt_result_pg= 5;
						
					//Calcular inicio da inicialização
						$inicio= ($qnt_result_pg * $pagina) - $qnt_result_pg;
					
					
						$sql = mysqli_query($conexao, "SELECT id_vaga,cargo,deficiencia,endereco,numero,cidade,salario,vaga FROM vagas where cnpj ='$cnpjempresa' and status = 'encerrado' LIMIT $inicio,$qnt_result_pg");
						
						
								while($col = mysqli_fetch_assoc($sql)){
					echo '<div class="company-list">
						<div class="row">
							<div class="col-md-2 col-sm-2">	
								<img id="fotoperfil" style="width: 100px; height: 100px; margin: 0 auto;" src="foto/'.$foto.'">
							</div>
							<div class="col-md-8 col-sm-8">
								<div class="company-content">
									<h3><i class="fa fa-wrench"></i> Cargo: '.$col['cargo'].' <i class="fa fa-blind"></i> Deficiência: '.$col['deficiencia'].' <i class="fa fa-wheelchair-alt"></i></h3>
									<p>
									<form action="puxarvagaencerrada.php" method="POST">
									<input required id="id_vaga" name="id_vaga" type="hidden"/ value="'.$col['id_vaga'].'" >
									
									
									<span class="company-name"><i class="fa fa-briefcase"></i> &nbsp;'.$nomedaempresa.'</span>&nbsp;&nbsp;&nbsp;
									<span><i class="fa fa-key"></i>&nbsp;'.$col['vaga'].'</span>&nbsp;&nbsp;&nbsp;
									<span class="package"><i class="fa fa-money"></i>&nbsp;R$ '.$col['salario'].'</span>
									<br><span class="company-location"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;&nbsp;&nbsp;'.$col['endereco'].',&nbsp;&nbsp; '.$col['numero'].'&nbsp;&nbsp;-&nbsp;&nbsp;'.$col['cidade'].'</span>
									</p>
								</div>
							</div>
							<div class="col-md-2 col-sm-2">
								<button class="btn view-job" name="View Job">ENCERRADA!</button>
								
							</div>
							</form>
						</div>
					</div> '; }
					
				
				$sql = mysqli_query($conexao, "SELECT id_vaga,cargo,deficiencia,endereco,numero,cidade,salario,vaga FROM vagas where cnpj ='$cnpjempresa' and status = '' LIMIT $inicio,$qnt_result_pg");
						
						
								while($col = mysqli_fetch_assoc($sql)){
					echo '<div class="company-list">
						<div class="row">
							<div class="col-md-2 col-sm-2">	
								<img id="fotoperfil" style="width: 100px; height: 100px; margin: 0 auto;" src="foto/'.$foto.'">
							</div>
							<div class="col-md-8 col-sm-8">
								<div class="company-content">
									<h3><i class="fa fa-wrench"></i> Cargo: '.$col['cargo'].' <i class="fa fa-blind"></i> Deficiência: '.$col['deficiencia'].' <i class="fa fa-wheelchair-alt"></i></h3>
									<p>
									<form action="puxarvaga.php" method="POST">
									<input required id="id_vaga" name="id_vaga" type="hidden"/ value="'.$col['id_vaga'].'" >
									
									
									<span class="company-name"><i class="fa fa-briefcase"></i> &nbsp;'.$nomedaempresa.'</span>&nbsp;&nbsp;&nbsp;
									<span><i class="fa fa-key"></i>&nbsp;'.$col['vaga'].'</span>&nbsp;&nbsp;&nbsp;
									<span class="package"><i class="fa fa-money"></i>&nbsp;R$ '.$col['salario'].'</span>
									<br><span class="company-location"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;&nbsp;&nbsp;'.$col['endereco'].',&nbsp;&nbsp; '.$col['numero'].'&nbsp;&nbsp;-&nbsp;&nbsp;'.$col['cidade'].'</span>
									</p>
								</div>
							</div>
							<div class="col-md-2 col-sm-2">
								<button class="btn view-job" name="View Job">EDITAR VAGA!</button>
								
							</div>
							</form>
						</div>
					</div> '; }
					
					?>
					
					
					

				<div class="row">
					<input type="button" class="btn brows-btn" onclick="window.location='listar-vagas.php';" value="Veja suas vagas publicadas" />
				</div>
			</div>
		</section>
		<!-- Tela para cadastrar o email para receber vagas publicadas no site -->
		
			
				<!-- Inicio Rodape -->
		<footer>
			<div class="container">
			
		
            	<div class="col-md-3 col-sm-6">
					<h4>Para Candidato e Empresa</h4>
					<ul>
						<li><a href="leiempresa.php">Lei de Cotas</a></li>
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