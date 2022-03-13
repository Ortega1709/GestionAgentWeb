<?php 
session_start();
if (empty($_SESSION['current_user'])) {
  header("Location: ../index.php");
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
  <title>MANAGE-DRH</title>
</head>
<body>
  </br></br>
  <div class="container-md shadow p-3 mb-5 bg-body rounded">
    <h2>Manage Drhs</h2>
    <form action="../controllers/drhController.php" method="post">
    <div class="row mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label">ID</label>
        <div class="col-auto">
          <input type="tel" class="form-control" name="inputEmail"> 
        </div>
        <div class="col-auto">
        <span  class="form-text">
          L' utiliser pour la recherche.
        </span>
  </div>
    </div>
    <div class="row mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-9">
          <input type="email" class="form-control" name="inputEmail">
        </div>
    </div>
    <div class="row mb-3">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-9">
          <input type="password" class="form-control" name="inputPassword">
        </div>
    </div>

    <div class="row mb-3">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Confirm Password</label>
        <div class="col-sm-9">
          <input type="password" class="form-control" name="inputPasswordConfirm">
        </div>
    </div>
    <button type="submit" class="btn btn-primary" name="ajouterDrh">Ajouter</button>
    <button type="submit" class="btn btn-dark" name="rechercherDrh">Rechercher</button>
    <button type="submit" class="btn btn-danger" name="supprimerDrh">Supprimer</button>
    <button type="submit" class="btn btn-success" name="modifierDrh">Modifier</button>
  </form>
  </div>
</body>
</html>