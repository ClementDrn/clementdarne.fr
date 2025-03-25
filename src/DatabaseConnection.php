<?php

require_once __DIR__.'/base.php';


class DatabaseConnection extends PDO {
  public function __construct($directoryPath, $fileName = "") {
    // Load env file
    loadEnv();

    // Connect to the database using the environment variables
    $dns = $_ENV['DB_DRIVER'].':host='.$_ENV['DB_HOST'].
    ((isset($_ENV['DB_PORT'])) ? ';port='.$_ENV['DB_PORT'] : '').
    ';dbname='.$_ENV['DB_SCHEMA'].
    ';charset=utf8';

    parent::__construct(
      $dns, 
      $_ENV['DB_USERNAME'], 
      $_ENV['DB_PASSWORD'],
      array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
  }
}
