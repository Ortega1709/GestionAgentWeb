<?php 
session_start();
if (empty($_SESSION['current_user'])) {
  header("Location: ../index.php");
}

require("../models/ConnexionDatabase.php");
require("../models/Agent.php");
require("../models/Evaluation.php");

/* RESULT EVALUATION */
if (isset($_GET['dE'])) {
  $id = $_GET['dE'];
  $res = rechercherEvaluation($id,$connection);
  $lignes = $res->fetch_array();
}

/* EVALUATION */
if(isset($_GET['ev'])){
  $id = $_GET['ev'];
  $nb = mysqli_num_rows(statusEvalue($id,$connection))  ;
  if ($nb == 1) {
    $id = $_GET['ev'];
    $res = statusEvalue($id, $connection);
    $lignes = $res->fetch_array();
  }else{
    header("Location: viewAgent.php?err=Cet agent a déjà été évalué");
  }
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
  <title>MANAGE-EVALUATION</title>
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
    <h2>Manage Evaluations</h2>
    <form action="../controllers/evaluationController.php" method="post">

    <div class="row mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label">ID Agent</label>
        <div class="col-sm-1">
          <input type="tel" class="form-control" name="inputID" value="<?php echo $lignes['id']; echo $lignes['idAgent']; ?>"> 
        </div>
        <div class="col-auto">
          <span  class="form-text">
            L' utiliser pour la recherche d'agents non évalués.
          </span>
        </div>
    </div>

    <div class="row mb-3">
      <label for="inputName" class="col-sm-2 col-form-label">Nom Agent</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" name="inputNom" value="<?php echo $lignes['nom'].'-'.$lignes['postNom'].'-'.$lignes['prenom']; ?> ">
        </div>
    </div>

  
    <div class="row mb-3">
      <div class="col-md-3">
        <label for="validationCustom04" class="form-label">Quantité de travail</label>
        <select class="form-select" id="validationCustom04" name="qt" >
          <option selected disabled value=""> ... </option>
          <option>Mediocre</option>
          <option>Bon</option>
          <option>Très Bon</option>
        </select>
        
      </div>

      <div class="col-md-3">
        <label for="validationCustom04" class="form-label">Qualité de travail</label>
        <select class="form-select" id="validationCustom04" name="quat" >
          <option selected disabled value=""> ... </option>
          <option>Mediocre</option>
          <option>Bon</option>
          <option>Très Bon</option>
        </select>
        
      </div>

      <div class="col-md-3">
        <label for="validationCustom04" class="form-label">Autonomie de travail</label>
        <select class="form-select" id="validationCustom04" name="auto" >
          <option selected disabled value=""> ... </option>
          <option>Mediocre</option>
          <option>Bon</option>
          <option>Très Bon</option>
        </select>
        
      </div>

      <div class="col-md-3">
        <label for="validationCustom04" class="form-label">Motivation de travail</label>
        <select class="form-select" id="validationCustom04" name="mt" >
          <option selected disabled value=""> ... </option>
          <option>Mediocre</option>
          <option>Bon</option>
          <option>Très Bon</option>
        </select>
        
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-3">
        <label for="validationCustom04" class="form-label">Prise d'initiative</label>
        <select class="form-select" id="validationCustom04" name="pi" >
          <option selected disabled value=""> ... </option>
          <option>Mediocre</option>
          <option>Bon</option>
          <option>Très Bon</option>
        </select>
        
      </div>


      <div class="col-md-3">
        <label for="validationCustom04" class="form-label">Relation avec les autres</label>
        <select class="form-select" id="validationCustom04" name="rl" >
          <option selected disabled value=""> ... </option>
          <option>Mediocre</option>
          <option>Bon</option>
          <option>Très Bon</option>
        </select>
        
      </div>
    </div></br>

    <button type="submit" class="btn-connexion" name="ajouterEvaluation">Evaluer</button>
    <button type="submit" class="btn-cancel-1" name="rechercherEvaluation">Rechercher</button>
    
    </form>
  </div>
</body>
</html>