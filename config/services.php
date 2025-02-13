<?php

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Tito10047\Uuid\UUidEntityGenerator;
use function Symfony\Component\DependencyInjection\Loader\Configurator\service;

/**
 * @link https://symfony.com/doc/current/bundles/best_practices.html#services
 */
return static function (ContainerConfigurator $container): void {
    $services = $container->services();

    if ('dev' === $container->env()) {
        $services->set(UUidEntityGenerator::class)
            ->decorate('maker.generator')
            ->args([service('.inner')]);
    }
};
