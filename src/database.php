<?php

class DatabaseConnection extends PDO {
  public function __construct($file = __DIR__.'/settings.ini') {
    if (!$settings = parse_ini_file($file, TRUE)) {
      throw new exception("Unable to open $file");
    }

    $dns = $settings['database']['driver'].':host='.$settings['database']['host'].
    ((isset($settings['database']['port'])) ? ';port='.$settings['database']['port'] : '').
    ';dbname='.$settings['database']['schema'].
    ';charset=utf8';

    parent::__construct(
      $dns, 
      $settings['database']['username'], 
      $settings['database']['password'],
      array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
  }
}

function connectToDB() {
  try {
    return new DatabaseConnection();
  } 
  catch (Exception $e) {
    exit('Error: '.$e->getMessage());
  }
}

