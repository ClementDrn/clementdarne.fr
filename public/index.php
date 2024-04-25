<!doctype html>
<html lang="fr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Salut, moi c'est Clément Darne, je suis étudiant en informatique et voici mon site Web personnel.">
    <meta name="author" content="Clément Darne">
    <title>Clément Darne</title>

    <link rel="canonical" href="https://clementdarne.fr">

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
          <a class="nav-link active" aria-current="page" href="#">Accueil</a>
          <a class="nav-link" href="#projects">Projets</a>
          <a class="nav-link" href="#about">À propos de moi</a>
          <a class="nav-link" href="#contact">Contact</a>
        </nav>
      </div>
    </header>
    
    <main class="container home-container">

      <section id="start-page">

        <h1 class="text-left">Salut, moi c'est Clément</h1>
        <p class="lead text-right">Étudiant en informatique</p>

      </section>

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
      </section>

      <section id="contact" class="row contact-list">
        <a class="contact" id="email-contact" href="mailto:cledarne@gmail.com" target="_blank">
          <img src="../assets/icons/bootstrap-icons/envelope.svg" alt="Email" width="32" height="32"></i>
          <p>cledarne@gmail.com</p>
        </a>
        <a class="contact" id="github-contact" href="https://github.com/ClementDrn" target="_blank">
          <img src="../assets/icons/bootstrap-icons/github.svg" alt="GitHub" width="32" height="32"></i>
          <p>@ClementDrn</p>
        </a>
        <a class="contact" id="linkedin-contact" href="https://www.linkedin.com/in/clement-darne/" target="_blank">
          <img src="../assets/icons/bootstrap-icons/linkedin.svg" alt="LinkedIn" width="32" height="32"></i>
          <p>@clement-darne</p>
        </a>
      </section>

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

  <script type="text/javascript" src="/assets/js/core.js"></script>
</html>
