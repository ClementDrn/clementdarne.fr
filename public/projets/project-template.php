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

  if (!$project = parse_ini_file(__DIR__.'/'.$row['directory'].'/project.ini', TRUE)) {
    throw new exception("Unable to open 'project.ini'");
  }

  $name = $row['name'];
  $presentation = $row['presentation'];

  $parsedown = new Parsedown();
  $text = $parsedown->text(file_get_contents(__DIR__.'/'.$row['directory'].'/text.md'));

  $skills = explode(',', $project['skills']['list']);

  echo ("
    <!doctype html>
    <html lang='fr' class='h-100'>
      <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <meta name='description' content=''>
        <meta name='author' content='Clément Darne'>
        <title>$name · Clément Darne</title>
    
        <link rel='canonical' href=''>
    
        <link href='../../assets/css/bootstrap.min.css' rel='stylesheet'>
        <link href='../../assets/css/main-styles.css' rel='stylesheet'>
        <link href='../projects.css' rel='stylesheet'>
      </head>
    
    
      <body class='d-flex h-100'>
        
    
    <div class='container d-flex w-100 h-100 p-3 mx-auto flex-column'>
    
      <!-- Navigation bar -->
      <header class='mb-auto text-center'>
        <div class='navigation-bar'>
          <a href='../../' title='Accueil'>
            <h3 class='float-md-start mb-0'>Clément Darne</h3>
          </a>
          <nav class='nav nav-masthead justify-content-center float-md-end'>
            <a class='nav-link' aria-current='page' href='../../'>Accueil</a>
            <a class='nav-link active' href='../'>Projets</a>
            <a class='nav-link' href='../../a-propos-de-moi/'>À propos de moi</a>
          </nav>
        </div>
      </header>
    
    
      <main class='text-center'>
    
        <!-- Introduction -->
        <section class='py-5 text-center container'>
          <div class='row pt-lg-5'>
            <div class='col-lg-6 col-md-8 mx-auto'>
              <h1 class='fw-light mb-3'>$name</h1>
              <p class='lead'>
                $presentation
              </p>
            </div>
          </div>
        </section>
    
        <!-- Cover -->
        <div class='d-flex justify-content-center mb-5'>
          <img class='cover mb-3' src='".$project['cover']['src']."' 
            width='".$project['cover']['width']."' height='".$project['cover']['height']."' 
            alt='".$project['cover']['alt']."'/>
        </div>
    
        <!-- Presentation -->
        <section id='presentation' class='pt-3 mb-5'>
          <h2 class='fw-light mb-3'>Présentation</h2>
          $text
        </section>
    
        <!-- Skills -->
        <section id='skills' class='pt-3 mb-5'>
          <h2 class='fw-light mb-3'>Compétences travaillées</h2>
          <ul>"
  );

  foreach ($skills as $skill) {
    echo "<li>$skill</li>";
  }
  
  echo ("
          </ul>
        </section>
  ");
    
  if (count($project['links']) !== 0) {
    echo ("
        <!-- Links -->
        <section id='links' class='mb-5 pt-3'>
          <h2 class='fw-light mb-4'>Liens du projet</h2>
    ");

    if (isset($project['links']['download'])) {
      echo ("
          <a href='".$project['links']['download']."' title='Télécharger le projet'>
            <img src='../../assets/icons/ic-download-light.svg' width='80' height='80' alt='Téléchargement'>
          </a>
      ");
    }

    // TODO: Github, Gitlab, other
    
    echo ("
        </section>
    
      </main>
    
    
      <footer>
      </footer>
    
    
    </div> 
        
    
      </body>
    
    </html>
    ");
  }
}