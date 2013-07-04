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


class Menu implements MenuInterface
{
    protected $id;

    protected $name;

    protected $lft;

    protected $lvl;

    protected $rgt;

    protected $root;

    protected $parent;

    protected $options = array();

    protected $children;

    public function getId()
    {
        return $this->id;
    }

    public function setParent(MenuInterface $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    public function getParent()
    {
        return $this->parent;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the name of the node
     *
     * Each child of a node must have a unique name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    public function setOption($key, $value)
    {
        $this->options[$key] = $value;
        return $this;
    }

    public function setOptions($options = array())
    {
        $this->options = $options;

        return $this;
    }

    /**
     * Get the options for the factory to create the item for this node
     *
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Get the child nodes implementing NodeInterface
     *
     * @return \Traversable
     */
    public function getChildren()
    {
        return $this->children;
    }

    public function hasChildren()
    {
        return count($this->children) > 0;
    }

    public function isRoot()
    {
        return $this->root;
    }
}