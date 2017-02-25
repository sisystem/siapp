<?php
require __DIR__ . '/../vendor/resortx/si/src/backend/App/Initializer.php';
\Si\App\Initializer::initFrameworkDev(__DIR__ . "/..", "config");     /// application top directory, config subdirectory
    // autoloading + add namespace for application, create app, run Runner
