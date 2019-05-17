<?php
  $_SESSION = array();
  session_destroy();
  header("refresh:0;url=projet.php");
  die(0);
?>
