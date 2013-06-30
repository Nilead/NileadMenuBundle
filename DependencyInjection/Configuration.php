<?php

namespace Nilead\MenuBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('nilead_menu');

        $rootNode
            ->children()
            ->arrayNode('twig')
            ->addDefaultsIfNotSet()
            ->canBeUnset()
            ->children()
            ->scalarNode('template')
            ->defaultValue('knp_menu.html.twig')
            ->end()
            ->end()
            ->end()
            ->arrayNode('options')
            ->addDefaultsIfNotSet()
            ->children()
            ->scalarNode('depth')
            ->defaultValue(null)
            ->end()
            ->scalarNode('currentAsLink')
            ->defaultValue(true)
            ->end()
            ->scalarNode('currentClass')
            ->defaultValue('active')
            ->end()
            ->scalarNode('ancestorClass')
            ->defaultValue('current_ancestor')
            ->end()
            ->scalarNode('firstClass')
            ->defaultValue('first')
            ->end()
            ->scalarNode('lastClass')
            ->defaultValue('last')
            ->end()
            ->scalarNode('compressed')
            ->defaultValue(true)
            ->end()
            ->scalarNode('allow_safe_labels')
            ->defaultValue(true)
            ->end()
            ->scalarNode('clear_matcher')
            ->defaultValue(true)
            ->end()
            ->end()
            ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
