<?php 
  session_start();
  if (empty($_SESSION['current_user'])) {
    header("Location: ../index.php");
  }
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
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <title>VIEW-EVALUATION</title>
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
            <a class="nav-link" href="../index.php">Acceuil</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-primary" href="../templates/loginDrh.php">Déconnexion</a>
          </li>
        </ul>
      </div>
    </div>
  </nav></br>
  <div class="container-md">
    <h2>Gestion d'Evaluations</h2>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">ID Agent</th>
        <th scope="col">Nom Agent</th>
        <th scope="col">Email DRH</th>
        <th scope="col">Quantite Travail</th>
        <th scope="col">Qualite Travail</th>
        <th scope="col">Autonomie</th>
        <th scope="col">Motivation</th>
        <th scope="col">Prise Initiative</th>
        <th scope="col">Relation</th>
        <th scope="col">Date Evaluation</th>
      </tr>
    </thead>
    <?php while($lignes = $result->fetch_array()){ ?>
    <tbody>
      <tr>
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
      </tr>
    </tbody>
    <?php } ?>
  </table>
  <div class="container-md">
  <button type="button" class="btn btn-primary">
    Éditer
  </button>
  </div>
  </div>
  
</body>
</html>