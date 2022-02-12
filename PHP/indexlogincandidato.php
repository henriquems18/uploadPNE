<?php 
session_start();
include("conexao.php");
error_reporting(0); echo($cpf);

$cpf = $_SESSION['cpf'];
$result_candidato = "SELECT * FROM candidato where cpf ='$cpf'";

$resultado_candidato = mysqli_query($conexao, $result_candidato);
$row_candidato = mysqli_fetch_assoc($resultado_candidato);


//$cnpj = $_SESSION['cnpj'];
//$result_empresa = "SELECT * FROM empresa where cnpj ='$cnpj'";
//echo($cnpj);
//echo($cpf);

//$resultado_empresa = mysqli_query($conexao, $result_empresa);
//$row_empresa = mysqli_fetch_assoc($resultado_empresa);


$id_vaga = $_SESSION['id_vaga'];
$result_vagas = "SELECT * FROM vagas where id_vaga ='$id_vaga'";

$resultado_vagas = mysqli_query($conexao, $result_vagas);
$row_vagas = mysqli_fetch_assoc($resultado_vagas);

$vagaspublicada= $row_vagas['id_vaga'];
$foto = $row_empresa['arquivo'];
$texto = $row_empresa['sobre'];


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
		
		<?php
				if(@$_SESSION['status_cadastro']):
				?>
				<div id="paginacao">
					<div style="width:195px; height:inherit; margin:0 auto;">
					<h4 style="text-align: center">E-mail Cadastrado!</h4>
					<p style="text-align: center">VOCÊ RECEBERA NOVAS VAGAS DIRETAMENTE NO SEU E-MAIL!</p>
				
					</div>
				</div>
			<?php
				endif;
				unset($_SESSION['status_cadastro']);
			?>
			<?php
				if($_SESSION['email_existe']):
				?>
			
			<div id="paginacao">
					<div style="width:195px; height:inherit; margin:0 auto;">
					<h4 style="text-align: center">Este E-mail Já Foi Cadastrado!</h4>
					<p style="text-align: center">VOCÊ JÁ RECEBE NOSSAS VAGAS!</p>
				
					</div>
				</div>
				<?php
				endif;
				unset($_SESSION['email_existe']);
				?>
		
	<!-- Tela principal para pesquisa de vagas -->
		<section class="main-banner" style="background:#242c36 url(img/slider-01.jpg) no-repeat">
			<div class="container">
				<div class="caption">
						<h2>Comece sua carreira agora!</h2>
					<form id="formulario" method="post" action="pesquisar_vagascandidato.php">
						<fieldset>
						
							<div class="col-md-4 col-sm-4 no-pad" >
								<input id="pesquisar" name="pesquisar" type="text" class="form-control border-right" placeholder="Palavras-chave" />
							</div>
							<div class="col-md-3 col-sm-3 no-pad">
								<select class="selectpicker border-right" name="uf">
								  <option>-- Estado --</option>
								  <option value="AC">Acre</option>
								  <option value="AL">Alagoas</option>
								  <option value="AP">Amapá</option>
								  <option value="AM">Amazonas</option>
								  <option value="BA">Bahia</option>
								  <option value="CE">Ceará</option>
								  <option value="DF">Distrito Federal</option>
								  <option value="ES">Espírito Santo</option>
								  <option value="GO">Goiás</option>
								  <option value="MA">Maranhão</option>
								  <option value="MT">Mato Grosso</option>
								  <option value="MS">Mato Grosso do Sul</option>
								  <option value="MG">Minas Gerais</option>
								  <option value="PA">Pará</option>
							  	  <option value="PB">Paraiba</option>
							  	  <option value="PR">Paraná</option>
								  <option value="PE">Pernambuco</option>
							  	  <option value="PI">Piauí</option>
							  	  <option value="RJ">Rio de Janeiro</option>
							  	  <option value="RN">Rio Grande do Norte</option>
							  	  <option value="RS">Rio Grande do Sul</option>
							  	  <option value="RO">Rondônia</option>
							  	  <option value="RR">Rorâima</option>
							  	  <option value="SC">Santa Catarina</option>
							  	  <option value="SP">São Paulo</option>
							  	  <option value="SE">Sergipe</option>
							  	  <option value="TO">Tocantins</option>
								  								  
								</select>
							</div>
							
						
							<div class="col-md-5 col-sm-5 no-pad">
								<input type="submit" class="btn seub-btn" value="pesquisar vagas" />
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</section>		
		<!-- Tela de vagas em destaque -->
		<section class="jobs">
			<div class="container">
				<div class="row heading">
					<h2>Vagas em Destaque</h2>					
				</div>
				<div class="companies">
						<?php
						//Receber o numero da pagina
						$pagina_atual= filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);
						$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
						
				
					//Setar a quantidade de itens por pagina
						$qnt_result_pg= 5;
						
					//Calcular inicio da inicialização
						$inicio= ($qnt_result_pg * $pagina) - $qnt_result_pg;
					
					
					
						$sql = mysqli_query($conexao, "SELECT * FROM vagas where status = '' LIMIT $inicio,$qnt_result_pg");
						
						while($col = mysqli_fetch_assoc($sql)){
					echo '<div class="company-list">
						<div class="row">
							<div class="col-md-2 col-sm-2">	
								<img id="fotoperfil" style="width: 100px; height: 100px; margin: 0 auto;" src="foto/'.$col['buscarfoto'].'">
							</div>
							<div class="col-md-8 col-sm-8">
								<div class="company-content">
									<h3><i class="fa fa-wrench"></i> Cargo: '.$col['cargo'].' <i class="fa fa-blind"></i> Deficiência: '.$col['deficiencia'].' <i class="fa fa-wheelchair-alt"></i></h3>
									<p>
									<form action="logincandidatojob.php" method="POST">
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
					?>
					</div>
				<div class="row">
					<input type="button" class="btn brows-btn" onclick="window.location='browse-job.php';" value="Veja mais vagas" />
				</div>
			</div>
		</section>
		<!-- Tela para cadastrar o email para receber vagas publicadas no site -->
		
		<section class="newsletter">
		<form id="formulario" method="post" action="enviar_vagascandidato.php" enctype="multipart/form-data" autocomplete="off">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1">
					<h2>Quer receber notificações de novos trabalhos publicados? </h2>
					<p>Cadastre-se em nossa lista para receber novas atualizações quando chegar um novo emprego!</p>
					<div class="input-group">
					
						<input required id="email" name="email" type="hidden"
						class="form-control" value="<?php echo($row_candidato['email']);?>"
										>
						<span class="input-group-btn">
						
							<button type="submit" class="btn btn-default" style="width: 200px; border-radius: 0px;">CADASTRAR!</button>
						</span>
					</div>
					</div>
				</div>
			</div>
		</form>	
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