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
   	
   

	<section class="profile-detail">
	<div class="container">
			<?php
				if(@$_SESSION['senha_dif']):
				?>
				<div id="paginacao">
					<div style="width:195px; height:inherit; margin:0 auto;">
					<p style="text-align: center">Essas senhas não coincidem. Tentar Novamente!</p>
					</div>
				</div>
				<?php
				endif;
				unset($_SESSION['senha_dif']);
				?>
		<?php 					
				if(@$_SESSION['idade_invalida']):
				?>
				<div id="paginacao">
					<div style="width:195px; height:inherit; margin:0 auto;">
					<p style="text-align: center">Idade abaixo do necessario para cadastro!</p>
					</div>
				</div>
				<?php
				endif;
				unset($_SESSION['idade_invalida']);
				?>
			<?php
				if(@$_SESSION['status_cadastro']):
				?>
				<div id="paginacao">
					<div style="width:195px; height:inherit; margin:0 auto;">
					<h3 style="text-align: center">Cadastro Efetuado!</h3>
					<p style="text-align: center">FAÇA O LOGIN INFORMANDO SEU USUÁRIO E SENHA</p>
					<input type="button" onClick="window.location='logincandidato.php';" class="btn brows-btn1" value="CLICANDO AQUI!"/>
					</div>
				</div>
				<?php
				endif;
				unset($_SESSION['status_cadastro']);
				?>
				<?php
				if($_SESSION['usuario_existe']):
				?>
						<div id="paginacao">
							<div style="width:195px; height:inherit; margin:0 auto;">
							<h3 style="text-align: center">Cadastro Não Efetuado!</h3>
								<p style="text-align: center">ESTE CPF JÁ FOI CADASTRADO!</br>	FAÇA O LOGIN INFORMANDO SEU USUÁRIO E SENHA!</p>
								<input type="button" onClick="window.location='logincandidato.php';" class="btn brows-btn1" value="CLICANDO AQUI!"/>
							</div>
						</div>

				<?php
				endif;
				unset($_SESSION['usuario_existe']);
				?>
				<?php
				if($_SESSION['cpfinvalido']):
				?>
						<div id="paginacao">
							<div style="width:195px; height:inherit; margin:0 auto;">
								<p style="text-align: center"><b>CPF INVÁLIDO!</b></br>CADASTRE</br> UM CPF VÁLIDO!</p>
							</div>
						</div>
				<?php
				endif;
				unset($_SESSION['cpfinvalido']);
				?>
				<?php
				if($_SESSION['email_existe']):
				?>
						<div id="paginacao">
							<div style="width:195px; height:inherit; margin:0 auto;">
								<p style="text-align: center"><b>E-MAIL CADASTRADO!</b></br>CADASTRE</br> OUTRO E-MAIL!</p>
							</div>
						</div>
				<?php
				endif;
				unset($_SESSION['email_existe']);
				?>
				
		<form id="formulario" method="post" action="cadastro.php" enctype="multipart/form-data" autocomplete="off">
		<div class="row heading">
			</div>
			<div class="col-md-12">
				<div class="row">
					<div class="basic-information">
						<div class="col-md-3 col-sm-3">
						 <img id="fotoperfil" style="width: 239.5px; height: 239.5px;" src="img/user.png" >
						</div>
						<div class="panel-body">
						<div class="col-md-9 col-sm-9">
							<div class="profile-content">
									<h2>PNE</h2>
									<p>Cadastra-se:</p>
									<ul class="information">
										<li><span>Foto:</span><input id="arquivo" name="arquivo" type="file" onChange="previewImagem()"/></li>									
										<li><span>CPF:</span><input id="cpf" required name="cpf" type="text" maxlength="14" onKeyDown="javascript: fMasc( this, mCPF);"/> Somente Números<br> Esse campo será usado como login para acesso ao portal, essa informação não será exibida em seu currículo.</li>
										<li><span>Senha:</span><input id="senha" required name="senha" type="password"/></li>
										<li><span>Confirmar Senha:</span><input id="confirmarsenha" required name="confirmarsenha" type="password" onblur="validatePassword(this.value);" /></li>
										<li><span>Nome:</span><input id="nome" required name="nome" type="text"/></li>	
										<li><span>Data de Nascimento:</span><input id="nasc" name="nasc" type="text" maxlength="10" placeholder="DD/MM/YYYY" onKeyDown="javascript: fMasc( this, mData);" onblur="javascript: validateDate(this);"/></li>	
										<li><span>CEP:</span><input id="cep" required name="cep" type="text" maxlength="9" onblur="pesquisacep(this.value);" onKeyDown="javascript: fMasc( this, mCEP);"/></li>
										<li><span>Endereço:</span><input required id="endereco" name="endereco" type="text"/></li>
										<li><span>Número:</span><input required id="numero" name="numero" type="text"/></li>	
										<li><span>Cidade</span><input required id="cidade" name="cidade" type="text"/></li>										
										<li><span>Estado</span><input required id="uf" name="uf" maxlength="2" type="text"/></li>
										<li><span>Email:</span><input required id="email" name="email" type="email"/></li>
										<li><span>Telefone:</span><input required id="telefone" name="telefone" type="tel" maxlength="14" onKeyDown="javascript: fMasc( this, mTel);"/></li>			
											
									</ul>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<i class="fa fa-wheelchair fa-fw"></i> Detalhes da Deficiência:
							</div>
												<!-- /.panel-heading -->
							<div class="panel-body">							
								<textarea required name="deficiencia" placeholder="Descreva quais deficiência você possui como por exemplo Auditivo, Fisica, Mental, Visual ou outros, e fale um pouco sobre ela." ></textarea><br>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<i class="fa fa-graduation-cap fa-fw"></i> Formação Acadêmica:
							</div>
												<!-- /.panel-heading -->
							<div class="panel-body">							
							<div class="profile-content">
							<ul class="information">
								<p>Formação 1</p>
								<li><span>Grau de Escolaridade</span><input id="escolaridade" name="escolaridade" type="text"/>&nbsp;&nbsp;&nbsp;<br><i>Informe seu nivel de escolaridade como por exemplo Graduação, Pós-Graduação, MBA, Mestrado, Doutorado, Técnico, Ensino Médio, Ensino Fundamental entre outros relacionados.</i></li>

									
									
									
								<li><span>Situação</span><input id="escolaridade" name="situacao" type="text" />&nbsp;&nbsp;&nbsp;<br><i>Informe a situação do seu curso como por exemplo Concluído, Cursando, Trancado entre outros relacionados.</i></li>

								<li><span>Curso</span><input id="nomecurso" name="nomecurso" type="text"/></li>
								<li><span>Nome da Instituição</span><input id="nomeinstituto" name="nomeinstituto" type="text"/></li>
								
								<p>Formação 2</p>
								<li><span>Grau de Escolaridade</span><input id="escolaridade2" name="escolaridade2" type="text"/>&nbsp;&nbsp;&nbsp;<br><i>Informe seu nivel de escolaridade como por exemplo Graduação, Pós-Graduação, MBA, Mestrado, Doutorado, Técnico, Ensino Médio, Ensino Fundamental entre outros relacionados.</i></li>

									
									
									
								<li><span>Situação</span><input id="escolaridade" name="situacao2" type="text" />&nbsp;&nbsp;&nbsp;<br><i>Informe a situação do seu curso como por exemplo Concluído, Cursando, Trancado entre outros relacionados.</i></li>
								<li><span>Curso</span><input id="nomecurso2" name="nomecurso2" type="text"/></li>
								<li><span>Nome da Instituição</span><input id="nomeinstituto2" name="nomeinstituto2" type="text"/></li>							
							</ul>
								</div>
							</div>
						</div>
						
						<div class="panel panel-default">
							<div class="panel-heading">
								<i class="fa fa-graduation-cap fa-fw"></i> Conhecimento:
							</div>
												<!-- /.panel-heading -->
							<div class="panel-body">							
							<div class="profile-content">
							<ul class="information">
							<p>Conhecimento de Idiomas</p>
								
									<div class="panel-body">							
								<textarea id="idioma" name="idioma" placeholder="Descreva você um algum idioma como por exemplo Alemão, Espanhol, Francês, Inglês, Italiano, Japonês entre outros, e qual sua fluência destes idiomas Básico, Itermediário ou Avançado?"></textarea><br>
							</div>
										<p>Conhecimento de Informática</p>
								
							<div class="panel-body">							
								<textarea id="informatica" name="informatica" placeholder="Descreva seus conhecimentos em informática"></textarea><br>
							</div>							
							</ul>
							</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<i class="fa fa-wrench fa-fw"></i> Cursos:
							</div>
												<!-- /.panel-heading -->
							<div class="panel-body">							
							<ul>
								<li><input id="curso1" name="curso1" type="text"/></li>
								<li><input id="curso2" name="curso2" type="text"/></li>
								<li><input id="curso3" name="curso3" type="text"/></li>
								<li><input id="curso4" name="curso4" type="text"/></li>
								<li><input id="curso5" name="curso5" type="text"/></li>
							</ul>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<i class="fa fa-gear fa-fw"></i> Experiência Profissional:
							</div>
												<!-- /.panel-heading -->
							<div class="panel-body">							
							<div class="profile-content">
							<ul class="information">
								<p>Última Experiência</p>								
								<li><span>Nome da Empresa</span><input id="nomeempresa" name="nomeempresa" type="text"/></li>
								<li><span>Último Cargo</span><input id="ultimocargo" name="ultimocargo" type="text"/></li>
								<li><span>Atribuições:</span></li>
								<div class="panel-body">
							<textarea name="atribuicoes"></textarea><br>
							</div>							
							</div>																												
							</ul>
								</div>
							</div>
						</div>					
					</div>
				</div>
			</div>
		
				<div id="paginacao">
					<div id="centralizarbotao3">
					<input type="submit" class="btn brows-btn1" value="Cadastrar"/>
					<input id="botaolimpar" type="reset" class="btn brows-btn1" value="limpar"/>
					</div>
					
					
				</div>
				</form>
		
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

		
				
		<script>
			var senha = document.getElementById("senha"), confirmarsenha = document.getElementById("confirmarsenha");
			function validatePassword(){
				if(senha.value != confirmarsenha.value){
					
					alert("Essas senhas não coincidem. Tentar Novamente!");
				}
			}
						
		</script>
		
		<!-- VER IMAGEM -->
	
		
