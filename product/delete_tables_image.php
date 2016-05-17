<?php
// Le délai d'exécution du script n'a pas de limite de temps
set_time_limit(0);

// Fixe la limite de mémoire à 2Go
ini_set("memory_limit",'2G');

// Initialise le chronomètre pour calculer le temps mis pour faire tout l'import
$time_start = microtime(true);

// Connexion aux bases de données
include("../assets/config/config.php");

// Vide les tables de la base prestashop
$del = $connexionPS->exec('DELETE FROM ps_image;');
echo ('Effacement de ' . $del . ' lignes de la table ps_image<br />');
$req = $connexionPS->exec('ALTER TABLE ps_image AUTO_INCREMENT = 1;');
$del = $connexionPS->exec('DELETE FROM ps_image_lang;');
echo ('Effacement de ' . $del . ' lignes de la table ps_image_lang<br />');
$del = $connexionPS->exec('DELETE FROM ps_image_shop;');
echo ('Effacement de ' . $del . ' lignes de la table ps_image_shop<br />');

// Fin du chronomètre
$time_end = microtime(true);
$time = $time_end - $time_start;
echo "Durée : $time secondes\n";

?>
