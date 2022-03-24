<!doctype html>
<html lang="fr" class="h-100">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="Clément Darne">
      <title>Projets · Clément Darne</title>

      <link rel="canonical" href="https://clementdarne.fr/projets">

      <link href="/assets/css/core.css" rel="stylesheet">
      <link href="/assets/css/projects.css" rel="stylesheet">
  </head>


  <body>
    

    <div class="container">

      <!-- Navigation bar -->
      <header>
        <div class="navigation-bar">
          <h3 class="nav-title">
            <a href="/" title="Accueil">Clément Darne</a>
          </h3>
          <nav>
            <a class="nav-link" href="/">Accueil</a>
            <a class="nav-link active" aria-current="page" href="/projets/">Projets</a>
            <a class="nav-link" href="/a-propos-de-moi/">À propos de moi</a>
            <a class="nav-link" href="/contact/">Contact</a>
          </nav>
        </div>
      </header>

      <main>

        <!-- Introduction -->
        <section class="introduction">
          <h1>Mes projets informatiques</h1>
          <p class="lead">
            Au cours de mon apprentissage en informatique, j'ai initié plusieurs projets. 
            Certains sont toujours en cours alors que d'autres ont pu aboutir. 
          </p>
        </section>

        <!-- Album -->
        <div class="album">
      
  
<?php

require "../../src/database.php";

$db = connectToDB();
$statement = $db->prepare("select project_id, name, directory, visible, version, released, start_year, end_year, presentation
  from f5kd_project order by start_year desc, -end_year asc, project_id desc");

if ($statement->execute()) {
  while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    // If the project should be visible
    if ($row['visible']) {
      $name = $row['name'];
      $directory = $row['directory'];
      $presentation = $row['presentation'];
      $version = $row['version'];
      $released = $row['released'];

      $date = $row['start_year'];
      if (!is_null($row['end_year'])) {
        if ($row['start_year'] !== $row['end_year']) {
          $date .= ' - '.$row['end_year'];
        }
      }
      else {
        $date .= ' -';
      }

      // Prints the project card
      echo ("
        <a id='$directory' class='card ".(($released) ? "released" : "unreleased")."' href='./$directory/' title='$name'>
          <img class='rounded-top thumbnail' src='./$directory/thumbnail.jpg' height='450' width='600' alt='Thumbnail'/>

          <div class='card-body'>
            <h2>$name</h2>
            <p class='card-text'>
              $presentation
            </p>
            <div class='card-footer'>
              <small class='version'>$version</small>
              <small class='date'>$date</small>
            </div>
          </div>
        </a>

      ");
    }
  }
}

?>


        </div> <!-- album -->
      </main>

      <footer class="">
      </footer>
    </div>

    
  </body>

</html>
