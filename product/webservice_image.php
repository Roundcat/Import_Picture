<?php

// Le délai d'exécution du script n'a pas de limite de temps
set_time_limit(0);

// Connexion aux bases de données
include("../assets/config/config.php");

// Connexion au webservice
include("../assets/config/webservice_config.php");

// Appel des variables constantes
include("../assets/constant/constant.php");

// Appel des requêtes
include("requete.php");

// Fixe la limite de mémoire à 2Go
ini_set("memory_limit",'2G');

// Initialise le chronomètre pour calculer le temps mis pour faire tout l'import
$time_start = microtime(true);

// Requête qui récupère l'identifiant d'un article et sa reference dans la table ps_product
$requete_select_psProduct->execute();

// compteur
$i = 1;

// chemin du dossier où aller chercher les images à importer dans PS
// $dirname = 'd:\Images\testpresta\\';
// ouvre le dossier stocké dans la variable $dirname et récupère un pointeur dessus
// $dir = opendir($dirname);

// parcours pour chaque ligne de retour de la requête
while ($donnees = $requete_select_psProduct->fetch()) {
  // déclaration des variables de retour de la requête
  $idproduct = $donnees['id_product'];
  $reference = $donnees['reference'];

  // Déclenchement chrono d'interval
  $time_top = microtime(true);

  try {
    // Ajout de l'image Produit
    $urlImage = PS_SHOP_PATH.'api/images/products/' . $idproduct . '/';    // l'identifiant PS du produit

    $strphoto = $reference . '.jpg';

    if (isset($urlImage)) {
      $image_path = IMAGE_PATH . $strphoto;    // chemin windows de l'image d'origine à importer dans PrestaShop
      if (file_exists($image_path)) {
        echo ('L\'image <b>' . $strphoto . '</b> existe !<br />');
        $image_mime = image_type_to_mime_type(exif_imagetype($image_path));
        $args['image'] = new CurlFile($image_path, $image_mime);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
        curl_setopt($ch, CURLOPT_URL, $urlImage);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_USERPWD, PS_WS_AUTH_KEY.':'); //API KEY Prestashop
        curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
        $result = curl_exec($ch);
        curl_close($ch);
      } else {
        echo ('L\'image <b>' . $strphoto . '</b> n\'existe pas. Import impossible !<br />');
      }
    }

    // affiche le compteur
    echo("Numéro : $i \n");

    // chrono d'interval
    $time_interval = $time_top - $time_start;
    echo "Durée : $time_interval secondes\n";
    echo '<br \>';

  } catch (PrestaShopWebserviceException $e) {
    $trace = $e->getTrace();
    if ($trace[0]['args'][0] == 404) echo 'Bad ID';
    else if ($trace[0]['args'][0] == 401) echo 'Bad auth key';
    else echo $e->getMessage();
  }

  // incrémentaion compteur d'article
  $i++;
}

// closedir($dir);
$requete_select_psProduct->closeCursor();

// Fin du chronomètre
$time_end = microtime(true);
$time = $time_end - $time_start;
echo "Durée : $time secondes\n";
?>
