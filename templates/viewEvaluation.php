<?php 
  require("../models/ConnexionDatabase.php");
  require("../models/Evaluation.php");

  $result = evaluations($connection);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
  <title>VIEW-EVALUATION</title>
</head>
<body>
  <table>
    <thead>
      <th>ID</th>
      <th>ID Agent</th>
      <th>Nom Agent</th>
      <th>Email DRH</th>
      <th>Quantite Travail</th>
      <th>Qualite Travail</th>
      <th>Autonomie</th>
      <th>Motivation</th>
      <th>Prise Initiative</th>
      <th>Relation</th>
      <th>Date Evaluation</th>
    </thead>
    <?php while($lignes = $result->fetch_array()){ ?>
    <tbody>
      <td><?php echo $lignes['id']; ?></td>
      <td><?php echo $lignes['idAgent']; ?></td>
      <td><?php echo $lignes['nomAgent']; ?></td>
      <td><?php echo $lignes['nomDrh']; ?></td>
      <td><?php echo $lignes['quantiteTravail']; ?></td>
      <td><?php echo $lignes['qualiteTravail']; ?></td>
      <td><?php echo $lignes['autonomie']; ?></td>
      <td><?php echo $lignes['motivation']; ?></td>
      <td><?php echo $lignes['priseInitiative']; ?></td>
      <td><?php echo $lignes['relation']; ?></td>
      <td><?php echo $lignes['dateEvaluation']; ?></td>
    </tbody>
    <?php } ?>
  </table>
</body>
</html>