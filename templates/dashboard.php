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
            <a class="btn btn-danger" href="../templates/loginDrh.php">Déconnexion</a>
          </li>
        </ul>
      </div>
    </div>
  </nav></br></be></br></br></br>

  <div class="container px-4">
    <div class="row gx-5">
      <div class="col">
        <div class="card shadow-lg p-3 mb-5 bg-body rounded" style="width: 18rem;">
          <img src="../assets/images/agents.png." class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?php echo $nba; ?></h5>
            <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum labore esse eum ad amet harum incidunt repellendus eos eius. Libero quaerat minus quisquam dolorem praesentium, corporis sapiente vitae tempore nobis!</p>
            <a href="../templates/viewAgent.php" class="btn btn-primary stretched-link">Voir</a>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card shadow-lg p-3 mb-5 bg-body rounded" style="width: 18rem;">
          <img src="../assets/images/evaluation.jpg." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?php echo $nbe; ?></h5>
              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias ad ducimus, dignissimos vel sit ipsam eligendi esse corrupti est, eaque facilis vitae culpa excepturi rem debitis, error blanditiis minus itaque?</p>
              <a href="../templates/viewEvaluation.php" class="btn btn-primary stretched-link">Voir</a>
            </div>
        </div>
      </div>

      <div class="col">
        <div class="card shadow-lg p-3 mb-5 bg-body rounded " style="width: 18rem;">
          <img src="../assets/images/administrateur.webp.webp." class="card-img-top" alt="..." >
            <div class="card-body">
              <h5 class="card-title"><?php echo $nbd; ?></h5>
              <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vero quibusdam laboriosam repudiandae nobis eveniet similique, doloremque explicabo reprehenderit porro eaque, eum voluptatem animi accusamus harum, dicta ducimus sapiente ipsa culpa!</p>
              <a href="../templates/viewDrh.php" class="btn btn-primary stretched-link">Voir</a>
            </div>
          </div>
      </div>
    </div>
  </div>
  
  <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>