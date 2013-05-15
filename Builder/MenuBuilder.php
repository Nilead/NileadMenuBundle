<?php
/**
 * Created by Rubikin Team.
 * Date: 5/15/13
 * Time: 4:22 PM
 * Question? Come to our website at http://rubikin.com
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nilead\MenuBundle\Builder;


use Knp\Menu\FactoryInterface;
use Nilead\CoreBundle\Event\ConfigureMenuEvent;
use Symfony\Component\EventDispatcher\EventDispatcher;

class MenuBuilder
{
    protected $factory;
    protected $dispatcher;

    public function __construct(FactoryInterface $factory, EventDispatcher $dispatcher)
    {
        $this->factory = $factory;
        $this->dispatcher = $dispatcher;

    }

    public function build($item)
    {
        $menu = $this->factory->createFromNode($item);
        $this->dispatcher->dispatch('nilead_menu.menu_configure.' . $item->getName(), new ConfigureMenuEvent($this->factory, $menu));


        return $menu;
    }
}