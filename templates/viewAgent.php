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
  <title>VIEW-AGENT</title>
</head>
<body>
  <table>
    <thead>
      <th>ID</th>
      <th>Nom</th>
      <th>Post-Nom</th>
      <th>Prénom</th>
      <th>Profil</th>
      <th>Adresse</th>
      <th>Fonction</th>
      <th>Téléphone</th>
      <th>Date de Naissance</th>
      <th>Email</th>
      <th>Est évalué</th>
    </thead>
    <?php while($lignes = $result->fetch_array()) {?>
    <tbody>
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
    </tbody>
   <?php } ?>
  </table>
</body>
</html>