<?php

  echo "<h2>Bienvenue sur votre site de gestion des demandes de matériel</h2>\n";

if (isConnected())
{
  echo "<p>Cette interface vous permettra de:
  <ul>
  <li> <a href=\"?page=1\">Créer</a> une demande pour un matériel/logiciel,
  <li> <a href=\"?page=3\">Modifier</a> une demande déjà créée,</li>
  <li> <a href=\"?page=2\">Valider</a> une demande acceptée par un professeur,</li>
  <li> <a href=\"?page=4\">Consulter</a> l'etat des demandes.</li>
  </ul>
  </p>";
}
else
{
  echo "<a href=\"?page=signup\">Sign Up</a>
  <a href=\"?page=login\">Login</a>"
}
?>
