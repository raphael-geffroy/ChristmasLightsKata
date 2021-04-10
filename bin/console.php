#!/usr/bin/env php
<?php
require __DIR__.'/../vendor/autoload.php';

use Infrastructure\Application;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use UserInterface\Command\CreateLightGridCommand;

$containerBuilder = new ContainerBuilder();
$loader = new YamlFileLoader($containerBuilder, new FileLocator(__DIR__."/../config/"));
$loader->load('services.yml');
$containerBuilder->compile();
exit($containerBuilder->get(Application::class)->run());