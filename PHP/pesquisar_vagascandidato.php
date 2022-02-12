<?php 
	header("content-type: text/html;charset=utf-8");
	session_start();
	include("conexao.php");
	error_reporting(0);
$cpf = $_SESSION['cpf'];
$result_candidato = "SELECT * FROM candidato where cpf ='$cpf'";

$resultado_candidato = mysqli_query($conexao, $result_candidato);
$row_candidato = mysqli_fetch_assoc($resultado_candidato);

$foto = $row_candidato['arquivo'];
$texto = $row_candidato['deficiencia'];



$cnpj = $_SESSION['cnpj'];	
$result_empresa = "SELECT * FROM empresa where cnpj ='$cnpj'";

$resultado_empresa = mysqli_query($conexao, $result_empresa);
$row_empresa = mysqli_fetch_assoc($resultado_empresa);

$cnpjempresa= $row_empresa['cnpj'];
$foto = $row_empresa['arquivo'];
$texto = $row_empresa['sobre'];

	$sql = mysqli_query($conexao, "SELECT * FROM vagas");
	
	$pesquisar = mysqli_real_escape_string($conexao, trim($_POST['pesquisar']));
	$uf = mysqli_real_escape_string($conexao, trim($_POST['uf']));
		
	$result_cursos = "Select * From vagas where uf = '$uf' and (cargo LIKE '%$pesquisar%' OR nomeempresa LIKE '%$pesquisar%' OR deficiencia LIKE '%$pesquisar%') and status =''";
	$resultado_cursos = mysqli_query($conexao, $result_cursos);
	
	
		
			
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
		
 
 		
 				
 								
	
		
		<section class="jobs">
			<div class="container">
				<div class="row heading">
					<h2>Encontre um novo emprego!</h2>					
				</div>
				<div class="row top-pad">
					
				<div class="companies">
					<?php
					
					
					
						$sql = mysqli_query($conexao, "SELECT * FROM vagas");
						
					
					
					while($rows_cursos= mysqli_fetch_array($resultado_cursos)){
			
				echo '<div class="company-list">
						<div class="row">
							<div class="col-md-2 col-sm-2">	
								<img id="fotoperfil" style="width: 100px; height: 100px; margin: 0 auto;" src="foto/'.$rows_cursos['buscarfoto'].'">
							</div>
							<div class="col-md-8 col-sm-8">
								<div class="company-content">
									<h3><i class="fa fa-wrench"></i> Cargo: '.$rows_cursos['cargo'].' <i class="fa fa-blind"></i> Deficiência: '.$rows_cursos['deficiencia'].' <i class="fa fa-wheelchair-alt"></i></h3>
									<p>
									<form action="logincandidatojob.php" method="POST">
									<input required id="id_vaga" name="id_vaga" type="hidden"/ value="'.$rows_cursos['id_vaga'].'" >
									
									
									<span class="company-name"><i class="fa fa-briefcase"></i> &nbsp;'.$rows_cursos['nomeempresa'].'</span>&nbsp;&nbsp;&nbsp;
									<span><i class="fa fa-key"></i>&nbsp;'.$rows_cursos['vaga'].'</span>&nbsp;&nbsp;&nbsp;
									<span class="package"><i class="fa fa-money"></i>&nbsp;R$ '.$rows_cursos['salario'].'</span>
									<br><span class="company-location"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;&nbsp;&nbsp;'.$rows_cursos['endereco'].',&nbsp;&nbsp; '.$rows_cursos['numero'].'&nbsp;&nbsp;-&nbsp;&nbsp;'.$rows_cursos['cidade'].'</span>
									</p>
								</div>
							</div>
							<div class="col-md-2 col-sm-2">
								<button class="btn view-job" name="View Job">VER VAGA!</button>
								
							</div>
							</form>
						</div>
					</div> ';
					
		}	

					
					
						/* while($col = mysqli_fetch_assoc($sql)){
					echo '<div class="company-list">
						<div class="row">
							<div class="col-md-2 col-sm-2">	
								<img id="fotoperfil" style="width: 100px; height: 100px; margin: 0 auto;" src="foto/'.$col['buscarfoto'].'">
							</div>
							<div class="col-md-8 col-sm-8">
								<div class="company-content">
									<h3><i class="fa fa-wrench"></i> Cargo: '.$col['cargo'].' <i class="fa fa-blind"></i> Deficiência: '.$col['deficiencia'].' <i class="fa fa-wheelchair-alt"></i></h3>
									<p>
									<form action="job.php" method="POST">
									<input required id="id_vaga" name="id_vaga" type="hidden"/ value="'.$col['id_vaga'].'" >
									
									
									<span class="company-name"><i class="fa fa-briefcase"></i> &nbsp;'.$col['nomeempresa'].'</span>&nbsp;&nbsp;&nbsp;
									<span><i class="fa fa-key"></i>&nbsp;'.$col['vaga'].'</span>&nbsp;&nbsp;&nbsp;
									<span class="package"><i class="fa fa-money"></i>&nbsp;R$ '.$col['salario'].'</span>
									<br><span class="company-location"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;&nbsp;&nbsp;'.$col['endereco'].',&nbsp;&nbsp; '.$col['numero'].'&nbsp;&nbsp;-&nbsp;&nbsp;'.$col['cidade'].'</span>
									</p>
								</div>
							</div>
							<div class="col-md-2 col-sm-2">
								<button class="btn view-job" name="View Job">VER VAGA!</button>
								
							</div>
							</form>
						</div>
					</div> '; }
					*/?>
					
					
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