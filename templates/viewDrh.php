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
  <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <title>VIEW-DRH</title>
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
    <div class="container-md">
      <a href="manageDrh.php" class="btn btn-primary">Éditer</a>
    </div>
  </div>
  
  <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>