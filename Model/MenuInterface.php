<?php
/**
 * Created by Rubikin Team.
 * Date: 5/14/13
 * Time: 5:31 PM
 * Question? Come to our website at http://rubikin.com
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nilead\MenuBundle\Model;

use Knp\Menu\NodeInterface;

interface MenuInterface extends NodeInterface
{
    public function getId();

    public function setParent(MenuInterface $parent = null);

    public function getParent();

    public function hasChildren();
}