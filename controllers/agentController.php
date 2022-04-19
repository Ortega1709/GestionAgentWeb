<?php 

require("../models/ConnexionDatabase.php");
require("../models/Agent.php");

/* AJOUT AGENT */
if (isset($_POST['ajouterAgent'])) {
  if(
    $_POST['inputNom'] == null ||
    $_POST['inputPostNom'] == null ||
    $_POST['inputPrenom'] == null ||
    $_POST['inputAdresse'] == null ||
    $_POST['inputFonction'] == null ||
    $_POST['inputPhone'] == null){
      header("Location: ../templates/viewAgent.php?err=insértion échouée");
  
  }else{
    $res = ajoutAgent($_POST['inputNom'],$_POST['inputPostNom'],$_POST['inputPrenom'],$_POST['inputAdresse'],$_POST['inputFonction'],$_POST['inputPhone'],$_POST['inputDate'],$_POST['inputEmail'],$connection);
    if ($res) {
      header("Location: ../templates/viewAgent.php?msg=insértion réussie");
    }else {
      header("Location: ../templates/viewAgent.php?err=insértion échouée");
    }
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
        header("Location: ../templates/viewAgent.php?err=suppression échouée");
      }
    }
  }

  /* MODIFIER AGENT */
  if (isset($_POST['modifierAgent'])) {
    
    if(
      $_POST['inputNom'] == null ||
      $_POST['inputPostNom'] == null ||
      $_POST['inputPrenom'] == null ||
      $_POST['inputAdresse'] == null ||
      $_POST['inputFonction'] == null ||
      $_POST['inputPhone'] == null ||
      $_POST['inputID'] == null
    ){
      header("Location: ../templates/viewAgent.php?err=modification échouée");
    }else{
      $res = modifierAgent($_POST['inputID'],$_POST['inputNom'],$_POST['inputPostNom'],$_POST['inputPrenom'],$_POST['inputAdresse'],$_POST['inputFonction'],$_POST['inputPhone'],$_POST['inputDate'],$_POST['inputEmail'],$connection);

      if ($res) {
        header("Location: ../templates/viewAgent.php?msg=modification réussie");
      }else {
        header("Location: ../templates/viewAgent.php?err=modification échouée");
      }
    }
  }

  /* FILTRER TABLE */
  if(isset($_POST['filtrer'])){
    if ($_POST['selection'] == 1) {
      header("Location: ../templates/viewAgent.php?s=1");
    }elseif ($_POST['selection'] == 2) {
      header("Location: ../templates/viewAgent.php?s=2");
    }elseif ($_POST['selection'] == 3) {
      header("Location: ../templates/viewAgent.php?s=3");
    }
  }

  /* REINITIALISER TABLE */
  if ($_GET['d']) {
    $res = reinitialiserAgent($connection);
    if ($res) {
      header("Location: ../templates/viewAgent.php?msg=La table a été réinitialisé");
    } else {
      header("Location: ../templates/viewAgent.php?msg=La table n'a pas été réinitialisé");
    }
  }




?>