<?php
/**
 * Created by Rubikin Team.
 * Date: 5/20/13
 * Time: 10:23 AM
 * Question? Come to our website at http://rubikin.com
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nilead\MenuBundle;


use Doctrine\ORM\EntityManager;
use Nilead\MenuBundle\Builder\MenuBuilder;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class MenuManager implements ManagerInterface
{
    protected $builder;
    protected $entityManager;
    protected $booted;
    protected $menus = array();

    public function __construct(MenuBuilder $builder, EntityManager $entityManager)
    {
        $this->booted = false;
        $this->builder = $builder;
        $this->entityManager = $entityManager;
    }

    public function boot()
    {
        if (true === $this->booted) {
            return;
        }

        //  TODO:   Load cache
        $result = $this->entityManager->getRepository('NileadMenuBundle:Menu')->findByLvl(0);

        if (!empty($result)) {
            foreach ($result as $object) {
                $this->menus[$object->getName()] = $this->builder->build($object);
            }
        }

        $this->booted = true;
    }

    public function get($name, array $options = array())
    {
        if (!$this->has($name)) {
            throw new \LogicException(sprintf('The menu "%s" doesn\'t exists. Check where you created the menu to be sure it returns an existed menu.', $name));
        }

        //  TODO: Kiem tra lai o day
        $menu = $this->menus[$name];

        return $menu;
    }

    public function has($name)
    {
        return array_key_exists($name, $this->menus);
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        $this->boot();
    }
}