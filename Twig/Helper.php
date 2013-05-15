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

class Helper
{
    private $renderer;
    private $menuProvider;

    /**
     * @param $renderer
     * @param MenuProviderInterface|null $menuProvider
     */
    public function __construct($renderer, MenuProviderInterface $menuProvider = null)
    {
        $this->renderer = $renderer;
        $this->menuProvider = $menuProvider;
    }

    public function get($menu, array $path = array(), array $options = array())
    {
        $menuName = $menu;
        $menu = $this->menuProvider->get($menuName, $options);

        if (!$menu instanceof ItemInterface) {
            throw new \LogicException(sprintf('The menu "%s" exists, but is not a valid menu item object. Check where you created the menu to be sure it returns an ItemInterface object.', $menuName));
        }

        return $menu;
    }

    public function render($menu, array $options = array(), $renderer = null)
    {
        $menu = $this->get($menu);

        return $this->renderer->render($menu, $options);
    }
}