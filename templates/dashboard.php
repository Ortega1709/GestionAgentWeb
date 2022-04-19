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
  <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
  <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style/style.css">
  <title>dashboard</title>
</head>


<body class="body-dashboard">
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#" title="administrateur(DRH) actuel">
        <img src="../assets/images/admin-icon.png" alt="" width="25" height="24" class="d-inline-block align-text-top">
        <?php echo $_SESSION["current_user"]; ?>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ms-auto ">
          <li class="nav-item">
            <a class="nav-link" href="../index.php">Acceuil</a>
          </li>
          <li class="nav-item">
            <button class="btn-deconnexion" onclick=window.location.href='../index.php' >Déconnexion</button>
          </li>
        </ul>
      </div>
    </div>
  </nav></br></be></br></br></br>

  <div class="container px-4">
    <div class="row gx-5">
      <div class="col">
        <div class="card shadow-lg p-3 mb-5 bg-body rounded" style="width: 18rem;">
          <div class="card-body">
            <h4 class="card-title">AGENTS</h4>
            <h6 class="card-subtitle mb-2 text-muted"><?=$nba ?> Agents enregistrés.</h6></br>
            <p class="card-text">Possibilité d'effectuer des opérations sur des agents à évaluer notament la recherche, l'ajout, la modification et la suppression.</p>
            <button onclick=window.location.href="../templates/viewAgent.php" class="btn-view">Voir</button>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card shadow-lg p-3 mb-5 bg-body rounded" style="width: 18rem;">
            <div class="card-body">
              <h4 class="card-title">EVALUATIONS</h4>
              <h6 class="card-subtitle mb-2 text-muted"><?=$nbe ?> Evaluations effectuées.</h6></br>
              <p class="card-text">Possibilité d'effectuer des opérations sur des évaluations faites telles que la recherche, l'ajout d'une évaluation et l'impression.</p></br>
              <button onclick=window.location.href="../templates/viewEvaluation.php" class="btn-view">Voir</button>
            </div>
        </div>
      </div>

      <div class="col">
        <div class="card shadow-lg p-3 mb-5 bg-body rounded " style="width: 18rem;">
            <div class="card-body">
              <h4 class="card-title">DIRECTEUR</h4>
              <h6 class="card-subtitle mb-2 text-muted"><?=$nbd ?> Directeurs enregistrés.</h6></br>
              <p class="card-text">Possibilité d'effectuer des opérations sur les DRHs (chargé d'évaluation) telles que l'ajout, la modification, la recherche et la suppression.</p></br>
              <button onclick=window.location.href="../templates/viewDrh.php" class="btn-view">Voir</button>
            </div>
          </div>
      </div>
    </div>
  </div>
  
  <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>