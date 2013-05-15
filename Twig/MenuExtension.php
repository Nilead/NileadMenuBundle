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

class MenuExtension extends \Twig_Extension
{
    protected $helper;

    public function __construct(Helper $helper)
    {
        $this->helper = $helper;
    }

    public function getFunctions()
    {
        return array(
            'nilead_menu_render' => new \Twig_Function_Method($this, 'render', array('is_safe' => array('html'))),
        );
    }

    public function render($menuName, array $options = array())
    {
        return $this->helper->render($menuName, $options);
    }

    public function getName()
    {
        return 'nilead_menu';
    }
}