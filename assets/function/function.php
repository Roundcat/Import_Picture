<?php

// fonction pour supprimer un dossier et son contenu y compris les sous dossiers
function clearDir($dossier) {
  $dir_iterator = new RecursiveDirectoryIterator($dossier);
  $iterator = new RecursiveIteratorIterator($dir_iterator, RecursiveIteratorIterator::CHILD_FIRST);

  // On supprime chaque dossier et chaque fichier	du dossier cible
  foreach($iterator as $fichier) {
	   $fichier->isDir() ? rmdir($fichier) : unlink($fichier);
  }

  // On supprime le dossier cible
  rmdir($dossier);
}

?>
