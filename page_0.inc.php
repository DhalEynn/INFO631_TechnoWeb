<?php

  echo "<h2>Bienvenue sur votre site de gestion des demandes de matériel</h2>\n";

if (isConnected())
{
  echo "<p>Cette interface vous permettra de:
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
  }
  echo "<li> <a href=\"?page=4\">Consulter</a> l'etat de vos demandes.</li>
  </ul>
  </p>";

  echo "<a href=\"?page=disconnect\">Se deconnecter.</a>";
}
else
{
  echo "test";
}
?>
