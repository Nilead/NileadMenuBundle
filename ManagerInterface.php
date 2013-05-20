<?php
/**
 * Created by Rubikin Team.
 * Date: 5/20/13
 * Time: 11:34 AM
 * Question? Come to our website at http://rubikin.com
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nilead\MenuBundle;


interface ManagerInterface
{
    public function get($name, array $options = array());

    public function has($name);
}