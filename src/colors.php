<?php

// HSL-RGB conversions algorithms from:
// https://stackoverflow.com/questions/2353211/hsl-to-rgb-color-conversion

function hslToRgb($h, $s, $l) {
  $r = 0;
  $g = 0;
  $b = 0;

  if ($s === 0) {
    // achromatic
    $r = $l;
    $g = $l;
    $b = $l;
  }
  else {
    $q = ($l < 0.5 ? $l * (1 + $s) : $l + $s - $l * $s);
    $p = 2 * $l - $q; 
    $r = hueToRgb($p, $q, $h + 1/3);
    $g = hueToRgb($p, $q, $h);
    $b = hueToRgb($p, $q, $h - 1/3);
  }

  return [
    'r' => round($r * 255),
    'g' => round($g * 255),
    'b' => round($b * 255)
  ];
}

function hueToRgb($p, $q, $t) {
  if ($t < 0) $t += 1;
  if ($t > 1) $t -= 1;
  if ($t < 1/6) return $p + ($q - $p) * 6 * $t;
  if ($t < 1/2) return $q;
  if ($t < 2/3) return $p + ($q - $p) * (2/3 - $t) * 6;
  return $p;
}

function rgbToHsl($r, $g, $b) {
  $r /= 255;
  $g /= 255;
  $b /= 255;

  $vmax = max($r, $g, $b);
  $vmin = min($r, $g, $b);
  // default to achromatic
  $h = 0;
  $s = 0;
  $l = ($vmax + $vmin) / 2;

  if ($vmax !== $vmin) {  // chroma != 0
    $d = $vmax - $vmin;
    $s = ($l > 0.5 ? $d / (2 - $vmax - $vmin) : $d / ($vmax + $vmin));
    if ($vmax === $r) {
      $h = ($g - $b) / $d + ($g < $b ? 6 : 0);
    } 
    elseif ($vmax === $g) {
      $h = ($b - $r) / $d + 2;
    }
    else {
      $h = ($r - $g) / $d + 4;
    }
    $h /= 6;
  }

  return [
    'h' => $h,
    's' => $s,
    'l' => $l
  ];
}

function hexToRgb($hex) {
  $hexInt = hexdec($hex);
  return [
    'r' => ($hexInt >> 16) & 0xFF,
    'g' => ($hexInt >> 8) & 0xFF,
    'b' => $hexInt & 0xFF
  ];
}

function rgbToHex($r, $g, $b) {
  return sprintf("%02x%02x%02x", $r, $g, $b);
}

