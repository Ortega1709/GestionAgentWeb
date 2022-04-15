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
    <h2>Gestion d'Evaluations</h2>

    <?php if($_GET['msg']){ ?>
      <div class="alert alert-success" role="alert">
        <?=$_GET['msg']; ?>
      </div>
    <?php }elseif($_GET['err']){ ?>
      <div class="alert alert-danger" role="alert">
        <?=$_GET['err']; ?>
      </div>
    <?php } ?>

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
  <div class="container-md">
      <a href="manageEvaluation.php" class="btn btn-primary">Éditer</a>
      <a href="viewPDF.php" class="btn btn-success" title="Imprimer les résultats">Imprimer</a>
      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
      Reinitialiser
      </button>
  </div>
  </div>
  </div>


<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Reinitialisation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        La reinitialisation de cette table entrainera des pertes des données.</br>
        Voulez-vous vraiment effectuer cette opérations ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
        <a href="../controllers/evaluationController.php?d=b" class="btn btn-primary" name="reinitialiserEvaluation">Oui</a>
      </div>
    </div>
  </div>
</div>
  
  <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>