<?php

namespace APP\BackendBundle\Menu;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Knp\Menu\FactoryInterface;

/**
 * Class Builder
 * @package APP\BackendBundle\Menu
 */
class Builder extends Controller
{

    public function mainMenu(FactoryInterface $factory, array $options)
    {

        $menu = $factory->createItem('root');

        $menu->addChild('Home', array(
            'route'  => 'wh_admin_home',
            'label'  => '<i class="fa fa-lg fa-fw fa-home"></i>  <span class="menu-item-parent">Dashboard</span>',
            'extras' => array('safe_label' => true)
        ));

        /**
         * CMS
         */
        $menu->addChild('CMS', array(
            'uri'    => 'javascript:void(0);',
            'label'  => '<i class="fa fa-lg fa-fw fa-sitemap"></i>  <span class="menu-item-parent">Gestion des pages</span>',
            'extras' => array('safe_label' => true)
        ));

        $menu['CMS']->addChild('wh_admin_cms_pages', array(
            'route'  => 'wh_admin_cms_pages',
            'label'  => '<i class="fa fa-sitemap"></i>  <span class="menu-item-parent">Pages</span>',
            'extras' => array('safe_label' => true)
        ));

        $menu['CMS']->addChild('appad_blog_post', array(
            'route'  => 'appad_blog_post',
            'label'  => '<i class="fa fa-files-o"></i>  <span class="menu-item-parent">Actualités</span>',
            'extras' => array('safe_label' => true)
        ));

        $menu->addChild('wh_admin_users', array(
                'route'  => 'wh_admin_users',
                'label'  => '<i class="fa fa-lg fa-fw fa-user"></i> Users',
                'extras' => array('safe_label' => true)
            )
        );

        $menu->addChild('PARAMS', array(
                'uri'    => '#',
                'label'  => '<i class="fa fa-lg fa-fw fa-cog"></i> Configurations',
                'extras' => array('safe_label' => true)
            )
        );

        $menu['PARAMS']->addChild('wh_admin_parameters', array(
            'route'  => 'wh_admin_parameters',
            'label'  => 'Parametres',
            'extras' => array('safe_label' => true)
        ));

        return $menu;
    }
}
