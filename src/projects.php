<?php

require_once __DIR__.'/../vendor/autoload.php';

function displayProjects($lang = "fr") {
  // Load projects from JSON file
  $jsonFile = __DIR__ . '/../data/projects.json';
  if (!file_exists($jsonFile)) {
    die('Projects JSON file not found.');
  }

  $jsonData = file_get_contents($jsonFile);
  $projects = json_decode($jsonData, true);
  if (!is_array($projects)) {
    die('Invalid JSON format.');
  }
  
  // Load general language data
  $langFile = __DIR__ . '/../data/' . $lang . '.json'; 
  if (!file_exists($langFile)) {
    die('Language file not found.');
  }

  // Load js object
  $langData = json_decode(file_get_contents($langFile), true);
  if (!is_array($langData)) {
    die('Invalid JSON format.');
  }

  // Sort projects: first by start_year (descending), then by end_year (descending)
  usort($projects, function($a, $b) {
    if ($a['start_year'] === $b['start_year']) {
      $endA = isset($a['end_year']) ? $a['end_year'] : PHP_INT_MIN;
      $endB = isset($b['end_year']) ? $b['end_year'] : PHP_INT_MIN;
      return $endB <=> $endA;
    }
    return $b['start_year'] <=> $a['start_year'];
  });

  // Render projects with the same HTML output as before
  foreach ($projects as $project) {
    // Skip if not visible
    if (!isset($project['visible']) || $project['visible'] !== true) {
      continue;
    }
    
    // Get important properties using the language parameter
    $name = isset($project['title'][$lang]) ? $project['title'][$lang] : '';
    if ($name === '') {
      continue;
    }
    
    // Other properties
    $link      = $project['link'] ?? '';
    $thumbnail = $project['thumbnail'] ?? '';
    $description = (isset($project['summary'][$lang]) && $project['summary'][$lang] !== null)
                     ? Parsedown::instance()->line($project['summary'][$lang])
                     : '';
    $date = $project['start_year'] != null
            ? $project['start_year'] . (
              $project['start_year'] == $project['end_year']
              ? ''
              : ' - ' . (
                ($project['end_year'] != null) ? $project['end_year'] : $langData["today"]
              )
            )
            : '';
            
    // If an external link is provided, add it to HTML page
    $startATag = '';
    $endATag = '';
    $linkIconTag = '';
    if ($link != '') {
      $startATag = "<a href='$link' target='_blank'>";
      $endATag = '</a>';
      $linkIconTag = "<i class='bi bi-box-arrow-up-right'></i>";
    }
    
    // Display HTML
    echo <<<HTML
      <div class='card'>
        $startATag
        <!-- If thumbnail fails, show fallback alt text -->
        <span class="fallback-alt hidden">$name</span>
        <img class='card-image' src='/assets/img/$thumbnail' height='500' width='500' alt='$name'
            onerror="this.style.display='none'; this.previousElementSibling.style.display='block';" />
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
