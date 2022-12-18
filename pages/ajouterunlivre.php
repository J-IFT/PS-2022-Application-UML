<?php
//* Création
if(isset($_POST['action']) && $_POST['action'] == 'add'
	&& isset($_POST['name']) && $_POST['name'] != ''
	&& isset($_POST['subject']) && $_POST['subject'] != ''
	&& isset($_POST['overview']) && $_POST['overview'] != ''
	&& isset($_POST['publisher']) && $_POST['publisher'] != ''
	&& isset($_POST['publicationDate']) && $_POST['publicationDate'] != ''
	&& isset($_POST['lang']) && $_POST['lang'] != ''
	&& isset($_POST['ISBN']) && $_POST['ISBN'] != ''
	&& isset($_POST['author']) && $_POST['author'] != ''

){
	$data = [
		'name' => $_POST['name'],
		'subject' => $_POST['subject'],
		'overview' => $_POST['overview'],
		'publisher' => $_POST['publisher'],
		'publicationDate' => $_POST['publicationDate'],
		'lang' => $_POST['lang'],
		'ISBN' => $_POST['ISBN'],
		'author' => $_POST['author']
	];
	DB::insert('book',$data);
	header('Location: index.php?page=gestiondeslivres');
}elseif(isset($_POST['action']) && $_POST['action'] == 'add'){
	$error = 'Paramètres invalides';
}

//* Modification
if(isset($_POST['id']) && isset($_POST['action']) && $_POST['action'] == 'update'
    && isset($_POST['name']) && $_POST['name'] != ''
    && isset($_POST['subject']) && $_POST['subject'] != ''
    && isset($_POST['overview']) && $_POST['overview'] != ''
    && isset($_POST['publisher']) && $_POST['publisher'] != ''
    && isset($_POST['publicationDate']) && $_POST['publicationDate'] != ''
    && isset($_POST['lang']) && $_POST['lang'] != ''
    && isset($_POST['ISBN']) && $_POST['ISBN'] != ''
    && isset($_POST['author']) && $_POST['author'] != ''
){
	$data = [
		'name' => $_POST['name'],
		'subject' => $_POST['subject'],
		'overview' => $_POST['overview'],
		'publisher' => $_POST['publisher'],
		'publicationDate' => $_POST['publicationDate'],
		'lang' => $_POST['lang'],
		'ISBN' => $_POST['ISBN'],
		'author' => $_POST['author']
	];
	DB::query("
		UPDATE book
		SET name = '".DB::str($_POST['name'])."', 
        subject = '".DB::str($_POST['subject'])."', 
        overview = '".DB::str($_POST['overview'])."', 
        publisher = '".DB::str($_POST['publisher'])."',
        publicationDate = '".DB::str($_POST['publicationDate'])."',
        lang = '".DB::str($_POST['lang'])."',
        author = '".DB::str($_POST['author'])."',
		WHERE number = ".DB::int(isset($_POST['ISBN']))."
	");
}elseif(isset($_POST['action']) && $_POST['action'] == 'update'){
	$error = 'Paramètres invalides';
}

$name = '';
$subject = '';
$overview = '';
$publisher = '';
$publicationDate = '';
$lang = '';
$ISBN = '';
$author = '';


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
                  <a href="index.php?page=recherche"><li class="fa fa-home"> Accueil | </li></a>
                  <a href="#"><li class="fa fa-user"> Se déconnecter</li></a>
                </ul>
            </div>
        </div>

        <br><br><br>

        <h2><center>Ajouter un livre</center></<h2>

        <br><br>

        <form action="" method="post">

          <div class="container">
            <label><b>Nom du livre : </b></label>
            <input type="text" value="<?php echo $name ?>" placeholder="Entrez le nom du livre...">
        <br><br>
            <label><b>Auteur : </b></label>
            <input type="text" value="<?php echo $author ?>" placeholder="Entrez le nom de l'auteur...">
        <br><br>
            <label><b>Sujet (Genre) : </b></label>
            <input type="text" value="<?php echo $subject ?>" placeholder="Entrez le sujet (autrement dit le genre) du livre...">
        <br><br>
            <label><b>Aperçu (Résumé) : </b></label>
            <input type="text" value="<?php echo $overview ?>" placeholder="Entrez l'aperçu (ou un résumé) du livre...">
        <br><br>
            <label><b>Éditeur : </b></label>
            <input type="text" value="<?php echo $publisher ?>" placeholder="Entrez l'éditeur du livre...">
        <br><br>
            <label><b>Date de publication	 : </b></label>
            <input type="text" value="<?php echo $publicationDate ?>"  placeholder="Entrez la date de publication du livre...">
        <br><br>
            <label><b>Langue : </b></label>
            <input type="text" value="<?php echo $lang ?>" placeholder="Entrez la langue du livre...">
        <br><br>
            <label><b>ISBN : </b></label>
            <input type="text" value="<?php echo $ISBN ?>" placeholder="Entrez l'ISBN du livre...">
        <br><br>
            <?php
				echo (isset($error)?$error.'<br>':'');
			?>
            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Valider</button>
            <button type="button" class="btn btn-danger"><i class="fa fa-ban"></i> Annuler</button>
          </div>
        </form>

        <br><br><br>

<footer>
  <div class="footer">&copy; Juliette INFANTI, Jeremy DUSSOL & Flavien GROS </div>
</footer>
      </div>
</body>
</html>
