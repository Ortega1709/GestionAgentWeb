<?php 
  require("../models/ConnexionDatabase.php");
  require("../models/Agent.php");

  $result = agents($connection);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <title>VIEW-AGENT</title>
</head>
<body>
  <div class="container-md">
    <h2>Gestion d'Agents</h2>
      <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Post-Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Profil</th>
                <th scope="col">Adresse</th>
                <th scope="col">Fonction</th>
                <th scope="col">Téléphone</th>
                <th scope="col">Date de Naissance</th>
                <th scope="col">Email</th>
                <th scope="col">Est évalué</th>
            </tr>
        </thead>
      <?php while($lignes = $result->fetch_array()) {?>
      <tbody>
        <tr>
          <td><?php echo $lignes['id']; ?></td>
          <td><?php echo $lignes['nom']; ?></td>
          <td><?php echo $lignes['postNom']; ?></td>
          <td><?php echo $lignes['prenom']; ?></td>
          <td><?php echo $lignes['profil']; ?></td>
          <td><?php echo $lignes['adresse']; ?></td>
          <td><?php echo $lignes['fonction']; ?></td>
          <td><?php echo $lignes['telephone']; ?></td>
          <td><?php echo $lignes['dateNaissance']; ?></td>
          <td><?php echo $lignes['email']; ?></td>
          <td><?php echo $lignes['estEvalue']; ?></td>
        </tr>
      </tbody>
      <?php } ?>
    </table>
    <hr class="my-4">
    <div class="container-md">
    <button type="button" class="btn btn-primary">Éditer</button>
    </div>
  </div>
</body>
</html>