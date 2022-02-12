<?php
session_start();
include("conexao.php");
error_reporting(0); 


$col = $_POST['id_vaga'];
$result_vagas = "SELECT * FROM vagas where id_vaga ='$col'";

$resultado_vagas = mysqli_query($conexao, $result_vagas);
$row_vagas = mysqli_fetch_assoc($resultado_vagas);


$foto = $row_vagas['buscarfoto'];



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
					<a class="navbar-brand" href="index.php"><img src="img/logo.png" class="logo" alt=""></a>
				</div>
				<!-- Final da Navegação do Cabeçalho -->

				<!-- Aba de Links para navegar no site -->
				<div class="collapse navbar-collapse" id="navbar-menu">
					<ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
							<li><a href="index.php">Home</a></li> 
							<li><a href="optionlogin.php">Entrar</a></li>
							<li><a href="optioncadastro.php">Cadastrar</a></li>	
							<li><a href="browse-job.php">Vagas</a></li> 							
						</ul>
				</div>
			</div>   
		</nav>
		<!-- Final Navegação -->
   	
    


	<section class="profile-detail">
		<div class="container">
		<div class="row heading">
					<h2>Esta pode ser sua oportunidade!</h2>					
				</div>
			<div class="col-md-12">
				<div class="row">
					<div class="basic-information">
						<div class="col-md-3 col-sm-3">
						 <img id="fotoperfil" style="width: 239.5px; height: 239.5px;"   src="<?php echo "foto/$foto";?>">
						</div>
						<div class="panel-body">
						<div class="col-md-9 col-sm-9">
							<div class="profile-content">
									<h2><?php echo($row_vagas['nomeempresa']);?></h2>
									<p>Agora Contratando:</p>
									<ul class="information">
									
									<li><span>Cargo:</span><?php echo($row_vagas['cargo']);?> </li>
									<li><span>CEP:</span><?php echo($row_vagas['cep']);?></li>
									<li><span>Endereço:</span><?php echo($row_vagas['endereco']);?></li>
									<li><span>Número:</span><?php echo($row_vagas['numero']);?></li>
									<li><span>Cidade:</span><?php echo($row_vagas['cidade']);?></li>
									<li><span>Estado:</span><?php echo($row_vagas['uf']);?></li>
									<li><span>Salário R$:</span><?php echo($row_vagas['salario']);?></li>
									<li><span>Tipo da Vaga:</span><?php echo($row_vagas['vaga']);?></li>
									<li><span>Carga Horária:</span><?php echo($row_vagas['horario']);?></li>
									<li><span>Deficiência:</span><?php echo($row_vagas['deficiencia']);?></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<i class="fa fa-user fa-fw"></i> Sobre a Vaga
							</div>
												<!-- /.panel-heading -->
							<div class="panel-body">
							<p> <?php echo($row_vagas['sobre']);?>
							</div>
						</div>
						
						<div class="panel panel-default">
							<div class="panel-heading">
								<i class="fa fa-coffee fa-fw"></i> Requisitos:
							</div>
												<!-- /.panel-heading -->
							<div class="panel-body">							
							<ul>
								<?php if ($row_vagas['requisito1']!='') { echo '<li>'.$row_vagas['requisito1'].'</li>'; } ?>
								<?php if ($row_vagas['requisito2']!='') { echo '<li>'.$row_vagas['requisito2'].'</li>'; } ?>
								<?php if ($row_vagas['requisito3']!='') { echo '<li>'.$row_vagas['requisito3'].'</li>'; } ?>
								<?php if ($row_vagas['requisito4']!='') { echo '<li>'.$row_vagas['requisito4'].'</li>'; } ?>
								<?php if ($row_vagas['requisito5']!='') { echo '<li>'.$row_vagas['requisito5'].'</li>'; } ?>								
							</ul>
							</div>
						</div>
						
						<div class="panel panel-default">
							<div class="panel-heading">
								<i class="fa fa-leaf fa-fw"></i> Benefícios Adicionais:
							</div>
												<!-- /.panel-heading -->
							<div class="panel-body">							
							<ul>
								<?php if ($row_vagas['beneficio1']!='') { echo '<li>'.$row_vagas['beneficio1'].'</li>'; } ?>
								<?php if ($row_vagas['beneficio2']!='') { echo '<li>'.$row_vagas['beneficio2'].'</li>'; } ?>
								<?php if ($row_vagas['beneficio3']!='') { echo '<li>'.$row_vagas['beneficio3'].'</li>'; } ?>
								<?php if ($row_vagas['beneficio4']!='') { echo '<li>'.$row_vagas['beneficio4'].'</li>'; } ?>
								<?php if ($row_vagas['beneficio5']!='') { echo '<li>'.$row_vagas['beneficio5'].'</li>'; } ?>
							
							</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
					<div id="centralizarbotao">
					<input type="button" class="btn brows-btn" value="Faça Login para se Candidatar!" onclick="window.location='logincandidato.php';" value="Candidato" />
					</div>
		
	</section>

			<!-- Inicio Rodape -->
		<footer>
			<div class="container">
			
		
            	<div class="col-md-3 col-sm-6">
					<h4>Para Candidato e Empresa</h4>
					<ul>
						<li><a href="lei.php">Lei de Cotas</a></li>
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