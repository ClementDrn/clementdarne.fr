<?php
// Redirect to page based on browser language

// Check if the browser language is French
if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    if ($lang === 'fr') {
        header("Location: /fr");
        exit;
    }
}

// Default redirection to English version
header("Location: /en");
exit;
?>
