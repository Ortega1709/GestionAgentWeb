<?php 

  /* FONCTION D'AJOUT D'UNE EVALUATION */
  function ajoutEvaluation($idagent,$nomagent,$nomdrh,$quantitetravail,$qualitetravail,$autonomie,$motivation,$priseinitiative,$relation,$dateevaluation,$connection){
    $sql = "INSERT INTO Evaluation (idAgent,nomAgent,nomDrh,quantiteTravail,qualiteTravail,autonomie,motivation,".
           "priseInitiative,relation,dateEvaluation)". 
           "VALUES ('$idagent','$nomagent','$nomdrh','$quantitetravail','$qualitetravail','$autonomie','$motivation','$priseinitiative','$relation',NOW())";

    $res = $connection->query($sql);
    if ($res) {
      return 1;
    }else {
      return 0;
    }
  }

  /* FONCTION DE SUPPRESSION D'UNE EVALUATION */
  function supprimerEvaluation(int $id,$connection){
    $sql = "DELETE FROM Evaluation WHERE id=$id";
    $res = $connection->query($sql);

    if ($res) {
      return 1;
    }else {
      return 0;
    }
  }

  /* FONCTION DE MODIFICATION D'UNE EVALUATION */
  function modifierEvaluation($idagent,$nomagent,$nomdrh,$quantitetravail,$qualitetravail,$autonomie,$motivation,$priseinitiative,$relation,$dateevaluation,$connection){
    $sql = "UPDATE Evaluation SET idAgent='$idagent',nomAgent='$nomagent',nomDrh='$nomdrh',". 
           "quantiteTravail='$quantitetravail',autonomie='$autonomie',motivation='$motivation',". 
           "priseInitiative='$priseinitiative',relation='$relation','$dateevaluation'";
    $res = $connection->query($sql);
    if ($res) {
      return 1;
    }else {
      return 0;
    }
  }

  /* FONCTION DE RECHERCHE D'UNE EVALUATION */
  function rechercherEvaluation(int $id,$connection){
    $sql = "SELECT * FROM Evaluation WHERE id=$id";
    $res = $connection->query($sql);
    return $res;
  }

  /* FONCTION QUI AFFICHE TOUTES LES EVALUATIONS */
  function evaluations($connection){
    $sql = "SELECT * FROM Evaluation";
    $res = $connection->query($sql);
    return $res;
  }

?>