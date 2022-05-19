<?php

require 'vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ .'/templates');
$twig = new \Twig\Environment($loader, [
    'cache' => false //  '/path/to/compilation_cache',
]);
