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

        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Rechercher le prénom de l'utilisateur...">
        <a class="btn btn-primary" href="ajouterunutilisateur.html"><li class="fa fa-user"> Ajouter un utilisateur </li></a>
  <br><br>
        <table id="myTable">
            <tr class="header">
              <th style="width:20%;">Prénom</th>
              <th style="width:20%;">Nom</th>
              <th style="width:30%;">Adresse mail</th>
              <th style="width:20%;">Mot de passe</th>
            </tr>
			<?php
				Library::InitAccounts();
			?>
          <tr>
            <td>Magnolia</td>
            <td>Gaillou</td>
            <td>m.gaillou@gmail.com</td>
            <td>JVEOIFOEFEOJFEJEFIOEF12</td>
            <td>
              <button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button>
              <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
            </td>
          </tr>
          <tr>
            <td>Melodie</td>
            <td>Angélil</td>
            <td>m.gaillou@gmail.com</td>
            <td>JVEOIFOEFEOJFEJEFIOEF12</td>
            <td>
              <button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button>
              <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
            </td>
          </tr>
          <tr>
            <td>Beltane</td>
            <td>Chalut</td>
            <td>m.gaillou@gmail.com</td>
            <td>JVEOIFOEFEOJFEJEFIOEF12</td>
            <td>
              <button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button>
              <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
            </td>
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
