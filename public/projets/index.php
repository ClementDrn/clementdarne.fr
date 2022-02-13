<!doctype html>
<html lang="fr" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Clément Darne">
    <title>Projets · Clément Darne</title>

    <link rel="canonical" href="">

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/main-styles.css" rel="stylesheet">
    <link href="./projects.css" rel="stylesheet">
  </head>


  <body class="d-flex h-100">
    

<div class="container d-flex w-100 h-100 p-3 mx-auto flex-column">

  <!-- Navigation bar -->
  <header class="mb-auto text-center">
    <div class="navigation-bar">
      <a href="../" title="Accueil">
        <h3 class="float-md-start mb-0">Clément Darne</h3>
      </a>
      <nav class="nav nav-masthead justify-content-center float-md-end">
        <a class="nav-link" aria-current="page" href="../">Accueil</a>
        <a class="nav-link active" href="./">Projets</a>
        <a class="nav-link" href="../a-propos-de-moi/">À propos de moi</a>
        <a class="nav-link" href="../contact/">Contact</a>
      </nav>
    </div>
  </header>

  <main class="">

    <!-- Introduction -->
    <section class="py-5 text-center container">
      <div class="row pt-5 pb-4">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="fw-light mb-3">Mes projets informatiques</h1>
          <p class="lead">
            Au cours de mon apprentissage en informatique, j'ai initié plusieurs projets. 
            Certains sont toujours en cours alors que d'autres ont pu aboutir. 
          </p>
        </div>
      </div>
    </section>

    <!-- Album -->
    <div class="album mt-3 mb-5">
      <div class="container">
  
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 justify-content-center">
  
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
        <div id='$directory' class='col ".(($released) ? "released" : "unreleased")."'>
          <a class='project-link' href='./$directory/' title='$name'>
            <div class='card shadow-sm'>
              <img class='rounded-top thumbnail' src='./$directory/thumbnail.jpg' height='450' width='600' alt='Thumbnail'/>

              <div class='card-body'>
                <h2>$name</h2>
                <p class='card-text'>
                  $presentation
                </p>
                <div class='carte-footer d-flex justify-content-between align-items-center'>
                  <small class='version'>$version</small>
                  <small class='date'>$date</small>
                </div>
              </div>
            </div>
          </a>
        </div>

      ");
    }
  }
}

?>

        </div> <!-- row (cells) -->

      </div> <!-- container -->
    </div> <!-- album -->
  </main>

  <footer class="mt-auto text-black-50">
  </footer>
</div>


    
  </body>
</html>
