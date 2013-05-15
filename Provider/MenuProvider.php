<?php
/**
 * Created by Rubikin Team.
 * Date: 5/15/13
 * Time: 11:50 AM
 * Question? Come to our website at http://rubikin.com
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nilead\MenuBundle\Provider;


use Doctrine\ORM\EntityManager;
use Knp\Menu\Provider\MenuProviderInterface;
use Nilead\MenuBundle\Builder\MenuBuilder;
use Symfony\Component\EventDispatcher\EventDispatcher;

class MenuProvider implements MenuProviderInterface
{
    /**
     * @var MenuBuilder
     */
    protected $builder = null;

    /**
     * @var EntityManager
     */
    protected $entityManager = null;


    /**
     * @param MenuBuilder $builder
     * @param EntityManager $entityManager
     */
    public function __construct(MenuBuilder $builder, EntityManager $entityManager)
    {
        $this->builder = $builder;
        $this->entityManager = $entityManager;
    }


    public function get($name, array $options = array())
    {
        $result = $this->entityManager->getRepository('NileadMenuBundle:Menu')->findOneByName($name);

        if (empty($result)) {
            throw new \LogicException(sprintf('The menu "%s" doesn\'t exists. Check where you created the menu to be sure it returns an existed menu.', $name));
        }

        $menu = $this->builder->build($result);

        return $menu;
    }

    public function has($name, array $options = array())
    {
        // TODO: Implement has() method.
    }
}