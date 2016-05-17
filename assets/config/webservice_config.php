<?php

// Définition des variables constantes
define('DEBUG', true);
define('PS_SHOP_PATH', 'http://localhost/prestashop/');
define('PS_WS_AUTH_KEY', 'K5UFGKD4J7HQMRNTYD5X4W62J8GBIRPU');
require_once('/PSWebServiceLibrary.php');

try {
	// Création d'un accès au service web
    $webService = new PrestaShopWebservice(PS_SHOP_PATH, PS_WS_AUTH_KEY, DEBUG);
}
catch (PrestaShopWebserviceException $ex) {
    // Shows a message related to the error
    echo 'Other error: <br />' . $ex->getMessage();
}
?>
