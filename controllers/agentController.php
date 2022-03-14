<?php 

require("../models/ConnexionDatabase.php");
require("../models/Agent.php");

/* AJOUT AGENT */
if ($_POST['ajouterAgent']) {
  $nom = $_POST['inputNom'];
  $postnom = $_POST['inputPostNom'];
  $prenom = $_POST['inputPrenom'];
  $profil = $_POST['inputFile'];
}



?>