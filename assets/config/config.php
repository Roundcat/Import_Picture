<?php

// Définit le jeu de caractères en utf8 des bases de données
$encodage = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
// Connexion à la base de données prestashop et test de présence d'erreurs
$bddUsernamePS = 'root';
$bddPasswordPS = '';
$bddDsnPS = 'mysql:host=localhost;dbname=prestashop';

try {
  $connexionPS = new PDO($bddDsnPS, $bddUsernamePS, $bddPasswordPS, $encodage);
}
catch (Exception $e) {
  die('Erreur ! : ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
</head>
</html>
