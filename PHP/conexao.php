<?php
ini_set('defaultcharset','UTF-8');
	$conexao = mysqli_connect("localhost","root", "", "tcc") or die ('Não foi possivel conectar!'); 
	//$conexao = mysqli_connect("sql112.epizy.com","epiz_23970370", "QTi8jAfnsDvgSA", "epiz_23970370_tcc") or die ('Não foi possivel conectar!'); 
$conexao->query("SET NAMES utf8");
?>