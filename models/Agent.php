<?php 
  //require("../models/ConnexionDatabase.php");

  /* FONCTION D'AJOUT D'UN AGENT */
  function ajoutAgent($nom,$postnom,$prenom,$adresse,$fonction,$telephone,$dateNaissance,$email,$connection){
    $sql = "INSERT INTO Agent (nom,postNom,prenom,adresse,fonction,telephone,dateNaissance,email)".
           "VALUES('$nom','$postnom','$prenom','$adresse','$fonction','$telephone','$dateNaissance','$email')";
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

  /* FONCTION DE MODIFICATION D'EVALUATION */
  function modifierStatusEvaluation(int $id, int $status, $connection){
    $sql = "UPDATE Agent SET estEvalue=$status WHERE id=$id";
    $res = $connection->query($sql);
    if ($res) {
      return 1;
    }else{
      return 0;
    }
  }

  /* FONCTION DE MODIFICATION D'UN AGENT */
  function modifierAgent(int $id,$nom,$postnom,$prenom,$adresse,$fonction,$telephone,$dateNaissance,$email,$connection){
    $sql = "UPDATE Agent SET nom='$nom',postNom='$postnom',prenom='$prenom',adresse='$adresse',".
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
    $sql = "SELECT * FROM Agent";
    $res = $connection->query($sql);
    $nb = mysqli_num_rows($res);

    return $nb;
  }

  /* FONCTION POUR AFFICHER LE NOMBRE D'AGENT EVALUE */
  function nbAgentEvalue($connection){
    $sql = "SELECT * FROM Agent WHERE estEvalue = '1'";
    $res = $connection->query($sql);
    $nb = mysqli_num_rows($res);

    return $nb;
  }

  /* FONCTION POUR AFFICHER LE NOMBRE D'AGENT NON EVALUE */
  function nbAgentNonEvalue($connection){
    $sql = "SELECT * FROM Agent WHERE estEvalue = '0'";
    $res = $connection->query($sql);
    $nb = mysqli_num_rows($res);

    return $nb;
  }

  /* FONCTION QUI RETOURNE LES INFORMATIONS D'un AGENT NON EVALUE PAR SON ID */

  function statusEvalue(int $id, $connection){
    $sql = "SELECT * FROM Agent WHERE id = '$id' AND estEvalue= '0'";
    $res = $connection->query($sql);
    return $res;
  }

  /* FONCTION QUI REINITIALISE LA TABLE AGENT */
  function reinitialiserAgent($connection) {
    $sql = "TRUNCATE Agent";
    $res = $connection->query($sql);
    return $res;
  }

  /* FONCTION QUI REMET A 0 TOUS LES 1 */
  function initialiser($connection) {
    $sql = "UPDATE Agent SET estEvalue = 0 WHERE estEvalue = 1";
    $res = $connection->query($sql);
    return $res;
  }

  /* FONCTION QUI RETOURNE TOUS LES AGENTS EVALUES */
  function agentsEvalues($connection) {
    $sql = "SELECT * FROM Agent WHERE estEvalue= '1'";
    $res = $connection->query($sql);
    return $res;
  }

  /* FONCTION QUI RETOURNE TOUS LES AGENTS NON EVALUES */
  function agentsNonEvalues($connection) {
    $sql = "SELECT * FROM Agent WHERE estEvalue= '0'";
    $res = $connection->query($sql);
    return $res;
  }
  
?>