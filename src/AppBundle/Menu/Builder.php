<?php
/**
 * Created by PhpStorm.
 * User: Francois
 * Date: 21-11-16
 * Time: 19:07
 */

namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class Builder implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $menu->addChild('Recherche', array('route' => 'search_homepage'));

        // create another menu item
        $menu->addChild('Résultat', array('route' => 'search_result_homepage'));

        // ... add more children

        return $menu;
    }
}