<?php 

  session_start();
  if (empty($_SESSION['current_user'])) {
    header("Location: ../index.php");
  }

  require("../models/ConnexionDatabase.php");
  require("../models/Agent.php");
  require("../models/Drh.php");
  require("../models/Evaluation.php");

  $nba = nbAgent($connection);
  $nbd = nbDrh($connection);
  $nbe = nbEvaluation($connection);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <title>DASHBOARD-ADMIN</title>
</head>

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
  <div class="row">
    <div class="col-sm-6">
      <div class="card shadow p-3 mb-5 bg-body rounded">
        <div class="card-body">
          <h5 class="card-title"><?php echo $nba; ?></h5>
          <p class="card-text">Nombre d'agents enregistrés.</p>
          <a href="../templates/viewAgent.php" class="btn btn-primary">Voir</a>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card shadow p-3 mb-5 bg-body rounded">
        <div class="card-body">
          <h5 class="card-title"><?php echo $nbe; ?></h5>
          <p class="card-text">Nombre d'évaluations effectuées.</p>
          <a href="../templates/viewEvaluation.php" class="btn btn-primary">Voir</a>
        </div>
      </div>
    </div>
  </div></br>

  <div class="row">
    <div class="col-sm-6">
      <div class="card shadow p-3 mb-5 bg-body rounded">
        <div class="card-body">
          <h5 class="card-title"><?php echo $nbd; ?></h5>
          <p class="card-text">Nombre de Drhs enregistrés.</p>
          <a href="../templates/viewDrh.php" class="btn btn-primary">Voir</a>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card shadow p-3 mb-5 bg-body rounded">
        <div class="card-body">
          <h5 class="card-title">Special title treatment</h5>
          <p class="card-text">Nombre </p>
          <a href="#" class="btn btn-primary">Voir</a>
        </div>
      </div>
    </div>
  </div>
  </div>
  
  <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>