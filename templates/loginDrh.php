<?php session_start(); session_destroy(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <title>LOGIN-AGENT</title>
</head>
  <body>
    <form action="../controllers/drhController.php" method="POST">
        <legend>LOGIN-ADMIN</legend>
        <div class="mb-3">
          <label for="emailForm" class="form-label">Email</label>
          <input type="email" id="emailForm" class="form-control" name="emailAdmin">
        </div>

        <div class="mb-3">
          <label for="passwordForm" class="form-label">Password</label>
          <input type="password" id="passwordForm" class="form-control" name="passwordAdmin">
        </div>
      
        <button type="submit" class="btn btn-primary" name="connexionAgent">Submit</button>
    </form>
    
  </body>
</html>