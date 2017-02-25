<?php
ini_set('error_reporting', E_ALL);          // E_STRICT included in E_ALL from PHP 5.4
ini_set('display_errors', true);            // display errors in browser
ini_set('display_startup_errors', true);    // display startup errors in browser
ini_set('log_errors', false);

// convert all errors to exceptions
set_error_handler(function($severity, $errstr, $errfile, $errline, $errcontext) {
    if (error_reporting() & $severity) { /// This error is not suppressed by current error reporting settings  ;for @statement it is 0
        throw new \ErrorException($errstr, 0, $severity, $errfile, $errline);
    }
    return true; /// Do not execute the PHP error handler
});

// initialize framework and start application
require __DIR__ . '/../vendor/resortx/si/src/backend/App/Initializer.php';
try {
    \Si\App\Initializer::initFrameworkDev(__DIR__ . "/..", "config");     /// application top directory, config subdirectory
} catch (\Throwable | \Exception $e) {
    throw $e;   // rethrow to Whoops
}
