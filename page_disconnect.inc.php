<?php
  $_SESSION = array();
  session_destroy();
  header("refresh:1;url=projet.php");
?>
