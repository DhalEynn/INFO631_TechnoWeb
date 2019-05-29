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
</br></br><HR color="black">
<h2>Projet : Gestion des commandes pour projets pédagogiques (projet 1)</h2>
<div>
  <h3>Il s'agit de concevoir et réaliser une application web qui permet de gérer des commandes d'équipements pour les besoins des étudiants. Le processus à l'école est le suivant :</h3>
  <ul>
    <li>les étudiants remontent leurs besoins en termes de matériel/logiciel à l'enseignant responsable de l'enseignement concerné (CM, TD...)</li>
    <li>l'enseignant concerné complète la demande, la valide après échanges éventuels avec les étudiants puis transmet une demande de travaux au Service technique Polytech</li>
    <li>le Service technique demande un cahier des charges plus détaillé si nécessaire puis valide à son tour la demande de travaux</li>
    <li>dès lors, une information sur l'état d'exécution de la commande est fournie aux différentes parties prenantes (étudiants, enseignants, Service technique...).</li>
  </ul>
</div>
<div>
  <h3>Nous souhaitons mettre en place un support informatique pour ce processus avec les fonctionnalités attendues suivantes :</h3>
    <h4>Part 1 :</h4>
    <ul>
      <li>la saisie et la mise à jour d'une demande d'équipements (projet identifié, ligne budgétaire, produits concernés, quantités, fournisseurs...)</li>
      <li>l'accessibilité par différentes parties prenantes (Service technique, étudiants, enseignants...)</li>
      <li>visualisation de l'état d'avancement de la demande</li>
    </ul>
    <h4>Part 2 :</h4>
    <ul>
      <li>la possibilité d'insérer différents types de documents (photos, devis, copie d'un panier depuis un site marchand externe...)</li>
      <li>la possibilité d'envoyer des mails aux personnes concernées.</li>
    </ul>
</div>
<div>
  <h3>Etat du projet au <?php echo date("d/m/Y"); ?> :</h3>
    <h4>Objectifs terminés :</h4>
    <ul>
      <li>la saisie et la mise à jour d'une demande d'équipements (projet identifié, ligne budgétaire, produits concernés, quantités, fournisseurs...)</li>
      <li>l'accessibilité par différentes parties prenantes (Service technique, étudiants, enseignants...)</li>
      <li>visualisation de l'état d'avancement de la demande</li>
    </ul>
    <h4>Objectifs complétés partiellement :</h4>
    <ul>
      <li>la possibilité d'insérer différents types de documents (photos, devis, copie d'un panier depuis un site marchand externe...)</li>
    </ul>
    <h4>Objectifs restants :</h4>
    <ul>
      <li>la possibilité d'envoyer des mails aux personnes concernées.</li>
    </ul>
</div>
