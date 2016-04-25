<?php

namespace APP\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class DefaultController
 * @package APP\MainBundle\Controller
 */
class DefaultController extends Controller
{

    /**
     * @param $page
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function integrationAction($page)
    {

        $view = '';

        switch ($page) {

            case 'home':
                $view = 'APPMainBundle:Integration:home.html.twig';
                break;

            case 'page':
                $view = 'APPMainBundle:Integration:page.html.twig';
                break;

            case 'contact':
                $view = 'APPMainBundle:Integration:contact.html.twig';
                break;

            case 'actualite':
                $view = 'APPMainBundle:Integration:actualite.html.twig';
                break;

            case 'rubrique':
                $view = 'APPMainBundle:Integration:rubrique.html.twig';
                break;

            case 'produit':
                $view = 'APPMainBundle:Integration:produit.html.twig';
                break;

            case 'configurateur':
                $view = 'APPMainBundle:Integration:configurateur.html.twig';
                break;

        }

        return $this->render($view);
    }
}
