<?php
// URI's that end with ".php", ".html" or no extension, will be handled by index.php
// Everything else will be staticly served (no PHP involved)
if (!preg_match('/\\.(html|php)$|^[^.]*$/', $_SERVER['REQUEST_URI'])) {
    return false;
}

// We want a single entry point to our application to allow
//  - centralized configuration
//  - pretty url's
require $_SERVER['DOCUMENT_ROOT'] . '/index.php';
