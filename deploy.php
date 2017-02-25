<?php
namespace Deployer;
require 'recipe/common.php';

function exec_cmd($command, $display_output = false, $log_file = null) {
    $output = [];
    $status = 0;
    if ($log_file !== null) {
        $command .= " > {$log_file} 2>&1";
    }
    exec($command, $output, $status);
    if ($display_output) {
        echo "\n";
        foreach ($output as $line) {
            echo $line . "\n";
        }
    }
    if ($log_file !== null) {
        write(":: results writeln to " . $log_file . "\n");
    }
};

$fw_dir = __DIR__;
chdir($fw_dir);

set('ssh_type', 'native');
set('ssh_multiplexing', true);

desc("Composer install dependencies");
task('composer:install', function() use ($fw_dir) {
    cd($fw_dir);
    exec_cmd("composer install", true);
});

desc("Composer update dependencies");
task('composer:update', function() use ($fw_dir) {
    cd($fw_dir);
    exec_cmd("composer update", true);
});

desc("Composer autoload update");
task('composer:autoload', function() use ($fw_dir) {
    cd($fw_dir);
    exec_cmd("composer dump-autoload", true);
});

desc("Npm install dependencies");
task('npm:install', function() use ($fw_dir) {
    cd($fw_dir);
    exec_cmd("npm install", true);
});

desc("Compile Zen dependency injection container");
task('zen', function() use ($fw_dir) {
    cd($fw_dir);
    exec_cmd("bin/di_container/compile.php", true);
});

desc("Install assets to public directory");
task('install_assets', function() use ($fw_dir) {
    cd($fw_dir);
    exec_cmd(" \
        mkdir -p public/vendor; \
        cp -a node_modules/**/*-min.js public/vendor; \
        cp -a node_modules/**/*.min.js public/vendor; \
        cp -a node_modules/**/**/*-min.js public/vendor; \
        cp -a node_modules/**/**/*.min.js public/vendor; \
    ", true);
});

task('build', [
    'composer:autoload',
    'zen',
]);

task('setup', [
    'composer:install',
    'npm:install',
    'zen',
    'install_assets',
]);
