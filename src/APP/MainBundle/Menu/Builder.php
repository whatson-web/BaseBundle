<?php

namespace APP\MainBundle\Menu;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Knp\Menu\FactoryInterface;

/**
 * Class Builder
 * @package APP\MainBundle\Menu
 */
class Builder extends Controller
{

    /**
     * @param FactoryInterface $factory
     * @param array $options
     * @return \Knp\Menu\ItemInterface
     */
    public function menuHeaderPrincipal(FactoryInterface $factory, array $options = array())
    {

        $em = $this->getDoctrine()->getManager();

        $repo = $em->getRepository('APPCmsBundle:Page');

        $menu = $factory->createItem(
            'root',
            array(
                'childrenAttributes' => array(
                    'class' => 'nav'
                )
            )
        );

        $pages = $repo->findForMenu(array('Menu.slug' => 'menuheaderprincipal'));

        foreach ($pages as $page) {

            if ($page->getLvl() == 1) {

                $menu->addChild(
                    $page->getSlug(),
                    array(
                        'route'           => 'wh_front_cms_page',
                        'routeParameters' => array('url' => $page->getUrl()),
                        'label'           => $page->getName(),
                    )
                );

            }

        }

        return $menu;
    }

    /**
     * @param FactoryInterface $factory
     * @param array $options
     * @return \Knp\Menu\ItemInterface
     */
    public function menuFooter(FactoryInterface $factory, array $options = array())
    {

        $em = $this->getDoctrine()->getManager();

        $repo = $em->getRepository('APPCmsBundle:Page');

        $menu = $factory->createItem(
            'root',
            array(
                'childrenAttributes' => array(
                    'class' => 'nav'
                )
            )
        );

        $pages = $repo->findForMenu(array('Menu.slug' => 'menufooter'));

        foreach ($pages as $page) {

            if ($page->getLvl() == 1) {

                $menu->addChild(
                    $page->getSlug(),
                    array(
                        'route'           => 'wh_front_cms_page',
                        'routeParameters' => array('url' => $page->getUrl()),
                        'label'           => $page->getName(),
                    )
                );

            }

        }

        return $menu;
    }

}
