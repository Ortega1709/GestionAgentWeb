<?php 

require("../models/ConnexionDatabase.php");
require("../models/Agent.php");

/* AJOUT AGENT */
if (isset($_POST['ajouterAgent'])) {
  $res = ajoutAgent($_POST['inputNom'],$_POST['inputPostNom'],$_POST['inputPrenom'],$_POST['inputAdresse'],$_POST['inputFonction'],$_POST['inputPhone'],$_POST['inputDate'],$_POST['inputEmail'],$connection);
  
  if ($res) {
    header("Location: ../templates/viewAgent.php?msg=insértion réussie");
  }else {
    header("Location: ../templates/viewAgent.php?msg=insértion échouée");
  }
}

/* RECHERCHE AGENT */
  if (isset($_POST['rechercherAgent'])) {
    $id = $_POST['inputID'];
    if ($id == null) {
      header("Location: ../templates/manageAgent.php");
    }else {
      header("Location: ../templates/manageAgent.php?d=$id");
    }
  }

  /* SUPPRIMER AGENT */
  if (isset($_POST['supprimerAgent'])) {
    $id = $_POST['inputID'];
    if ($id == null) {
      header("Location: ../templates/manageAgent.php");
    }else {
      $res = supprimerAgent($id,$connection);
      if ($res) {
        header("Location: ../templates/viewAgent.php?msg=suppression réussie");
      }else {
        header("Location: ../templates/viewAgent.php?msg=suppression échouée");
      }
    }
  }

  /* MODIFIER AGENT */
  if (isset($_POST['modifierAgent'])) {
    $res = modifierAgent($_POST['inputID'],$_POST['inputNom'],$_POST['inputPostNom'],$_POST['inputPrenom'],$_POST['inputAdresse'],$_POST['inputFonction'],$_POST['inputPhone'],$_POST['inputDate'],$_POST['inputEmail'],$connection);

    if ($res) {
      header("Location: ../templates/viewAgent.php?msg=modification réussie");
    }else {
      header("Location: ../templates/viewAgent.php?msg=modification échouée");
    }
  }





?>