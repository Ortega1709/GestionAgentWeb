
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style/style.css">
  <title>login</title>
</head>
  <body class="body-log">
  
    </br></br></br></br></br>
    <div class="container w-50">
    <div class="shadow-lg p-3 mb-5 bg-body rounded">
    <center>
      <h2 class="hlogin">LOGIN-ADMIN <img src="../assets/images/login.png" alt="..." class="logo"></h2>
    </center>
    

    <?php if($_GET['msg']){ ?>
      <div class="alert alert-success" role="alert">
        <?=$_GET['msg']; ?>
      </div>
    <?php }elseif($_GET['err']){ ?>
      <div class="alert alert-danger" role="alert">
        <?=$_GET['err']; ?>
      </div>
    <?php } ?>

      <form action="../controllers/drhController.php" method="POST">
          <div class="mb-3">
            <div class="col-auto">
            <label for="emailForm" class="form-label">Email</label>
            <input type="email" id="emailForm" class="form-control" autocomplete="false"  name="emailAdmin">
            </div>
          </div>
          <div class="mb-3">
            <div class="col-auto">
            <label for="passwordForm" class="form-label">Password</label>
            <input type="password" id="passwordForm" class="form-control" name="passwordAdmin">
            </div>
          </div>
        
          </br></br>
          <button type="submit" class="btn-connexion" name="connexionAgent">Connexion</button>
          <a class="btn-cancel" onclick=window.location.href='../index.php'>Retour</a>
      </form>
      
    </div>
    </div>
  </body>
</html>