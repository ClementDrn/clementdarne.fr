<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once __DIR__.'/../src/base.php';
loadEnv();

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://get-population.p.rapidapi.com/population",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 5,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => [
    "x-rapidapi-host: get-population.p.rapidapi.com",
    "x-rapidapi-key: ".$_ENV['RAPIDAPI_KEY']
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

$population = "8 milliards";
if ($err == '') {
  $array = json_decode($response, true);
  if ($array['readable_format'] != null) {
    $population = $array['readable_format'];
  }
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
          <!-- TODO: Change CSS tags with JS when clicking -->
          <a class="nav-link active" aria-current="page" href="#">Accueil</a>
          <a class="nav-link" href="#about">À propos de moi</a>
          <a class="nav-link" href="#projects">Projets</a>
          <a class="nav-link" href="#contact">Contact</a>
        </nav>
      </div>
    </header>
      
    <main>
      
      <section id="start-page">
  
        <div class="row">
          <img src="assets/img/clementdarne_2025.jpg" alt="Photo de Clément Darne" width="300" height="450"/>
          <div class="column justify-center">
            <div id="title">
              <h1 class="text-left">Salut, moi c'est Clément</h1>
              <p class="lead text-right">Étudiant ingénieur en informatique</p>
            </div>
            <p class="quote">
              Je fais partie des <?php echo $population?> êtres humains qui peuplent cette belle planète qu'est la Terre.
              Actuellement passioné par mes études d'informatique, j'aspire à continuer en recherche.
            </p>
          </div>
        </div>
  
      </section>

      <div class="container home-container">
        
        <section id="about">
          
          <h2>About me</h2>
          <p>
            Je suis un être humain parmi les <?php echo $population?> qui peuplent cette belle planète qu'est la Terre.
            Actuellement passioné par mes études d'informatique, j'aspire à continuer en recherche.
          </p>
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

  <script type="text/javascript" src="/assets/js/core.js"></script>
</html>
