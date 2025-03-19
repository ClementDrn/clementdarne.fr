<?php
// Uncomment for debugging
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
    <meta name="description" content="Salut, moi c'est Clément et voici mon site vitrine. Je fais partie des 8 milliards êtres humains qui peuplent cette belle planète qu'est la Terre. Actuellement passioné par mes études d'informatique, j'aspire à continuer en recherche.">
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
          <h2>Projets</h2>
          <div class="cards">
            <?php
              require_once __DIR__.'/../src/projects.php';
              displayProjects();
            ?>
          </div>
        </section>

        <section id="about">

          <h2>My Journey</h2>
          <div class="timeline">
            <?php 
              $events = [
                ["type" => "school", "title" => "IUT Lyon 1", "date" => "2019 - 2022", "description" => "Two-year DUT in computer science", "icon" => "📖", "children" => [
                  ["type" => "exchange", "title" => "Cégep de Matane", "date" => "Jan. 2022 - Aug. 2022", "description" => "International exchange in Canada", "icon" => "📖"],
                  ["type" => "internship", "title" => "CDRIN - Game AI Research", "date" => "2022", "description" => "Worked on game AI and procedural generation research.", "icon" => "💼"]
                ]],
                ["type" => "school", "title" => "IUT Lyon 1", "date" => "2019 - 2022", "description" => "Two-year DUT in computer science", "icon" => "📖"],
                ["type" => "school", "title" => "Grenoble INP - Ensimag", "date" => "2022 - 2025", "description" => "Information Systems Engineering specialization.", "icon" => "📖", "children" => [
                  ["type" => "internship", "title" => "TIMA Lab - AI & FPGA Research", "date" => "2023", "description" => "Research on AI acceleration with FPGA integration.", "icon" => "💼"],
                  ["type" => "internship - Internship", "title" => "DIAMSENS - Embedded Software Engineer", "date" => "May 2024 - Sept. 2024", "description" => "Developed reliable software on Raspberry Pi for real-world sensor testing.", "icon" => "💼"],
                  ["type" => "exchange", "title" => "Kobe University - Japan", "date" => "Oct. 2024 - Sept. 2025", "description" => "One-year academic exchange program in Japan.", "icon" => "🌍", "children" => [
                    ["type" => "research", "title" => "Kobe University - AI Research", "date" => "2025", "description" => "Research on AI and machine learning.", "icon" => "💼"]
                  ]]
                ]]
              ];
              
              function renderEvent($event, $iChild, $nChild, $isParentLast = false, $depth = 0) {
                $isLast = $iChild == $nChild - 1;
                echo "<div class='item-group".($iChild == 0 ? " first" : "").($isLast ? ($isParentLast ? " very-last" : "")." last" : "")."'>";

                echo "<div class='timeline-item'>";
                echo "<div class='milestone'></div>";
                echo "<div class='icon'>{$event['icon']}</div>";
                echo "<div class='content'>";
                echo "<h3>{$event['title']}</h3>";
                echo "<p class='date'>{$event['date']}</p>";
                echo "<p>{$event['description']}</p>";
                echo "</div></div>";
                
                if (!empty($event['children'])) {
                  echo "<svg class='branch-svg branch-out' viewBox='0 0 200 100' xmlns='http://www.w3.org/2000/svg'>";
                  echo "<path d='M 0,100 C 0,50 42,50 42,0' stroke='#458e68' stroke-width='4' fill='none'/></svg>";
                  $i = 0;
                  $n = count($event['children']);
                  for ($i = 0; $i < $n; $i++) {
                    renderEvent($event['children'][$i], $i, $n, $isLast, $depth + 1);
                  }
                  // If this is not the last item, draw a branch in
                  // The last item should represent present time, so no branch in.
                  if (!$isLast) {
                    echo "<svg class='branch-svg branch-in' viewBox='0 0 200 100' xmlns='http://www.w3.org/2000/svg'>";
                    echo "<path d='M 42,100 C 42,50 0,50 0,0' stroke='#458e68' stroke-width='4' fill='none'></path>";
                  }
                }

                echo "</div>";
              }
              
              $i = 0;
              $n = count($events);
              for ($i = 0; $i < $n; $i++) {
                $isLast = $i == $n - 1;
                renderEvent($events[$i], $i, $n, $isLast);
              }
            ?>
          </div>
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
