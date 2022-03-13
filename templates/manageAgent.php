<?php 
session_start();
if (empty($_SESSION['current_user'])) {
  header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
  <title>MANAGE-AGENT</title>
</head>
<body>
  <div class="container-md">
    <form action="../controllers/agentController.php" method="post">

    </form>
  </div>
</body>
</html>