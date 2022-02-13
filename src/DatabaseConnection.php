<?php

use Dotenv\Dotenv;

require_once(__DIR__."/../vendor/autoload.php");


class DatabaseConnection extends PDO {
  public function __construct($directoryPath, $fileName = "") {
    $dotenv = null;

    // Try with the given file path.
    if ($fileName != "") {
      $dotenv = Dotenv::createImmutable($directoryPath, $fileName);
      $dotenv->load();
    }
    // If no file was given, look for default .env and .env.local files.
    else {
      try {
        $dotenv = Dotenv::createImmutable($directoryPath, ".env.local");
        $dotenv->load();
      }
      catch (Exception $ex) {
        // If .env.local does not exist, we try with .env.
        try {
          $dotenv = Dotenv::createImmutable($directoryPath, ".env");
          $dotenv->load();
        }
        catch (Exception $ex) {
          // Error: there is no .env file.
          throw new Exception("Neither .env.local nor .env files exist!");
        }
      }
    }

    $dns = $_ENV['DATABASE_DRIVER'].':host='.$_ENV['DATABASE_HOST'].
    ((isset($_ENV['DATABASE_PORT'])) ? ';port='.$_ENV['DATABASE_PORT'] : '').
    ';dbname='.$_ENV['DATABASE_SCHEMA'].
    ';charset=utf8';

    parent::__construct(
      $dns, 
      $_ENV['DATABASE_USERNAME'], 
      $_ENV['DATABASE_PASSWORD'],
      array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
  }
}
