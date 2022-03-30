<?php 
  session_start();
  require("../models/ConnexionDatabase.php");
  require("../models/Evaluation.php");

  /* AJOUT EVALUATION */
  if (isset($_POST['ajouterEvaluation'])) {
    echo "ajouter";
  }

  /* RECHERCHER EVALUATION */
  if (isset($_POST['rechercherEvaluation'])) {
    $id = $_POST['inputID'];
    if ($id == null) {
      header("Location: ../templates/manageEvaluation.php");
    }else{
      header("Location: ../templates/manageEvaluation.php?d=$id");
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