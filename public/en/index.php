<?php
// Uncomment for debugging
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Hi, I'm Clément and here is my personal website. I am one of the 8 billion human beings populating this beautiful planet we call Earth. Currently passionate about my studies in computer science, I aspire to continue in research.">
    <meta name="author" content="Clément Darne">
    <title>Clément Darne</title>

    <link rel="canonical" href="https://clementdarne.dev/en">
    <link rel="alternate" hreflang="fr" href="https://clementdarne.dev/fr"/>
    <link rel="alternate" hreflang="en" href="https://clementdarne.dev/en"/>
    <link rel="alternate" hreflang="x-default" href="https://clementdarne.dev/en"/>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="/assets/css/core.css" rel="stylesheet">
    <link href="/assets/css/home.css" rel="stylesheet">
  </head>

  <?php
    require_once __DIR__.'/../../src/home.php'; 
    displayBody("en"); 
  ?>

  <script type="text/javascript" src="/assets/js/home.js"></script>
</html>
