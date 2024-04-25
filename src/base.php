<?php

// Prints error status code and message
function error($errorCode) {
  readfile(__DIR__."/errors/$errorCode.html");
}

// Load the environment variables from the .env or .env.local file
function loadEnv() {
  // Avoid loading the environment variables multiple times
  global $isEnvLoaded;
  if ($isEnvLoaded) {
    return;
  }

  // Load the environment variables from file
  $env = [];
  if (file_exists(__DIR__.'/../.env.local')) {
    $env = parse_ini_file(__DIR__.'/../.env.local');
  }
  else if (file_exists(__DIR__.'/../.env')) {
    $env = parse_ini_file(__DIR__.'/../.env');
  }
  // If no file was found, throw an error
  else {
    error(500);
    exit();
  }

  // Check if parsing succeeded
  if ($env === false) {
    error(500);
    exit();
  }

  # Add fields to global $_ENV
  foreach ($env as $key => $value) {
    $_ENV[$key] = $value;
  }

  # Mark the environment as loaded
  $isEnvLoaded = true;
}
