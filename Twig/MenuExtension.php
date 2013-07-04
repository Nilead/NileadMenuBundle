<?php
/**
 * Created by Rubikin Team.
 * Date: 5/15/13
 * Time: 11:38 AM
 * Question? Come to our website at http://rubikin.com
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nilead\MenuBundle\Twig;


use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ContainerInterface;

class MenuExtension extends \Twig_Extension
{
    protected $container;

    protected $helper;

    public function __construct(ContainerInterface $container, Helper $helper)
    {
        $this->container = $container;
        $this->helper = $helper;
    }

    public function getFunctions()
    {
        return array(
            'nilead_menu_render' => new \Twig_Function_Method($this, 'render', array('is_safe' => array('html'))),
            'nilead_menu_master' => new \Twig_Function_Method($this, 'masterCategory'),
        );
    }

    public function render($menuName, array $options = array())
    {
        return $this->helper->render($menuName, $options);
    }

    public function masterCategory($category)
    {
        return $this->container->get('nilead.manager.menu')->getMaster($category->getName());
    }

    public function getName()
    {
        return 'nilead_menu';
    }
}