<?php session_start();

/* ERROR REPORTING */
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Make everything relative to the application root.
chdir(dirname(__DIR__));

require 'autoload.php';

// Run the application
Rest\App::run(require_once 'app/config/app.config.php');