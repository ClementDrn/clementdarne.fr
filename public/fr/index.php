<?php
// Uncomment for debugging
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Salut, moi c'est Clément et voici mon site vitrine. Je fais partie des 8 milliards êtres humains qui peuplent cette belle planète qu'est la Terre. Actuellement passionné par mes études d'informatique, j'aspire à continuer en recherche.">
    <meta name="author" content="Clément Darne">
    <title>Clément Darne</title>

    <link rel="canonical" href="https://clementdarne.dev/fr">
    <link rel="alternate" hreflang="fr" href="https://clementdarne.dev/fr"/>
    <link rel="alternate" hreflang="en" href="https://clementdarne.dev/en"/>
    <link rel="alternate" hreflang="x-default" href="https://clementdarne.dev/en"/>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="/assets/css/core.css" rel="stylesheet">
    <link href="/assets/css/home.css" rel="stylesheet">
  </head>

  <?php
    require_once __DIR__.'/../../src/home.php'; 
    displayBody("fr"); 
  ?>
    
  <script type="text/javascript" src="/assets/js/home.js"></script>
</html>
