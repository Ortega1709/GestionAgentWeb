<?php 
  define('MYSQL_SERVER','localhost');
  define('USERNAME','root');
  define('PASSWORD','');
  define('DATABASE','EvaluationAgents');

  /* FONCTION DE CONNEXION */
  $connection = new mysqli(MYSQL_SERVER,USERNAME,PASSWORD,DATABASE);
?>