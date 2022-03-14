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
  <title>MANAGE-AGENT</title>
</head>
<body>
  </br></br>
  <div class="container-md shadow p-3 mb-5 bg-body rounded">
    <h2>Manage Agents</h2>
    <form action="../controllers/agentController.php" method="post">
    <div class="row mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label">ID</label>
        <div class="col-sm-1">
          <input type="tel" class="form-control" name="inputID"> 
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
          <input type="text" class="form-control" name="inputNom">
        </div>

        <div class="col-sm-3">
          <input type="text" class="form-control" name="inputPostNom">
        </div>

        <div class="col-sm-3">
          <input type="text" class="form-control" name="inputPrenom">
        </div>
    </div>
    <div class="row mb-3">
    <label for="formFile" class="col-sm-2 col-form-label">Profil</label>
        <div class="col-sm-9">
        <input class="form-control" type="file" id="formFile" accept=".jpg,.png,.jpeg" name="inputFile">
        </div>
    </div>

    <div class="row mb-3">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Adresse</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="inputAdresse">
        </div>
    </div>

    <div class="row mb-3">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Fonction</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="inputFonction">
        </div>
    </div>

    <div class="row mb-3">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Téléphone</label>
        <div class="col-sm-9">
          <input type="tel" class="form-control" name="inputPhone">
        </div>
    </div>

    <div class="row mb-3">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Date de Naissance</label>
        <div class="col-sm-9">
          <input type="date" class="form-control" name="inputDate">
        </div>
    </div>

    <div class="row mb-3">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-9">
          <input type="email" class="form-control" name="inputEmail">
        </div>
    </div>

    </form>
    <button type="submit" class="btn btn-primary" name="ajouterAgent">Ajouter</button>
    <button type="submit" class="btn btn-dark" name="rechercherAgent">Rechercher</button>
    <button type="submit" class="btn btn-danger" name="supprimerAgent">Supprimer</button>
    <button type="submit" class="btn btn-success" name="modifierAgent">Modifier</button>
  </div>
</body>
</html>