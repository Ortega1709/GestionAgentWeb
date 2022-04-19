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
  <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style/style.css">
  <title>evaluation</title>
</head>
<body>
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
            <a class="nav-link" href="../templates/dashboard.php">Dashboard</a>
          </li>
        </ul>
      </div>
    </div>
  </nav></br>
  <div class="container-xl">
    <h2>Evaluations</h2>

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
        <th scope="col">IDAgent</th>
        <th scope="col">Agent</th>
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
        <td><?=$lignes['id']; ?></td>
        <td><?=$lignes['idAgent']; ?></td>
        <td><?=$lignes['nomAgent']; ?></td>
        <td><?=$lignes['nomDrh']; ?></td>
        <td><?=$lignes['quantiteTravail']; ?></td>
        <td><?=$lignes['qualiteTravail']; ?></td>
        <td><?=$lignes['autonomie']; ?></td>
        <td><?=$lignes['motivation']; ?></td>
        <td><?=$lignes['priseInitiative']; ?></td>
        <td><?=$lignes['relation']; ?></td>
        <td><?=$lignes['dateEvaluation']; ?></td>
      </tr>
    </tbody>
    <?php } ?>
    </table>
      <button onclick=window.location.href="viewPDF.php" class="btn-effectuer" title="Imprimer les résultats">Imprimer</button>
      <button class="btn-deconnexion" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
      Réinitialiser
      </button>
  </div>
  </div>
  </div>


<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Réinitialisation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        La réinitialisation de cette table entrainera des pertes des données.
        Voulez-vous vraiment effectuer cette opération ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn-cancel-1" data-bs-dismiss="modal">Non</button>
        <button onclick=window.location.href="../controllers/evaluationController.php?d=b" class="btn-connexion" name="reinitialiserEvaluation">Oui</a>
      </div>
    </div>
  </div>
</div>
  
  <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>