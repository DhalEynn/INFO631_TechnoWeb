<?php

include("functions.php");
date_default_timezone_set('UTC');

if (!isset($_SESSION))
{
  session_start();
}

if (!isset($_SESSION["travail"]) || !isset($_SESSION["nom"]) || !isset($_SESSION["mail"]))
{
  $_SESSION["travail"] = NULL;
  $_SESSION["nom"] = NULL;
  $_SESSION["mail"] = NULL;
}

// Connect to the database
$conn = connexion();

?>

<!DOCTYPE HTML>

<html>

  <head>
    <title></title>
    <meta content="info">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="projet.css" />
  </head>

  <body>

  <div id="fond">

    <div id="titre">
      <span>Projet 1</span>
    </div>

    <div id="menu">
      <ul id="lemenu">
      <?php
      // Définit les indexes pour le css.
      $encours = array(" "," "," "," "," "); // pour les pages 0 à 4
      $encours["demandeFinie"] = " ";
      $encours["signup"] = " ";
      $encours["login"] = " ";

      if(!isset($_GET["page"]))
      {
        $page = 0;
      }
      else
      {
        $page = $_GET["page"];
      }

      // Change la valeur de la page en cours pour le css.
      $encours[$page] = "encours";

      // Crée le menu (les onglets) en fonction du travail de la personne.
      echo "<li><a href=\"?page=0\" class=\"btn_menu $encours[0]\">Accueil</a></li>\n";
      if (isConnected())
      {
        if (isEtudiant())
        {
          echo "<li><a href=\"?page=1\" class=\"btn_menu $encours[1]\">Creation</a></li>\n";
        }
        if (isEtudiant() || isProfesseur())
        {
          echo "<li><a href=\"?page=2\" class=\"btn_menu $encours[2]\">Modification</a></li> \n";
        }
        if (isST())
        {
          echo "<li><a href=\"?page=3\" class=\"btn_menu $encours[3]\">Validation</a></li> \n";
          echo "<li><a href=\"?page=demandeFinie\" class=\"btn_menu $encours[demandeFinie]\">Archiver</a></li> \n";
        }
        echo "<li><a href=\"?page=4\" class=\"btn_menu $encours[4]\">Consultation</a></li> \n";
      }
      else
      {
        echo "<li><a href=\"?page=signup\" class=\"btn_menu $encours[signup]\">Signup</a></li>\n";
        echo "<li><a href=\"?page=login\" class=\"btn_menu $encours[login]\">Login</a></li> \n";
      }
      ?>
      </ul>
    </div>

    <div id="contenu">
    <?php
      if( file_exists("page_".$page.".inc.php") ){
        include("page_".$page.".inc.php");
      }
    ?>
    </div>

    <div id="pied">
      <span>Polytech Annecy-Chambéry - Module IGI642- Base de données et Technologies web</span>
    </div>

  </div>

  </body>
</html>
