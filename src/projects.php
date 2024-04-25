<?php

require_once __DIR__.'/database.php';


function displayProjects() {
    // Get the projects from the database
    // project: id, title, directory, visible, released, github_path, description, start_year, end_year
    $db = connectToDB();
    $projects = $db->query("SELECT * FROM Projects ORDER BY start_year, end_year DESC")->fetchAll();

    // Display the projects
    foreach ($projects as $project) {
        // Get properties
        $name = $project['title'];
        $description = $project['description'];
        $released = $project['released'];
        $directory = $project['directory'];
        $version = $project['version'];
        $date = $project['start_year'] . ' - ' . (($project['end_year'] != null) ? $project['end_year'] : "today");

        // Display HTML
        echo <<<HTML
          <div class='card-container'>
            <a id='$directory' class='card ".(($released) ? "released" : "unreleased")."' href='./$directory/' title='$name'>
              <img class='rounded-top thumbnail' src='./$directory/thumbnail.jpg' height='450' width='600' alt='Thumbnail'/>

              <div class='card-body'>
                <h2>$name</h2>
                <p class='card-text'>
                  $description
                </p>
                <div class='card-footer'>
                  <small class='version'>$version</small>
                  <small class='date'>$date</small>
                </div>
              </div>
            </a>
          </div>
        HTML;
    }
}
