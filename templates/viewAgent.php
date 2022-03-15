<?php 
  session_start();
  if (empty($_SESSION['current_user'])) {
    header("Location: ../index.php");
  }
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
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><h6><?php echo $_SESSION["current_user"]; ?></h6></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ms-auto ">
          <li class="nav-item">
            <a class="nav-link" href="../templates/dashboard.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-primary" href="../templates/loginDrh.php">Déconnexion</a>
          </li>
        </ul>
      </div>
    </div>
  </nav></br>
  <div class="container-md shadow p-3 mb-5 bg-body rounded">
    <h2>Gestion d'Agents</h2>
      <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Post-Nom</th>
                <th scope="col">Prénom</th>
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
    <div class="container-md">
      <a href="manageAgent.php" class="btn btn-primary">Éditer</a>
    </div>
  </div>
  <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>