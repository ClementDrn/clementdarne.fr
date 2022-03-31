<?php

function projectPage($projectID) {
  require __DIR__."/../../src/base.php";
  require __DIR__."/../../src/database.php";
  require __DIR__."/../../vendor/autoload.php";

  $db = connectToDB();
  $statement = $db->prepare("select * from f5kd_project where project_id = ?");
  $statement->execute([$projectID]);

  $row = $statement->fetch(PDO::FETCH_ASSOC);

  if (!$row || !$row['visible']) {
    error(403);
    exit();
  }

  $directory = $row['directory'];

  if (!$project = parse_ini_file(__DIR__.'/'.$directory.'/project.ini', TRUE)) {
    throw new exception("Unable to open 'project.ini'");
  }

  $name = $row['name'];
  $presentation = $row['presentation'];

  $parsedown = new Parsedown();
  $text = $parsedown->text(file_get_contents(__DIR__.'/'.$directory.'/text.md'));

  $skills = explode(',', $project['skills']['list']);

  echo ("
    <!doctype html>
    <html lang='fr'>
      <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <meta name='description' content=''>
        <meta name='author' content='Clément Darne'>
        <title>$name · Clément Darne</title>
    
        <link rel='canonical' href='https://clementdarne.fr/projets/$directory'>
    
        <link href='/assets/css/core.css' rel='stylesheet'>
        <link href='/assets/css/projects.css' rel='stylesheet'>
      </head>
    
    
      <body>
        
    
        <!-- Navigation bar -->
        <header>
          <div class='navigation-bar'>
            <h3 class='nav-title'>
              <a href='/' title='Accueil'>Clément Darne</a>
            </h3>
            <nav>
              <a class='nav-link' href='/'>Accueil</a>
              <a class='nav-link active' aria-current='page' href='/projets/'>Projets</a>
              <a class='nav-link' href='/a-propos-de-moi/'>À propos de moi</a>
              <a class='nav-link' href='/contact/'>Contact</a>
            </nav>
          </div>
        </header>
        
        <div class='container'>
        
          <main class='text-center'>
        
            <!-- Introduction -->
            <section class='introduction'>
              <h1>$name</h1>
              <p class='lead'>
                $presentation
              </p>
            </section>
        
            <!-- Description -->
            <section id='description'>
              $text
            </section>
        
            <!-- Skills -->
            <section id='skills'>
              <h2>Compétences travaillées</h2>
              <ul>"
  );

  foreach ($skills as $skill) {
    echo ("
                <li>$skill</li>
    ");
  }
  
  echo ("
              </ul>
            </section>
  ");
    
  if (count($project['links']) !== 0) {
    echo ("
            <!-- Links -->
            <section id='links'>
              <h2>Liens du projet</h2>
    ");

    if (isset($project['links']['download'])) {
      echo ("
              <a href='".$project['links']['download']."' title='Télécharger le projet'>
                <img src='../../assets/icons/ic-download.svg' width='80' height='80' alt='Téléchargement'>
              </a>
      ");
    }

    if (isset($project['links']['github'])) {
      echo ("
              <a href='".$project['links']['github']."' title='GitHub' target='_blank'>
                <img src='../../assets/icons/bootstrap-icons/github.svg' width='80' height='80' alt='GitHub'>
              </a>
      ");
    }

    // TODO: Gitlab, other
    
    echo ("
            </section>
    ");
  }

  echo ("
          </main>
        
        
          <footer>
            <p class='license'>
              Ce site web est mis à disposition selon les termes de la
              <a rel='license' href='http://creativecommons.org/licenses/by/4.0/'>
                Licence Creative Commons Attribution 4.0 International
              </a>. 
            </p>
          </footer>
        
        
        </div> 
        
    
      </body>
    
    </html>
  ");
}
