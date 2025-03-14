<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once __DIR__.'/../src/api.php';

// Get world population value
$population = getWorldPopulationString();
if ($population == '') {
  $population = "8 milliards";  // default value
}
?>

<!doctype html>
<html lang="fr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Salut, moi c'est Clément Darne, je suis étudiant en informatique et voici mon site Web personnel.">
    <meta name="author" content="Clément Darne">
    <title>Clément Darne</title>

    <link rel="canonical" href="https://clementdarne.dev">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="/assets/css/core.css" rel="stylesheet">
    <link href="/assets/css/home.css" rel="stylesheet">
  </head>

  <body>

    <!-- Navigation bar -->
    <header class="header-fixed">
      <div class="navigation-bar">
        <h3 class="nav-title">
          <a href="/" title="Accueil">Clément Darne</a>
        </h3>
        <nav>
          <a id="nav-home" class="nav-link active" aria-current="page" href="#start-page">Accueil</a>
          <a id="nav-projects" class="nav-link" href="#projects">Projets</a>
          <a id="nav-about" class="nav-link" href="#about">À propos de moi</a>
          <a id="nav-contact" class="nav-link" href="#contact">Contact</a>
        </nav>
      </div>
    </header>
      
    <main>
      
      <section id="start-page">
  
        <div class="row">
          <img src="assets/img/clementdarne_2025.jpg" alt="Photo de Clément Darne" width="300" height="450"/>
          <div class="column justify-center">
            <div id="title">
              <h1 class="text-left">Salut, moi c'est <strong>Clément</strong></h1>
              <p class="lead text-right">Étudiant ingénieur en informatique</p>
            </div>
            <p class="quote">
              Je fais partie des <?php echo $population?> êtres humains qui peuplent cette belle planète qu'est la <strong>Terre</strong>.
              Actuellement passioné par mes études d'<strong>informatique</strong>, j'aspire à continuer en <strong>recherche</strong>.
            </p>
          </div>
        </div>
  
      </section>

      <div class="container home-container">

        <section id="projects">
          <?php
            echo "1";
            require_once __DIR__.'/../src/projects.php';
            echo "2";
            displayProjects();
            echo "3";
          ?>
        </section>

        <section id="about">
          
          <h2>About me</h2>
          <p>
            Je suis un être humain parmi les <?php echo $population?> qui peuplent cette belle planète qu'est la Terre.
            Actuellement passioné par mes études d'informatique, j'aspire à continuer en recherche.
          </p>
        </section>

        <section id="contact" class="row contact-list">
          <a class="contact" id="email-contact" href="mailto:cledarne@gmail.com" target="_blank">
            <i class="bi-envelope"></i>
            <p>cledarne@gmail.com</p>
          </a>
          <a class="contact" id="github-contact" href="https://github.com/ClementDrn" target="_blank">
            <i class="bi-github"></i>
            <p>@ClementDrn</p>
          </a>
          <a class="contact" id="linkedin-contact" href="https://www.linkedin.com/in/clement-darne/" target="_blank">
            <i class="bi-linkedin"></i>
            <p>@clement-darne</p>
          </a>
        </section>

      </div>
    </main>

    <footer>
      <p class="license">
        Ce site web est mis à disposition selon les termes de la
        <a rel="license" href="http://creativecommons.org/licenses/by/4.0/">
          Licence Creative Commons Attribution 4.0 International
        </a>. 
      </p>
    </footer>

  </body>

  <script type="text/javascript" src="/assets/js/home.js"></script>
</html>
