<?php 
session_start();
session_destroy();
header('Location: index.php');
exit();
?>

 <!-- COLOCAR NO BOTAO SAIR >>> href="logout.php -->
 