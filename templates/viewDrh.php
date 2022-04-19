<?php  
  session_start();
  if (empty($_SESSION['current_user'])) {
    header("Location: ../index.php");
  }
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
  <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style/style.css">
  <title>Drhs</title>
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
  <div class="container-xl ">
    <h2>Gestion des DRHs</h2>
    
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
    <div class="container-md">
      <button onclick=window.location.href="manageDrh.php" class="btn-connexion">Éditer</button>
      <button type="button" class="btn-deconnexion" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
      Réinitialiser
      </button>
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
        <button onclick=window.location.href="../controllers/drhController.php?d=b" class="btn-connexion">Oui</a>
      </div>
    </div>
   </div>
  </div>
  
  <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>