<?php 
  session_start();
  require("../models/ConnexionDatabase.php");
  require("../models/Drh.php");

  /* LOGIN CONDITION */
  if (isset($_POST['connexionAgent'])) {
    if(loginDrh($_POST['emailAdmin'],$_POST['passwordAdmin'],$connection)){
      $_SESSION['current_user'] = $_POST['emailAdmin'];
      header("Location: ../templates/dashboard.php");
    }else {
      header("Location: ../templates/loginDrh.php?err=Erreur de connexion");
    }
  }

  /* RECHERCHE DRH */
  if (isset($_POST['rechercherDrh'])) {
    $id = $_POST['inputID'];
    if ($id == null) {
      header("Location: ../templates/manageDrh.php");
    }else {
      header("Location: ../templates/manageDrh.php?d=$id");
    }
  }

  /* AJOUT DRH */
  if (isset($_POST['ajouterDrh'])) {
    $email = $_POST['inputEmail'];  
    $password = $_POST['inputPassword'];
    $password1 = $_POST['inputPasswordConfirm'];
    if ($email != null && $password != null && $password1 != null) {
      if ($password == $password1) {
        $res = ajoutDrh($email,$password,$connection);
        if ($res) {
          header("Location: ../templates/viewDrh.php?msg=ajout réussi");
        }else {
          header("Location: ../templates/viewDrh.php?err=ajout echoue");
        }
      }else{
        header("Location: ../templates/manageDrh.php");
      }
    }else {
      header("Location: ../templates/manageDrh.php");
    }
  }

  /* SUPPRESSION */
  if (isset($_POST['supprimerDrh'])) {
    $id = $_POST['inputID'];
    if ($id == null) {
      header("Location: ../templates/manageDrh.php");
    }else {
      $res = supprimerDrh($id,$connection);
      if ($res) {
        header("Location: ../templates/viewDrh.php?msg=suppression réussie");
      }else {
        header("Location:../templates/viewDrh.php?err=suppression échouée");
      }
    }
  }

  /* MODIFICATION */
  if (isset($_POST['modifierDrh'])) {
    $ID = $_POST['inputID'];
    $email = $_POST['inputEmail'];
    $password = $_POST['inputPassword'];
    $password1 = $_POST['inputPasswordConfirm'];
    if ($email != null || $password != null || $password1 != null) {
      if ($password == $password1) {
        $res = modifierDrh($ID,$email,$password,$connection);
        if ($res) {
          header("Location: ../templates/viewDrh.php?msg=modification réussie");
        }else {
          header("Location:../templates/viewDrh.php?err=modification echouée");
        }
      }else {
        header("Location: ../templates/managerDrh.php");
      }
    }else {
      header("Location: ../templates/manageDrh.php");
    }
  }

  /* REINITIALISER DRH */
  if ($_GET['d']) {
    $res = reinitialiserDrh($connection);
    if ($res) {
      header("Location: ../templates/viewDrh.php?msg=La table a été reinitialisé");
    } else {
      header("Location:../templates/viewDrh.php?err=La table n'a pas été reinitialisé");
    }
  }
?>