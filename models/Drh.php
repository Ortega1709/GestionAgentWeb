<?php 

  /* FONCTION AJOUT DRH */
  function ajoutDrh($email,$motdepasse,$connection){
    $sql = "INSERT INTO Drh(email,motDePasse)".
           "VALUES('$email','$motdepasse')";
        
    $res = $connection->query($sql);
    if ($res) {
      return 1;
    }else {
      return 0;
    }
  }

  /* FONCTION SUPPRIMER DRH */
  function supprimerDrh(int $id,$connection){
    $sql = "DELETE FROM Drh WHERE id=$id";
    $res = $connection->query($sql);
    if($res){
      return 1;
    }else {
      return 0;
    }
  }

  /* FONCTION DE MODIFICATION D'UN DRH */
  function modifierDrh(int $id,$email,$motdepasse,$connection){
    $sql = "UPDATE Drh SET email='$email',motDePasse='$motdepasse' WHERE id=$id";
    $res = $connection->query($sql);
    if ($res) {
      return 1;
    }else {
      return 0;
    }
  }

  /* FONCTION DE CONNEXION D'UN DRH */
  function loginDrh($email,$motdepasse,$connection){
    $sql = "SELECT * FROM Drh WHERE email='$email'";
    $res = $connection->query($sql);
    $lignes = $res->fetch_array();
    $pwd = $lignes['motDePasse'];

    /* MECANISME DE VERIFICATION */
    if ($pwd == $motdepasse) {
      return 1;
    }else {
      return 0;
    }
  }

  /* FONCTION QUI AFFICHE TOUS LES DRHs */
  function drhs($connection){
    $sql = "SELECT * FROM Drh";
    $res = $connection->query($sql);
    return $res;
  }

  /* FONCTION QUI RECHERCHE UN DRH */
  function rechercherDrh(int $id, $connection){
    $sql = "SELECT * FROM Drh WHERE id=$id";
    $res = $connection->query($sql);
    return $res;
  }

  function nbDrh($connection){
    $sql = "SELECT * FROM Drh";
    $res = $connection->query($sql);
    $nb = mysqli_num_rows($res);

    return $nb;
  }

  
?>