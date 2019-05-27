<?php

  echo "<h2>Bienvenue sur votre site de gestion des demandes de matériel</h2>\n";

if (isConnected())
{
  echo "Vous êtes \"" . $_SESSION["nom"] . "\", un ";
  if ($_SESSION["travail"] == "Service Technique")
  {
    echo "membre du ";
  }
  echo $_SESSION["travail"] . "</br>Votre adresse mail est " . $_SESSION["mail"];
  echo "<p>Cette interface vous permet de:
  <ul>";
  if (isEtudiant())
  {
    echo "<li> <a href=\"?page=1\">Créer</a> une demande pour un matériel/logiciel.";
  }
  if (isEtudiant() || isProfesseur())
  {
    echo "<li> <a href=\"?page=2\">Modifier</a> une demande déjà créée.</li>";
  }
  if (isST())
  {
    echo "<li> <a href=\"?page=3\">Valider</a> une demande acceptée par un professeur.</li>";
    echo "<li> <a href=\"?page=demandeFinie\">Archiver</a> les demandes terminées.</li>";
  }
  echo "<li> <a href=\"?page=4\">Consulter</a> l'etat de vos demandes.</li>
  </ul>
  </p>";

  echo "<a href=\"?page=disconnect\">Se deconnecter.</a>";
}
else
{
  echo "<a href=\"?page=login\">Connectez vous !</a>";
}
?>
