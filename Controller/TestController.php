<?php
/**
 * Created by Rubikin Team.
 * Date: 5/15/13
 * Time: 9:39 AM
 * Question? Come to our website at http://rubikin.com
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nilead\MenuBundle\Controller;


use Nilead\MenuBundle\Entity\Menu;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TestController extends Controller
{
    public function testAction()
    {
        $root = new Menu();
        $root->setName('main');

        $home = new Menu();
        $home->setName('Home');
        $home->setParent($root);
        $home->setOption('uri', '/');

        $cate = new Menu();
        $cate->setName('Categories');
        $cate->setParent($root);
        $cate->setOption('uri', '/');


        $cate1 = new Menu();
        $cate1->setName('Dresses');
        $cate1->setParent($cate);
        $cate1->setOption('uri', '/');

        $cate2 = new Menu();
        $cate2->setName('Shirts');
        $cate2->setParent($cate);
        $cate2->setOption('uri', '/');


        $about = new Menu();
        $about->setName('About');
        $about->setParent($root);
        $about->setOption('uri', '/');


        $this->getDoctrine()->getManager()->persist($root);
        $this->getDoctrine()->getManager()->persist($home);
        $this->getDoctrine()->getManager()->persist($cate);
        $this->getDoctrine()->getManager()->persist($cate1);
        $this->getDoctrine()->getManager()->persist($cate2);
        $this->getDoctrine()->getManager()->persist($about);
        $this->getDoctrine()->getManager()->flush();
    }

    public function getAction()
    {
//        $repo = $this->getDoctrine()->getManager()->getRepository('NileadMenuBundle:Menu');
//
//        $root = $repo->findOneByName('main');
//
//        $children = $root->getChildren();
//
////        foreach($children as $child){
////            var_dump(($child->getName()));
////        }
//
//        $factory = new \Knp\Menu\MenuFactory();
//        $menu = $factory->createFromNode($root);
//        var_dump($menu);
        return $this->render('NileadWebBundle:Backend/Shipment:index.html.twig');
    }
}