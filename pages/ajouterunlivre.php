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
            <input type="text" placeholder="Entrez le nom du livre...">
        <br><br>
            <label><b>Auteur : </b></label>
            <input type="text" placeholder="Entrez le nom de l'auteur...">
        <br><br>
            <label><b>Sujet (Genre) : </b></label>
            <input type="text" placeholder="Entrez le sujet (autrement dit le genre) du livre...">
        <br><br>
            <label><b>Aperçu (Résumé) : </b></label>
            <input type="text" placeholder="Entrez l'aperçu (ou un résumé) du livre...">
        <br><br>
            <label><b>Éditeur : </b></label>
            <input type="text" placeholder="Entrez l'éditeur du livre...">
        <br><br>
            <label><b>Date de publication	 : </b></label>
            <input type="text" placeholder="Entrez la date de publication du livre...">
        <br><br>
            <label><b>Langue : </b></label>
            <input type="text" placeholder="Entrez la langue du livre...">
        <br><br>
            <label><b>ISBN : </b></label>
            <input type="text" placeholder="Entrez l'ISBN du livre...">
        <br><br>
            <button type="button" class="btn btn-success"><i class="fa fa-check"></i> Valider</button>
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
