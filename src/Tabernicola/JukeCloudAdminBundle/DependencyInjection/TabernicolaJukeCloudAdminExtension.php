<?php

namespace Tabernicola\JukeCloudAdminBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class TabernicolaJukeCloudAdminExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
    
    /*public function prepend(ContainerBuilder $container)
    {
        // process the configuration of AcmeHelloExtension
        $configs = $container->getExtensionConfig($this->getAlias());
        // use the Configuration class to generate a config array with the settings "acme_hello"
        $config = $this->processConfiguration(new Configuration(), $configs);

        $admin=array(
            'use_doctrine_orm'=>true,
            'base_admin_template'=> 'AdmingeneratorGeneratorBundle::base_admin_assetic_less.html.twig',
            //'dashboard_welcome_path'=> 'admin_home'
        );
        // prepend the acme_something settings with the entity_manager_name
        $container->prependExtensionConfig("admingenerator_generator",  $admin);
    }*/
}
