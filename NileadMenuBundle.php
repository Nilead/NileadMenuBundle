<?php

namespace Nilead\MenuBundle;

use Nilead\MenuBundle\DependencyInjection\Compiler\DoctrineMenuPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class NileadMenuBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new DoctrineMenuPass());
    }
}
