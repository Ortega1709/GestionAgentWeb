<?php  
  require("../models/ConnexionDatabase.php");
  require("../models/Drh.php");

  $result = drhs($connection);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
  <title>VIEW-DRH</title>
</head>
<body>
  <table>
    <thead>
      <th>ID</th>
      <th>Email</th>
      <th>Mot de Passe</th>
    </thead>
    <?php while($lignes = $result->fetch_array()){ ?>
    <tbody>
      <td><?php echo $lignes['id']; ?></td>
      <td><?php echo $lignes['email']; ?></td>
      <td><?php echo $lignes['motDePasse']; ?></td>
    </tbody>
    <?php } ?>
  </table>
</body>
</html>