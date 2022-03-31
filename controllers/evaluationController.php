<?php 
  session_start();
  require("../models/ConnexionDatabase.php");
  require("../models/Evaluation.php");
  require("../models/Agent.php");

  /* AJOUT EVALUATION */
  if (isset($_POST['ajouterEvaluation'])) {
    if (
      $_POST['inputID'] == null || 
      $_POST['inputNom'] == null || 
      $_POST['qt'] == null || 
      $_POST['quat'] == null ||
      $_POST['auto'] == null ||
      $_POST['mt'] == null ||
      $_POST['pi'] == null ||
      $_POST['rl'] == null) {
        header("Location: ../templates/viewEvaluation.php?msg=Erreur d'évaluation");
      }else{
        $res = ajoutEvaluation($_POST['inputID'],$_POST['inputNom'],$_SESSION['current_user'],$_POST['qt'],$_POST['quat'],$_POST['auto'],$_POST['mt'],$_POST['pi'],$_POST['rl'],date('y-m-d h:i:s'),$connection);
        $res1 = modifierStatusEvaluation($_POST['inputID'],1,$connection);
        if ($res && $res1) {
          header("Location: ../templates/viewEvaluation.php?msg=Evaluation réussie");
        }else {
          header("Location: ../templates/viewEvaluation.php?msg=Erreur d'évaluation");
        }
      }
  }

  /* RECHERCHER AGENTS NON EVALUES */
  if (isset($_POST['rechercherEvaluation'])) {
    $id = $_POST['inputID'];
    if ($id == null) {
      header("Location: ../templates/manageEvaluation.php");
    }else{
      header("Location: ../templates/manageEvaluation.php?d=$id");
    }
  }

  /* RECHERCHER EVALUATION */
  if (isset($_POST['inputIDE'])) {
    $id = $_POST['inputIDE'];
    if($id == null){
      header("Location: ../templates/manageEvaluation.php");
    }else{
      header("Location: ../templates/manageEvaluation.php?dE=$id");
    }
  }

  /* SUPPRIMER EVALUATION */
  if (isset($_POST['supprimerEvaluation'])) {
    echo "Supprimer";
  }

  /* MODIFIER EVALUATION */
  if (isset($_POST['modifierEvaluation'])) {
    echo "Modifier";
  }

?>