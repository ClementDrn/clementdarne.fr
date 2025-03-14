<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/database.php';


function displayProjects() {
    // Get the projects from the database
    // project: id, visible, title, released, link, thumbnail, summary, start_year, end_year
    $db = connectToDB();
    $projects = $db->query("SELECT * FROM Projects ORDER BY start_year, end_year DESC")->fetchAll();

    // Display the projects
    foreach ($projects as $project) {
      // Skip if should not be visible
      $visible = $project['visible'];
      if ($visible == null || $visible == false) {
        continue;
      }

      // Get important properties
      $name = $project['title'];

      // Skip if important properties are not accessible
      if ($name == null || $name == '') {
        continue;
      }

      // Get other properties
      // $released     = $project['released'] ? $project['released'] : false;
      $link         = $project['link'] != null ? $project['link'] : '';
      $thumbnail    = $project['thumbnail'] != null ? $project['thumbnail'] : '';
      $description  = $project['summary'] != null ? Parsedown::instance()->line($project['summary']) : '';
      $date         = $project['start_year'] != null
                      ? ($project['start_year'] . ' - ' . (($project['end_year'] != null) ? $project['end_year'] : "today"))
                      : '';

      // If an external link is provided, add it to HTML page
      $startATag = '';
      $endATag = '';
      $linkIconTag = '';
      if ($link != '') {
        $startATag = "<a href='$link'>";
        $endATag = '</a>';
        $linkIconTag = "<i class='bi bi-box-arrow-up-right'></i>";
      }

      // Display HTML
      echo <<<HTML
        <div class='card'>
          $startATag
          <!-- If no thumbnail, show card title instead -->
          <img class='card-image' src='./assets/img/$thumbnail' height='500' width='500' alt='$name'/>
          <div class='overlay card-body'>
            <h3>$name</h3>
            <p class='card-text'>
              $description
            </p>
            <div class='card-footer'>
              <small class='date'>$date</small>
              $linkIconTag
            </div>
          </div>
          $endATag
        </div>
      HTML;
    }
}
