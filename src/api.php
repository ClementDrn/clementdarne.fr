<?php

function getWorldPopulationString(): string {
  require_once __DIR__.'/base.php';
  loadEnv();

  $curl = curl_init();

  curl_setopt_array($curl, [
  CURLOPT_URL => "https://get-population.p.rapidapi.com/population",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 5,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => [
      "x-rapidapi-host: get-population.p.rapidapi.com",
      "x-rapidapi-key: ".$_ENV['RAPIDAPI_KEY']
  ],
  ]);

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  $population = '';
  if ($err == '') {
    $array = json_decode($response, true);
    if ($array['readable_format'] != null) {
      $population = $array['readable_format'];
    }
  }

  // May be an empty string if error or timeout occured
  return $population;
}
