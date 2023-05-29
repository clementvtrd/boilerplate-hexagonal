<?php

$finder = PhpCsFixer\Finder::create()
    ->in("/opt/app/src")
    ->in("/opt/app/config")
    ->in("/opt/app/tests")
    ->in("/opt/app/migrations")
    ->in("/opt/app/public")
;

$config = new PhpCsFixer\Config();
return $config->setRules([
        '@PHP82Migration' => true,
        '@Symfony' => true,
    ])
    ->setFinder($finder)
;