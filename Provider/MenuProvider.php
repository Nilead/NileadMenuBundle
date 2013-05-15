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
use Knp\Menu\FactoryInterface;
use Knp\Menu\Provider\MenuProviderInterface;
use Nilead\MenuBundle\Model\MenuInterface;

class MenuProvider implements MenuProviderInterface
{
    /**
     * @var FactoryInterface
     */
    protected $factory = null;

    /**
     * @var EntityManager
     */
    protected $entityManager = null;


    /**
     * @param FactoryInterface $factory the menu factory used to create the menu item
     * @param EntityManager $entityManager
     */
    public function __construct(FactoryInterface $factory, EntityManager $entityManager)
    {
        $this->factory = $factory;
        $this->entityManager = $entityManager;
    }


    public function get($name, array $options = array())
    {
        $result = $this->entityManager->getRepository('NileadMenuBundle:Menu')->findOneByName($name);

        if (empty($result)) {
            throw new \LogicException(sprintf('The menu "%s" doesn\'t exists. Check where you created the menu to be sure it returns an existed menu.', $name));
        }

        $menu = $this->factory->createFromNode($result);

        return $menu;
    }

    public function has($name, array $options = array())
    {
        // TODO: Implement has() method.
    }
}