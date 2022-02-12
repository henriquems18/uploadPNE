<?php 
session_start();
include("conexao.php");
error_reporting(0);

$id_vaga = $_SESSION['id_vaga'];
$result_vagas = "SELECT * FROM vagas where id_vaga ='$id_vaga'";

$resultado_vagas = mysqli_query($conexao, $result_vagas);
$row_vagas = mysqli_fetch_assoc($resultado_vagas);



$cnpj = $_SESSION['cnpj'];
$result_empresa = "SELECT * FROM empresa where cnpj ='$cnpj'";

$resultado_empresa = mysqli_query($conexao, $result_empresa);
$row_empresa = mysqli_fetch_assoc($resultado_empresa);

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
   	
    


	<section class="profile-detail">
	<div class="container">
	<?php
				if(@$_SESSION['status_atualizado']):
				?>
				<div id="paginacao">
					<div style="width:195px; height:inherit; margin:0 auto;">
					<h3 style="text-align: center">Vaga Atualizado!</h3>
					</div>
				</div>
				<?php
				endif;
		unset($_SESSION['status_atualizado']);
				?>

		<form id="formulario" method="post" action="editar_vagas.php">
		
			<div class="col-md-12">
				<div class="row">
					<div class="basic-information">
			<div class="row heading">
				<h2>Informações da Vaga!</h2>					
				<p style="text-align: center">Atualize os dados ou encerre esta vaga!</p>
			</div>
					<div class="col-md-3 col-sm-3">
						 <img id="fotoperfil" style="width: 239.5px; height: 239.5px;" src="<?php echo "foto/$foto";?>">
					</div>
						<div class="panel-body">
						<div class="col-md-9 col-sm-9">
							<div class="profile-content">
									<h2><?php echo($row_empresa['nome']);?></h2>
									<p>Editar Vaga:</p>
									<ul class="information">
										
										<li><span>CNPJ:</span><?php echo($row_empresa['cnpj']);?></li>
										<li><span>Cargo:</span><input id="cargo" required name="cargo" type="text" value="<?php echo($row_vagas['cargo']);?>" /></li>
										<li><span>CEP:</span><input id="cep" required name="cep" type="text" maxlength="9" onblur="pesquisacep(this.value);" onKeyDown="javascript: fMasc( this, mCEP);" value="<?php echo($row_vagas['cep']);?>" /></li>
										<li><span>Endereço:</span><input required id="endereco" name="endereco" type="text"/ value="<?php echo($row_vagas['endereco']);?>" ></li>
										<li><span>Número:</span><input required id="numero" name="numero" type="text" value="<?php echo($row_vagas['numero']);?>" /></li>	
										<li><span>Cidade</span><input required id="cidade" name="cidade" type="text" value="<?php echo($row_vagas['cidade']);?>" /></li>										
										<li><span>Estado</span><input required id="uf" required name="uf" maxlength="2" type="text" value="<?php echo($row_vagas['uf']);?>" /></li>		<li><span>Salário R&#x00024;:</span><input id="salario" name="salario" type="text" placeholder="1000,00" onKeyUp="mSalario(this);" value="<?php echo($row_vagas['salario']);?>" /></li>
										<li>
										<span>Tipo da Vaga:</span>
										<select class="selectpicker border-right" id="vaga" required name="vaga" value="<?php echo($row_vagas['vaga']);?>" >
												  <option>-- Tipo da Vaga --</option>
												  <option value="Aprendiz">Aprendiz</option>
												  <option value="Estágio">Estágio</option>
												  <option value="Contrato CLT">Contrato CLT</option>
												  <option value="Temporário">Temporário</option>  
											</select></li>
										<li><span>Carga Horária:</span><input id="horario" name="horario" type="text" value="<?php echo($row_vagas['horario']);?>" /></li>
										<li><span>Deficiência:</span><input id="deficiencia" name="deficiencia" type="text" value="<?php echo($row_vagas['deficiencia']);?>" /> <br> Descreva quais deficiência especifica para este cargo como por exemplo Auditivo, Fisica, Mental, Visual ou outros. </li>
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
							<textarea required name="sobre" placeholder="Descreva um pouco sobre o trabalho que precisará ser feito."><?php echo($row_vagas['sobre']);?></textarea><br>
							</div>
						</div>
						
						
						<div class="panel panel-default">
							<div class="panel-heading">
								<i class="fa fa-coffee fa-fw"></i> Requisitos:
							</div>
											<br> Descreva quais requisitos especifico para  este cargo como por exemplo Experiência Profissional do Candidato, Escolaridade, entre outros relacionados. </li>
												<!-- /.panel-heading -->
							<div class="panel-body">							
							<ul>
								<li><input id="requisito1" name="requisito1" type="text" value="<?php echo($row_vagas['requisito1']);?>" /></li>
								<li><input id="requisito2" name="requisito2" type="text" value="<?php echo($row_vagas['requisito2']);?>"  /></li>
								<li><input id="requisito3" name="requisito3" type="text" value="<?php echo($row_vagas['requisito3']);?>"  /></li>
								<li><input id="requisito4" name="requisito4" type="text" value="<?php echo($row_vagas['requisito4']);?>"  /></li>
								<li><input id="requisito5" name="requisito5" type="text" value="<?php echo($row_vagas['requisito5']);?>"  /></li>
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
								<li><input id="beneficio1" name="beneficio1" type="text" value="<?php echo($row_vagas['beneficio1']);?>"  /></li>
								<li><input id="beneficio2" name="beneficio2" type="text" value="<?php echo($row_vagas['beneficio2']);?>" /></li>
								<li><input id="beneficio3" name="beneficio3" type="text" value="<?php echo($row_vagas['beneficio3']);?>" /></li>
								<li><input id="beneficio4" name="beneficio4" type="text" value="<?php echo($row_vagas['beneficio4']);?>" /></li>
								<li><input id="beneficio5" name="beneficio5" type="text" value="<?php echo($row_vagas['beneficio5']);?>" /></li>
							
							</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		
				<div id="paginacao">
					<div style="width: 300px; height: inherit; 	margin: 0 auto;">
					<input type="submit" class="btn brows-btn1" value="Atualizar"/>
					<input type="button" class="btn brows-btn1" value="Encerrar" onclick="window.location='confirmarexcluirvaga.php';"/>
					
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
			function mSalario(i) {
			var v = i.value.replace(/\D/g,'');
			v = (v/100).toFixed(2) + '';
			v = v.replace(".", ",");
			v = v.replace(/(\d)(\d{3})(\d{3}),/g, "$1.$2.$3,");
			v = v.replace(/(\d)(\d{3}),/g, "$1.$2,");
			i.value = v;
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
			}function mCEP(cep){
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
		 
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/owl.carousel.min.js"></script>
		<script src="js/bootsnav.js"></script>
		<script src="js/main.js"></script>
    </body>
</html>

