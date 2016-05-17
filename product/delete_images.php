<?php
// Le délai d'exécution du script n'a pas de limite de temps
set_time_limit(0);

// Fixe la limite de mémoire à 2Go
ini_set("memory_limit",'2G');

// Initialise le chronomètre pour calculer le temps mis pour faire tout l'import
$time_start = microtime(true);

// Connexion aux bases de données
include("../assets/config/config.php");

// Appel des fonctions
include("../assets/function/function.php");

// Appel des variables constantes
include("../assets/constant/constant.php");

// Ouverture du dossier des images stockées par PS
$dir = opendir(IMAGE_PATH_PS);

while($image = readdir($dir)) {
  if($image != '.' && $image != '..' && is_dir(IMAGE_PATH_PS.$image)) {
    echo '<ul>' . realpath(IMAGE_PATH_PS.$image). '</ul>';
    @clearDir(IMAGE_PATH_PS.$image);
  }
}

closedir($dir);

// Fin du chronomètre
$time_end = microtime(true);
$time = $time_end - $time_start;
echo "Suppression des images des articles prestashop<br/>Durée : $time secondes\n";

?>
