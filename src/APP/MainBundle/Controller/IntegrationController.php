<?php

namespace APP\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class IntegrationController
 *
 * @package APP\MainBundle\Controller
 */
class IntegrationController extends Controller
{

    private $categories = array(
        array(
            'name'  => 'Pages classiques',
            'pages' => array(
                'classicExample',
                'exampleWithController',
            ),
        ),
    );

    /**
     * @var array
     */
    private $pages = array(
        'classicExample'        => array(
            'slug' => 'classicExample',
            'name' => 'Classic example',
        ),
        'exampleWithController' => array(
            'slug'       => 'exampleWithController',
            'name'       => 'Example with controller',
            'controller' => 'APPMainBundle:Integration:exampleWithController',
        ),
    );

    /**
     * Retourne les catégories avec les informations des pages
     *
     * @return mixed
     */
    private function getCategories()
    {

        $categories = $this->categories;

        foreach ($categories as &$category) {


            foreach ($category['pages'] as &$page) {

                $page = $this->pages[$page];
            }
        }

        return $categories;
    }

    /**
     * Liste toutes les pages d'intégration
     *
     * @param null $slug
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction($slug = null)
    {

        if ($slug) {

            $page = $this->pages[$slug];
            $page['view'] = 'APPMainBundle:Integration:' . $page['slug'] . '.html.twig';

            if (!empty($page['controller'])) {

                return $this->forward(
                    $page['controller'],
                    array(
                        'page' => $page,
                    )
                );
            }

            return $this->render(
                $page['view']
            );
        }

        return $this->render(
            'APPMainBundle:Integration:list.html.twig',
            array(
                'pages'      => $this->pages,
                'categories' => $this->getCategories(),
            )
        );
    }

    /**
     * Exemple d'action qui renvoie un formulaire
     *
     * @param $page
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function exampleWithControllerAction($page)
    {

        $form = $this->createFormBuilder()
            ->add(
                'field1',
                'text',
                array(
                    'label' => 'Label : ',
                )
            )
            ->getForm();


        return $this->render(
            $page['view'],
            array(
                'form' => $form->createView(),
            )
        );
    }

}