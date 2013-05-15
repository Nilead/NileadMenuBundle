<?php
/**
 * Created by Rubikin Team.
 * Date: 5/14/13
 * Time: 6:05 PM
 * Question? Come to our website at http://rubikin.com
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nilead\MenuBundle\DependencyInjection\Compiler;


use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class DoctrineMenuPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('doctrine.orm.entity_manager')) {
            return;
        }

        //  Get Entity Manager
        $entityManager = $container->get(
            'doctrine.orm.entity_manager'
        );

        $repository = $entityManager->getRepository('NileadWebBundle:Menu');

        //  Register all menus in db to
        $topLevelMenus = $repository->findByLvl(0);

        var_dump($topLevelMenus);
        die;
    }
}