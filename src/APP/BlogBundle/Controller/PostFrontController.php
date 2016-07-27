<?php

namespace APP\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Components
 */
use Doctrine\Common\Collections;

/**
 * Class PostFrontController
 * @package APP\BlogBundle\Controller
 */
class PostFrontController extends Controller
{
    /**
     * @param $slug
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewAction($slug)
    {

        $em = $this->getDoctrine()->getManager();

        $postRepository = $em->getRepository('APPBlogBundle:Post');

        $post       = $postRepository->get(false, array('slug' => $slug));
        $otherPosts = $postRepository->get(
            true,
            array(
                'page'  => $post->getPage()->getId(),
                'notId' => $post->getId(),
            )
        );

        return $this->render(
            'APPBlogBundle:Post:public/view.html.twig', array(
                'post'       => $post,
                'otherPosts' => $otherPosts,
            )
        );
    }

    /**
     * @param $pageId
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction($pageId)
    {

        $em = $this->getDoctrine()->getManager();

        $posts = $em->getRepository('APPBlogBundle:Post')->get(
            true,
            array(
                'page' => $pageId,
            )
        );

        return $this->render(
            'APPBlogBundle:Post:public/list.html.twig', array(
                'posts' => $posts,
            )
        );
    }

}
