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
      header("Location: ../templates/loginDrh.php");
    }
  }
?>