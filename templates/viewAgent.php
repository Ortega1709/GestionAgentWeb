<?php 
  session_start();
  if (empty($_SESSION['current_user'])) {
    header("Location: ../index.php");
  }
  require("../models/ConnexionDatabase.php");
  require("../models/Agent.php");

  $result = agents($connection);

  if ($_GET['s']) {
    if ($_GET['s'] == 1) {
      $result = agents($connection);
    }elseif ($_GET['s'] == 2) {
      $result = agentsEvalues($connection);
    }elseif ($_GET['s'] == 3) {
      $result = agentsNonEvalues($connection);
    }
  }
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
  <title>agent</title>
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

          <li class="nav-item">
          <form class="d-flex" action="../controllers/agentController.php" method="POST">
            <select class="form-select" aria-label="Default select example" name="selection">
              <option value="1">Tous les agents</option>
              <option value="2">Les Agents évalués</option>
              <option value="3">Les Agents non-évalués</option>
            </select><p>...</p>
            <button class="btn btn-outline-success" type="submit" name="filtrer">Voir</button>
          </form>
          </li>
        </ul>
      </div>

      

    </div>
  </nav></br>
  <div class="container">
    <h2>Agents</h2>

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
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">P.Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Adresse</th>
                <th scope="col">Fonction</th>
                <th scope="col">Téléphone</th>
                <th scope="col">Date Naissance</th>
                <th scope="col">Email</th>
                <th scope="col">Est évalué</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
      <?php while($lignes = $result->fetch_array()) {?>
      <tbody>
        <tr>
          <td><a href="manageAgent.php?d=<?=$lignes['id']; ?>"><?=$lignes['id']; ?></a></td>
          <td><?=$lignes['nom']; ?></td>
          <td><?=$lignes['postNom']; ?></td>
          <td><?=$lignes['prenom']; ?></td>
          <td><?=$lignes['adresse']; ?></td>
          <td><?=$lignes['fonction']; ?></td>
          <td><?=$lignes['telephone']; ?></td>
          <td><?=$lignes['dateNaissance']; ?></td>
          <td><?=$lignes['email']; ?></td>
          <td><?=$lignes['estEvalue']; ?></td>
          <td><button class="btn-effectuer" onclick=window.location.href="manageEvaluation.php?ev=<?=$lignes['id']; ?>">Evaluer</button></td>
        </tr>
      </tbody>
      <?php } ?>
    </table>
    <div class="container-md">
      <button onclick=window.location.href="manageAgent.php" class="btn-connexion">Ajouter</button>
      <button type="button" class="btn-deconnexion" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
      Réinitialiser
      </button></br></br>
      
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
        <button onclick=window.location.href="../controllers/agentController.php?d=b" class="btn-connexion">Oui</a>      
      </div>
    </div>
  </div>
  </div>

  <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>