<?php 
session_start();
include("conexao.php");
error_reporting(0); 
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
		<!-- Tela de Login -->
		<section class="login-wrapper">
			<div class="container">
                <?php if(count($erro) > 0)
	                foreach($erro as $msg){
	                echo "<p>$msg</p>";
                }
                ?>
				<div class="col-md-6 col-sm-8 col-md-offset-3 col-sm-offset-2">
					<form id="login" action="../PHPMailer-master/alterarsenhaemp.php" method="POST">
						<img class="img-responsive" alt="logo" src="img/logo.png">
						<div class="row heading">
							<h2>Informe seu E-mail</h2>
						</div>
						<input type="text" name="email" class="form-control input-lg" placeholder="E-mail">
						<input name="ok" value="Enviar" type="submit">
						
					</form>
				</div>
			</div>
		</section>
		<!-- login section End -->	
		

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