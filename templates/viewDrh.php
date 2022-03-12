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
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <title>VIEW-DRH</title>
</head>
<body>
  <div class="container-md">
    <h2>Gestion des DRHs</h2>
    <table class="table">
      <thead>
          <tr>
          <th scope="col">ID</th>
          <th scope="col">Email</th>
          <th scope="col">Mot de Passe</th>
          </tr>
      </thead>
    <?php while($lignes = $result->fetch_array()) {?>
      <tbody>
        <tr>
          <td><?php echo $lignes['id']; ?></td>
          <td><?php echo $lignes['email']; ?></td>
          <td><?php echo $lignes['motDePasse']; ?></td>
        </tr>
      </tbody>
      <?php } ?>
    </table>
    <hr class="my-4">
  </div>
</body>
</html>