<script type="text/javascript">
function validateDate(id) {
var RegExPattern = /^((((0?[1-9]|[12]\d|3[01])[\.\-\/](0?[13578]|1[02])[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|((0?[1-9]|[12]\d|30)[\.\-\/](0?[13456789]|1[012])[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|((0?[1-9]|1\d|2[0-8])[\.\-\/]0?2[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|(29[\.\-\/]0?2[\.\-\/]((1[6-9]|[2-9]\d)?(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00)|00)))|(((0[1-9]|[12]\d|3[01])(0[13578]|1[02])((1[6-9]|[2-9]\d)?\d{2}))|((0[1-9]|[12]\d|30)(0[13456789]|1[012])((1[6-9]|[2-9]\d)?\d{2}))|((0[1-9]|1\d|2[0-8])02((1[6-9]|[2-9]\d)?\d{2}))|(2902((1[6-9]|[2-9]\d)?(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00)|00))))$/;

if (!((id.value.match(RegExPattern)) && (id.value!=''))) {
alert('Data inválida.');
}
}
</script>
		
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script>
		function previewImagem(){
			var arquivo = document.querySelector('input[name=arquivo]').files[0];
			var preview = document.querySelector("#fotoperfil")
			
			var reader = new FileReader();
			
			reader.onloadend = function(){
				preview.src = reader.result;
			}
			if(arquivo){
				reader.readAsDataURL(arquivo);
			}else{
				preview.src = "";
			}
		}
			
	</script>
		<!-- CRIAR MASCARA -->
		<script type="text/javascript">
			function fMasc(objeto,mascara) {
				obj=objeto
				masc=mascara
				setTimeout("fMascEx()",1)
			}
			function fMascEx() {
				obj.value=masc(obj.value)
			}
			function mTel(tel) {
				tel=tel.replace(/\D/g,"")
				tel=tel.replace(/^(\d)/,"($1")
				tel=tel.replace(/(.{3})(\d)/,"$1)$2")
				if(tel.length == 9) {
					tel=tel.replace(/(.{1})$/,"-$1")
				} else if (tel.length == 10) {
					tel=tel.replace(/(.{2})$/,"-$1")
				} else if (tel.length == 11) {
					tel=tel.replace(/(.{3})$/,"-$1")
				} else if (tel.length == 12) {
					tel=tel.replace(/(.{4})$/,"-$1")
				} else if (tel.length > 12) {
					tel=tel.replace(/(.{4})$/,"-$1")
				}
				return tel;
			}
			function mCNPJ(cnpj){
				cnpj=cnpj.replace(/\D/g,"")
				cnpj=cnpj.replace(/^(\d{2})(\d)/,"$1.$2")
				cnpj=cnpj.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3")
				cnpj=cnpj.replace(/\.(\d{3})(\d)/,".$1/$2")
				cnpj=cnpj.replace(/(\d{4})(\d)/,"$1-$2")
				return cnpj
			}
			function mCPF(cpf){
				cpf=cpf.replace(/\D/g,"")
				cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
				cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
				cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
				return cpf
			}
			function mCEP(cep){
				cep=cep.replace(/\D/g,"")
				cep=cep.replace(/^(\d{5})(\d)/,"$1-$2")
				cep=cep.replace(/\.(\d{3})(\d)/,".$1-$2")
				return cep
			}
			function mData(data){
				data=data.replace(/\D/g,"")
				data=data.replace(/(\d{2})(\d)/,"$1/$2")
				data=data.replace(/(\d{2})(\d)/,"$1/$2")
				
				return data
			}
			function mNum(num){
				num=num.replace(/\D/g,"")
				return num
			}
		</script>

</script>
		
		<!-- VALIDAR CEP -->
	 <script type="text/javascript" >
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('endereco').value=("");
            document.getElementById('cidade').value=("");
			document.getElementById('uf').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('endereco').value=(conteudo.logradouro);
            document.getElementById('cidade').value=(conteudo.localidade);
			document.getElementById('uf').value=(conteudo.uf);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('endereco').value="...";
                document.getElementById('cidade').value="...";
				document.getElementById('uf').value="...";
				

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };
		
		
	</script>
		 
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/owl.carousel.min.js"></script>
		<script src="js/bootsnav.js"></script>
		<script src="js/main.js"></script>
    </body>
</html>

