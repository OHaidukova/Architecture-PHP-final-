<?php

use Symfony\Component\DependencyInjection\Reference;
//use Commands\TestCommand;

$container->setParameter('environment', 'dev');

$container->setParameter('view.directory', __DIR__ . '/../../src/View/');

$container->register('NameCompare', 'Service\Compare\NameCompare');

$container->register('PriceCompare', 'Service\Compare\PriceCompare');

$container->register('SortStrategy', 'Service\Compare\SortStrategy');

$container->register('Product', 'Service\Product\Product');

$container->register('TransactionAdd', 'Service\Order\TransactionAdd');

$container->register(Commands\TestCommand::class)->addTag('console.command', ['command' => 'test']);