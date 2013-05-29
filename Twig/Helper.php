<?php
/**
 * Created by Rubikin Team.
 * Date: 5/15/13
 * Time: 11:47 AM
 * Question? Come to our website at http://rubikin.com
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nilead\MenuBundle\Twig;


use Knp\Menu\ItemInterface;
use Knp\Menu\Provider\MenuProviderInterface;
use Knp\Menu\Renderer\RendererProviderInterface;
use Nilead\MenuBundle\ManagerInterface;
use Nilead\MenuBundle\MenuManager;

class Helper
{
    private $renderer;
    private $manager;

    /**
     * @param $renderer
     * @param ManagerInterface $manager
     */
    public function __construct($renderer, ManagerInterface $manager = null)
    {
        $this->renderer = $renderer;
        $this->manager = $manager;
    }

    public function get($menuName, array $path = array(), array $options = array())
    {
        $menu = $this->manager->get($menuName, $options);

        if (!$menu instanceof ItemInterface) {
            throw new \LogicException(sprintf('The menu "%s" exists, but is not a valid menu item object. Check where you created the menu to be sure it returns an ItemInterface object.', $menuName));
        }

        return $menu;
    }

    public function render($menuName, array $options = array(), $renderer = null)
    {
        $menu = $this->get($menuName);

        return $this->renderer->render($menu, $options);
    }
}