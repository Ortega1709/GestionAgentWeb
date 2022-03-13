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

    </form>
    <button type="submit" class="btn btn-primary" name="ajouterAgent">Ajouter</button>
    <button type="submit" class="btn btn-dark" name="rechercherAgent">Rechercher</button>
    <button type="submit" class="btn btn-danger" name="supprimerAgent">Supprimer</button>
    <button type="submit" class="btn btn-success" name="modifierAgent">Modifier</button>
  </div>
</body>
</html>