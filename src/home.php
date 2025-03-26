<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/api.php';

function displayBody($langStr = "fr") {
  // Load language data from $langStr.json
  $langFile = __DIR__ . "/../data/$langStr.json";
  if (!file_exists($langFile)) {
    die('Language file not found.');
  }
  $lang = json_decode(file_get_contents($langFile), true);
  if (!is_array($lang)) {
    die('Invalid JSON format.');
  }
  
  // Extract language sections for easier use
  $home     = $lang['sections']['home'];
  $projects = $lang['sections']['projects'];
  $about    = $lang['sections']['about'];
  $contact  = $lang['sections']['contact'];
  $shell    = isset($about['shell']) ? $about['shell'] : [];
  $labels   = isset($shell['labels']) ? $shell['labels'] : [];
  
  // Get world population value
  $population = getWorldPopulationString();
  if ($population == '') {
    $population = $lang['population'];  // default value from JSON
  }
  
  // Calculate age from birthdate (2002-03-24)
  $birthdate = new DateTime("2002-03-24");
  $today = new DateTime();
  $diff = $today->diff($birthdate);
  $ageStr = "$diff->y " . $lang['age']['years']
          .", $diff->m " . ($diff->m > 1 ? $lang['age']['months'] : $lang['age']['month'])
          ." " . $lang['age']['and']
          ." $diff->d " . ($diff->d > 1 ? $lang['age']['days'] : $lang['age']['day']);
  
  // Load ASCII portrait from file, if available.
  $asciiPath = __DIR__ . "/../public/assets/img/clementdarne_2025_ascii.txt";
  $asciiPortrait = file_exists($asciiPath) ? file_get_contents($asciiPath) : '';

  // Prepare strings
  $quoteStr = Parsedown::instance()->line($home['txt0']." $population ".$home['txt1']);
  $helloStr = Parsedown::instance()->line($home['title']);

  // Echo HTML body
  echo <<<HTML
  <body>
    <!-- Navigation bar -->
    <header class="header-fixed">
      <div class="navigation-bar">
        <h3 class="nav-title">
          <a id="nav-home" class="active" href="#" aria-current="page">Clément Darne</a>
        </h3>
        <div class="row justify-center">
          <nav>
            <a id="nav-projects" class="nav-link" href="#projects" title="{$projects['title']}">{$projects['title']}</a>
            <a id="nav-about" class="nav-link" href="#about" title="{$about['title']}">{$about['title']}</a>
            <a id="nav-contact" class="nav-link" href="#contact" title="{$contact['title']}">{$contact['title']}</a>
          </nav>
          <div class="language-selector dropdown">
            <button class="dropbtn" aria-label="{$lang['language']}"><i class="bi bi-translate"></i></button>
            <div class="dropdown-content">
              <a class="language-link" href="/fr" title="Français">Français</a>
              <a class="language-link" href="/en" title="English">English</a>
            </div>
          </div>
        </div>
      </div>
    </header>

    <main>
      <!-- Start-page section -->
      <section id="start-page">
        <div class="row">
          <img src="/assets/img/clementdarne_2025.jpg" alt="Clément Darne" width="300" height="450"/>
          <div class="column justify-center">
            <div id="title">
              <h1 class="text-left">{$helloStr}</h1>
              <p class="lead text-right">{$home['subtitle']}</p>
            </div>
            <p class="quote">
              {$quoteStr}
            </p>
          </div>
        </div>
      </section>

      <div class="container home-container">
        <section id="projects">
          <h2>{$projects['title']}</h2>
          <div class="cards">
HTML;
  
  // Include projects section from projects.php
  require_once __DIR__.'/projects.php';
  // Pass the current language parameter to displayProjects()
  displayProjects($langStr);
  
  echo <<<HTML
          </div>
        </section>

        <section id="about">
          <h2>{$about['title']}</h2>
          <div class="shell-terminal">
            <div class="shell-header">
              <h3>root@clementdarne:~\$ cat whoami.txt</h3>
              <div class="shell-buttons">
                <div class="shell-button yellow"></div>
                <div class="shell-button green"></div>
                <div class="shell-button red" id="redButton"></div>
                <script>
                  document.getElementById('redButton').addEventListener('click', function(){
                    alert("{$about['easterEgg']}");
                  });
                </script>
              </div>
            </div>
            <div class="shell-content">
              <div class="shell-text">
                <p><strong>{$labels['user']}</strong> {$shell['user']}</p>
                <p><strong>{$labels['age']}</strong> $ageStr</p>
                <p><strong>{$labels['height']}</strong> {$shell['height']}</p>
                <p><strong>{$labels['diploma']}</strong> {$shell['diploma']}</p>
                <p><strong>{$labels['languages']}</strong> {$shell['languages']}</p>
                <p><strong>{$labels['hobbies']}</strong> {$shell['hobbies']}</p>
                <p><strong>{$labels['skills']}</strong> {$shell['skills']}</p>
                <p><strong>{$labels['objective']}</strong> {$shell['objective']}</p>
                <p>
                  <strong>{$labels['stats']}</strong>
                  <ul>
                    <li>- <strong>{$labels['force']}</strong> {$shell['stats']['force']}</li>
                    <li>- <strong>{$labels['constitution']}</strong> {$shell['stats']['constitution']}</li>
                    <li>- <strong>{$labels['dexterity']}</strong> {$shell['stats']['dexterity']}</li>
                    <li>- <strong>{$labels['intelligence']}</strong> {$shell['stats']['intelligence']}</li>
                    <li>- <strong>{$labels['wisdom']}</strong> {$shell['stats']['wisdom']}</li>
                    <li>- <strong>{$labels['charisma']}</strong> {$shell['stats']['charisma']}</li>
                  </ul>
                </p>
                <p><strong>{$labels['title']}</strong> {$shell['title']}</p>
              </div>
HTML;
  if (!empty($asciiPortrait)) {
    echo "<pre class='ascii-portrait'>" . htmlspecialchars($asciiPortrait) . "</pre>";
  }
  echo <<<HTML
            </div>
          </div>
          <div class="timeline">
HTML;
  
  // Include journey section from journey.php
  require_once __DIR__.'/journey.php';
  displayJourney($langStr);
  
  echo <<<HTML
          </div>
        </section>
      </div>
    </main>

    <footer>
      <div id="contact" class="row contact-list">
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
      </div>
      <div class="license-list">
        <p class="license">
          {$lang['licenses']['icons']['intro']}
          <a href="https://www.flaticon.com/free-icons" title="icons">
            {$lang['licenses']['icons']['author']}
          </a>.
        </p>
        <p class="license">
          {$lang['licenses']['cc']['introl']}
          <a rel="license" href="http://creativecommons.org/licenses/by/4.0/">
            {$lang['licenses']['cc']['license']}
          </a>.
        </p>
      </div>
    </footer>
  </body>
HTML;
}

?>