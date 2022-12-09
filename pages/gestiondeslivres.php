<?php
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application de gestion d’une bibliothèque</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="includes/css/gestion.css" type="text/css">
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
                  <a href="index.php?deconnexion=1"><li class="fa fa-user"> Se déconnecter</li></a>
                </ul>
            </div>
        </div>

        <br><br><br>

        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Rechercher le nom du livre...">
        <a class="btn btn-primary" href="index.php?page=ajouterunlivre"><li class="fa fa-book"> Ajouter un livre </li></a>
  <br><br>
      <table id="myTable">
          <tr class="header">
            <th style="width:15%;">Nom du livre</th>
            <th style="width:15%;">Auteur</th>
            <th style="width:10%;">Sujet (Genre)</th>
            <th style="width:25%;">Aperçu (Résumé)</th>
            <th style="width:15%;">Éditeur</th>
            <th style="width:10%;">Date de publication</th>
            <th style="width:10%;">Langue</th>
            <th style="width:10%;">ISBN</th>
          </tr>
		<?php
			Library::InitCatalogue();
			Library::printCatalog();
		?>
      </table>

<br><br><br>
<footer>
  <div class="footer">&copy; Juliette INFANTI, Jeremy DUSSOL & Flavien GROS </div>
</footer>
    </div>
</body>
</html>

<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
