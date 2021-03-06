<?php 
session_start();
if (empty($_SESSION['current_user'])) {
  header("Location: ../index.php");
}

require("../models/ConnexionDatabase.php");
require("../models/Agent.php");
if (isset($_GET['d'])) {
  $id = $_GET['d'];
  $res = rechercherAgent($id,$connection);
  $lignes = $res->fetch_array();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style/style.css">
  <title>agents</title>
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

  <div class="container-md shadow-lg p-3 mb-5 bg-body rounded">
    <h2>Manage Agents</h2></br>
    <form action="../controllers/agentController.php" method="post">
    <div class="row mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label">ID</label>
        <div class="col-sm-1">
          <input type="tel" class="form-control" name="inputID" value="<?php echo $lignes['id']; ?>"> 
        </div>
        <div class="col-auto">
        <span  class="form-text">
          L' utiliser pour la recherche.
        </span>
  </div>
    </div>
    <div class="row mb-3">
      <label for="inputName" class="col-sm-2 col-form-label">Nom complet</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" name="inputNom" value="<?php echo $lignes['nom']; ?>">
        </div>

        <div class="col-sm-3">
          <input type="text" class="form-control" name="inputPostNom" value="<?php echo $lignes['postNom']; ?>">
        </div>

        <div class="col-sm-3">
          <input type="text" class="form-control" name="inputPrenom" value="<?php echo $lignes['prenom']; ?>">
        </div>
    </div>

    <div class="row mb-3">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Adresse</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="inputAdresse" value="<?php echo $lignes['adresse']; ?>">
        </div>
    </div>

    <div class="row mb-3">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Fonction</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="inputFonction" value="<?php echo $lignes['fonction']; ?>">
        </div>
    </div>

    <div class="row mb-3">
      <label for="inputPassword3" class="col-sm-2 col-form-label">T??l??phone</label>
        <div class="col-sm-9">
          <input type="tel" class="form-control" name="inputPhone" value="<?php echo $lignes['telephone']; ?>">
        </div>
    </div>

    <div class="row mb-3">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Date de Naissance</label>
        <div class="col-sm-9">
          <input type="date" class="form-control" name="inputDate" value="<?php echo $lignes['dateNaissance']; ?>">
        </div>
    </div>

    <div class="row mb-3">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-9">
          <input type="email" class="form-control" name="inputEmail" value="<?php echo $lignes['email']; ?>">
        </div>
    </div>
    <button type="submit" class="btn-connexion" name="ajouterAgent">Ajouter</button>
    <button type="submit" class="btn-deconnexion" name="supprimerAgent">Supprimer</button>
    <button type="submit" class="btn-effectuer" name="modifierAgent">Modifier</button>
    </form>
  </div>
</body>
</html>