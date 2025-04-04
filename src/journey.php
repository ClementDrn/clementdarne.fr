<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/colors.php';

// Register every color used
function registerColor($color) {
  global $g_colors;
  if (!is_array($g_colors)) {
    $g_colors = [];
  }

  $hexStr = substr($color, 1);
  $colorClass = "color-$hexStr";
  $rgb = hexToRgb($hexStr);
  $hsl = rgbToHsl($rgb['r'], $rgb['g'], $rgb['b']);
  $hsl['l'] = min(1, $hsl['l'] + 0.1);
  $rgb = hslToRgb($hsl['h'], $hsl['s'], $hsl['l']);
  $lightenedColor = rgbToHex($rgb['r'], $rgb['g'], $rgb['b']);

  if (!in_array($hexStr, $g_colors)) {
    $g_colors[] = $hexStr;
    echo "<style>";
    echo ".$colorClass.timeline-item::before { border-left: 4px solid $color; }";
    echo ".$colorClass.timeline-item::after { border-left: 4px dashed $color; }";
    echo ".$colorClass.branch-group::before { border-left: 4px solid $color; }";
    echo ".$colorClass.branch-group::after { border-left: 4px dashed $color; }";
    echo ".$colorClass.branching-border { border-left: 4px solid $color; }";
    echo ".$colorClass.milestone { border: 3px solid $color; }";
    echo "h3.$colorClass { color: #$lightenedColor; }";
    echo "</style>";
  }

  return $colorClass;
}

function displayJourney($lang = "fr") {
  // Load journey events from JSON file
  $jsonFile = __DIR__ . '/../data/journey.json';
  if (!file_exists($jsonFile)) {
    die('Journey JSON file not found.');
  }
  $jsonData = file_get_contents($jsonFile);
  $events = json_decode($jsonData, true);
  
  if (!is_array($events)) {
    die('Invalid JSON format.');
  }

  function renderEvent($event, $iChild, $nChild, $isParentLast = false, $depth = 0, $lang = "fr") {
    $isLast = $iChild == $nChild - 1;
    $isFirst = $iChild == 0;
    $rootColorClass = registerColor($event['rootColor']);
    $colorClass = registerColor($event['color']);
    $hasChildren = !empty($event['children']);

    echo "<div class='timeline-item $rootColorClass"
         .($isLast && !$hasChildren ? ($isParentLast ? " very-last" : " last") : "")
         .($isFirst ? ($depth == 0 ? " very-first" : " first") : "")
         ."'>";

    // Get the language-specific title and description
    $title = Parsedown::instance()->line($event['title'][$lang]);
    $description = Parsedown::instance()->line($event['description'][$lang]);

    echo "<div class='body'>";
    echo "<div class='milestone $colorClass'></div>";
    echo "<img class='icon' src='{$event['icon']}' width='128' height='128' alt='icon'/>";
    echo "<div class='content'>";
    echo "<p class='date'>{$event['date']}</p>";
    echo "<h3 class='$rootColorClass'>$title</h3>";
    echo "<p>$description</p>";
    echo "</div></div>";  // .content .body 

    if ($hasChildren) {
      echo "<div class='branching'>";
      echo "<svg class='branch-svg branch-out' viewBox='0 0 200 100' xmlns='http://www.w3.org/2000/svg'>";
      echo "<path d='M 2,100 C 2,50 42,50 42,0' stroke='{$event['color']}' stroke-width='4' fill='none'/></svg>";
      echo "<div class='branching-border $colorClass'></div>";
      echo "</div>";  // .branching
    }

    echo "</div>";  // .timeline-item
    
    if ($hasChildren) {
      echo "<div class='branch-group $rootColorClass".($isParentLast && $isLast ? " last" : "")."'>";
      $n = count($event['children']);
      for ($i = 0; $i < $n; $i++) {
        renderEvent($event['children'][$i], $i, $n, $isLast && $isParentLast, $depth + 1, $lang);
      }
      if (!$isLast || !$isParentLast) {
        echo "<svg class='branch-svg branch-in' viewBox='0 0 200 100' xmlns='http://www.w3.org/2000/svg'>";
        echo "<path d='M 42,100 C 42,50 2,50 2,0' stroke='{$event['color']}' stroke-width='4' fill='none'></path>";
      }
      echo "</div>";  // .branch-group
    }
  }
  
  $n = count($events);
  for ($i = 0; $i < $n; $i++) {
    renderEvent($events[$i], $i, $n, $i == $n - 1, 0, $lang);
  }
}
