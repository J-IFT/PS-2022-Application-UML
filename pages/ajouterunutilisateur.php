<?php
//* Création
if(isset($_POST['action']) && $_POST['action'] == 'add'
	&& isset($_POST['firstname']) && $_POST['firstname'] != ''
	&& isset($_POST['name']) && $_POST['name'] != ''
	&& isset($_POST['mail']) && $_POST['mail'] != ''
	&& isset($_POST['password']) && $_POST['password'] != ''

){
	$data = [
		'name' => $_POST['name'],
		'firstname' => $_POST['firstname'],
		'mail' => $_POST['mail'],
		'password' => $_POST['password']
	];
	DB::insert('account',$data);
	header('Location: index.php?page=gestiondesutilisateurs');
}elseif(isset($_POST['action']) && $_POST['action'] == 'add'){
	$error = 'Paramètres invalides';
}

//* Modification
if(isset($_POST['id']) && isset($_POST['action']) && $_POST['action'] == 'update'
	&& isset($_POST['firstname']) && $_POST['firstname'] != ''
	&& isset($_POST['name']) && $_POST['name'] != ''
	&& isset($_POST['mail']) && $_POST['mail'] != ''
	&& isset($_POST['password']) && $_POST['password'] != ''
){
	$data = [
		'name' => $_POST['name'],
		'firstname' => $_POST['firstname'],
		'mail' => $_POST['mail'],
		'password' => $_POST['password']
	];
	DB::query("
		UPDATE account
		SET firstname = '".DB::str($_POST['firstname'])."', name = '".DB::str($_POST['name'])."', mail = '".DB::str($_POST['mail'])."', password = '".DB::str($_POST['password'])."'
		WHERE number = ".DB::int(isset($_POST['id']))."
	");
}elseif(isset($_POST['action']) && $_POST['action'] == 'update'){
	$error = 'Paramètres invalides';
}


$name = '';
$firstname = '';
$mail = '';
$password = '';
if(isset($_POST['id'])){
	Library::InitAccounts();
	$account = Library::getAccount($_POST['id']);
	$name 		= $account->name;
	$firstname  = $account->firstname;
	$mail 		= $account->mail;
	$password  	= $account->pwd;
}


?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application de gestion d’une bibliothèque</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="includes/css/ajouter.css" type="text/css">
</head>
<body>
    <div id="background">
        <div id="top">
        </div>
        <div id="menu">
            <div id="logo">BOOK<b style="color:pink">ED</b>
            </div>
            <div id="menu1">
                <ul>
                  <a href="recherche.html"><li class="fa fa-home"> Accueil | </li></a>
                  <a href="#"><li class="fa fa-user"> Se déconnecter</li></a>
                </ul>
            </div>
        </div>

        <br><br><br>

        <h2><center>Ajouter un utilisateur</center></<h2>

        <br><br>

        <form action="" method="post">
			<?php 
				if(isset($_POST['id'])){
					echo '<input name="id" value="'.$_POST['id'].'" hidden>';
				}
			?>
			<input name="action" value="<?php echo (isset($_POST['id'])?'update':'add');?>" hidden>
          <div class="container">
            <label><b>Prénom : </b></label>
            <input name="firstname" type="text" value="<?php echo $firstname ?>" placeholder="Entrez le prénom de l'utilisateur...">
        <br><br>
            <label><b>Nom : </b></label>
            <input name="name" type="text" value="<?php echo $name ?>" placeholder="Entrez le nom de l'utilisateur...">
        <br><br>
            <label><b>Adresse mail : </b></label>
            <input name="mail" type="text" value="<?php echo $mail ?>" placeholder="Entrez l'adresse mail de l'utilisateur...">
        <br><br>
            <label><b>Mot de passe : </b></label>
            <input name="password" type="text" value="<?php echo $password ?>" placeholder="Entrez le mot de passe de l'utilisateur...">
        <br><br>
			<?php
				echo (isset($error)?$error.'<br>':'');
			?>
            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Valider</button>
          </div>
        </form>
		<div class="container">
			<form action="index.php?page=gestiondesutilisateurs">
				<button type="submit" class="btn btn-danger"><i class="fa fa-ban"></i> Annuler</button>
			</form>
		</div>
        <br><br><br>

<footer>
  <div class="footer">&copy; Juliette INFANTI, Jeremy DUSSOL & Flavien GROS </div>
</footer>
      </div>
</body>
</html>
