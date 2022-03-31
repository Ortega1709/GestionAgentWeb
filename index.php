<?php session_start(); session_destroy(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>Gestion d'agents</title>
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
            <a class="nav-link" href="index.php">Acceuil</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-primary" href="templates/loginDrh.php">Connexion</a>
          </li>
        </ul>
      </div>
    </div>
  </nav></br>
  <div class="container">
    <div class="line">
      <div class="home-text">
        <h1>Gestion d'agents d'une Entreprise</h1>
        <p class="text-animation">
          <span>Faites des évaluations</span>
          <!--<span>Avec un système d'évaluations rapide</span>
          <span>facile à utiliser pour l'évaluateur</span>-->
        </p>
      </div>
    </div>
  </div>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>