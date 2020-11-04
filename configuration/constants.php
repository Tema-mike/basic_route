<?php

/* ------------------------------------------ */
/* ---- Global constants for file's path ---- */
/* ------------------------------------------ */

// Directory_separator = ' / '
define('DS', DIRECTORY_SEPARATOR);

$sitePath = realpath( dirname(__FILE__, 2)) . DS;
define('SITE_PATH', $sitePath);

