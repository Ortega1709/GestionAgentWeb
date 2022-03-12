<?php 
  require("../models/ConnexionDatabase.php");
  
  /* FONCTION D'AJOUT D'UN AGENT */
  function ajoutAgent($nom,$postnom,$prenom,$profil,$adresse,$fonction,$telephone,$dateNaissance,$email,$connection){
    $sql = "INSERT INTO Agent (nom,postNom,prenom,profil,adresse,fonction,telephone,dateNaissance,email)".
           "VALUES('$nom','$postnom','$prenom','$profil','$adresse','$fonction','$telephone','$dateNaissance','$email')";
    $res = $connection->query($sql);
    if($res){
      return 1;
    }else {
      return 0;
    }
  }

  /* FONCTION DE SUPPRESSION D'UN AGENT */
  function supprimerAgent(int $id,$connection){
    $sql = "DELETE FROM Agent WHERE id=$id";
    $res = $connection->query($sql);
    if ($res) {
      return 1;
    }else {
      return 0;
    }
  }

  /* FONCTION DE MODIFICATION D'UN AGENT */
  function modifierAgent(int $id,$nom,$postnom,$prenom,$profil,$adresse,$fonction,$telephone,$dateNaissance,$email,$connection){
    $sql = "UPDATE Agent SET nom='$nom',postNom='$postnom',prenom='$prenom',profil='$profil',adresse='$adresse',".
           "fonction='$fonction',telephone='$telephone',dateNaissance='$dateNaissance',email='$email' ".
           "WHERE id='$id'";
    $res = $connection->query($sql);
    if ($res) {
      return 1;
    }else {
      return 0;
    }
  }

  /* FONCTION DE RECHERCHE D'UN AGENT */
  function rechercherAgent(int $id,$connection){
    $sql = "SELECT * FROM Agent WHERE id=$id";
    $res = $connection->query($sql);
    return $res;
  }

  /* FONCTION AFFICHER TOUS LES AGENTS */
  function agents($connection){
    $sql = "SELECT * FROM Agent";
    $res = $connection->query($sql);
    return $res;

    /*while ($lignes = $res->fetch_array()) {
      echo $lignes['id'];
    }*/
  }

  /* FONCTION POUR AFFICHER LE NOMBRE D'AGENT */
  function nbAgent($connection){
    $sql = "SELECT COUNT(*) FROM Agent";
    $res = $connection->query($sql);
    return $res;
  }

  /* FONCTION POUR AFFICHER LE NOMBRE D'AGENT EVALUE */
  function nbAgentEvalue($connection){
    $a = 1;
    $sql = "SELECT COUNT(*) FROM Agent WHERE estEvalue = $a";
    $res = $connection->query($sql);
    return $res;
  }

  echo pi();
?>