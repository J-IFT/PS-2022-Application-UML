<?php
include 'include_top.php';
// echo '<br> val: '.$a.'<br>';
if(!isset($_SESSION['user_id'])){
	header('Location: index.php');
}
echo '<br>global: ';var_dump($GLOBALS['a']);
echo'<br>session: ';var_dump($_SESSION);echo'<br>';
echo "v1: ";var_dump(Library::$accounts);
echo '<br>v2:';var_dump(Library::getAccounts());
// echo'<br> Library::$accounts : ';var_dump($_SERVER['library']->accounts);echo'<br>';
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application de gestion d’une bibliothèque</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="recherche.css" type="text/css">
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
<<<<<<< HEAD
                    <a href="gestiondeslivres.html"><li class="fa fa-folder"> Gestion des livres | </li></a>
                    <a href="gestiondesutilisateurs.html"><li class="fa fa-folder"> Gestion des utilisateurs | </li></a>
                  <a href="index.php?deconnexion=1"><li class="fa fa-user"> Se déconnecter</li></a>
=======
                  <a href="gestiondeslivres.html"><li class="fa fa-folder"> Gestion des livres | </li></a>
                  <a href="gestiondesutilisateurs.html"><li class="fa fa-folder"> Gestion des utilisateurs | </li></a>
                  <a href="#"><li class="fa fa-user"> Se déconnecter</li></a>
>>>>>>> b95ce75ae9dd4cd756b6b14eee59bf22d04070ba
                </ul>
            </div>
        </div>

        <br><br><br>

      <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Rechercher le nom du livre...">
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
  <tr>
    <td>Le Petit Prince</td>
    <td>Antoine de Saint-Exupéry</td>
    <td>Conte, Jeunesse</td>
    <td>Le narrateur, un pilote qui est tombé en panne d'essence dans le Sahara, fait la connaissance d’un prince extraordinaire venant d’une autre planète.</td>
    <td>Reynal & Hitchcock</td>
    <td>1943</td>
    <td>Français</td>
    <td>9782070612758</td>
  </tr>
  <tr>
    <td>Harry Potter à l'école des sorciers</td>
    <td>J. K. Rowling</td>
    <td>Roman, Jeunesse, Fantastique</td>
    <td>Harry Potter, orphelin élevé dans une famille qui ne l'aime pas, voit son existence bouleversée du jour au lendemain. La nuit de son onzième anniversaire, un géant vient le chercher pour l'emmener à Poudlard, une école de sorcellerie.</td>
    <td>Gallimard Jeunesse</td>
    <td>1997</td>
    <td>Anglais</td>
    <td>9782070612369</td>
  </tr>
  <tr>
    <td>Les Misérables</td>
    <td>Victor Hugo</td>
    <td>Roman</td>
    <td>Cosette et Marius sont 2 âmes disposées à s'aimer. Mais Jean Valjean veille, lui, l'ancien bagnard dont Cosette est devenue la seule raison de vivre.</td>
    <td>Larousse</td>
    <td>1862</td>
    <td>Français</td>
    <td>9782035834256</td>
  </tr>
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
