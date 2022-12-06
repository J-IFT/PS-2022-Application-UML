<?php
include 'includes/include_top.php';
// echo'session_index: ';var_dump($_SESSION);echo'<br>';

// Connexion
if(isset($_POST['uname']) && isset($_POST['psw'])){
	Library::login($_POST['uname'],$_POST['psw']);
}else if(isset($_GET['deconnexion']) && $_GET['deconnexion']){
	session_destroy();
	header('Location: index.php');
}

// Pages
if(!isset($_GET['page'])){
	$_GET['page'] = 'recherche';
}
if(isset($_GET['page']) && file_exists("pages/".$_GET["page"].".php") && isset($_SESSION['user_id'])){
	include "pages/".$_GET["page"].".php";
}else{
	include "pages/home.php";
}