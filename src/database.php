<?php

require_once(__DIR__."/DatabaseConnection.php");


function connectToDB() {
  try {
    return new DatabaseConnection(__DIR__."/..");
  } 
  catch (Exception $e) {
    exit('Error: '.$e->getMessage());
  }
}
