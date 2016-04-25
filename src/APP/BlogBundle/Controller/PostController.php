<?php

namespace APP\BlogBundle\Controller;

/**
 * Components
 */
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * Entities
 */
use APP\BlogBundle\Entity\Post;

/**
 * Forms
 */
use APP\BlogBundle\Form\PostCreateType;
use APP\BlogBundle\Form\PostUpdateType;

/**
 * Class PostController
 * @package APP\BlogBundle\Controller
 */
class PostController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function adminIndexAction()
    {

        $em = $this->getDoctrine()->getEntityManager();

        $APPBlogBundlePost = $em->getRepository('APPBlogBundle:Post');

        $posts = $APPBlogBundlePost->findAll();

        return $this->render(
            "APPBlogBundle:Post:admin/index.html.twig",
            array(
                'posts' => $posts
            )
        );
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function adminCreateAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        $post = new Post();

        $form = $this->createForm(new PostCreateType(), $post);
        $form->handleRequest($request);

        if ($form->isValid()) {

            $em->persist($post);
            $em->flush();

            $request->getSession()->getFlashBag()->add('success', 'Actualité créée');

            if ($form->get('editer')->isClicked()) {

                return $this->redirect($this->generateUrl('appad_blog_post_update', array('post' => $post->getId())));
            }

            return $this->redirect($this->generateUrl('appad_blog_post'));

        }

        return $this->render('APPBlogBundle:Post:admin/create.html.twig', array(
            'form' => $form->createView(),
        ));

    }

    /**
     * @param         $post
     * @ParamConverter("post", class="APPBlogBundle:Post")
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function adminUpdateAction($post, Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(new PostUpdateType(), $post);

        $form->handleRequest($request);

        if ($form->isValid()) {

            $em->persist($post);
            $em->flush();

            $request->getSession()->getFlashBag()->add('success', 'Actualité modifiée');

            if ($form->get('save_and_stay')->isClicked()) {

                return $this->redirect($this->generateUrl('appad_blog_post_update', array('post' => $post->getId())));
            }

            return $this->redirect($this->generateUrl('appad_blog_post'));

        }

        return $this->render('APPBlogBundle:Post:admin/update.html.twig', array(
            'form' => $form->createView(),
            'post' => $post
        ));

    }

    /**
     * @param         $post
     * @ParamConverter("post", class="APPBlogBundle:Post")
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function adminDeleteAction($post, Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        $em->remove($post);
        $em->flush();

        $request->getSession()->getFlashBag()->add('success', 'Actualité supprimée');

        return $this->redirect($request->headers->get('referer'));

    }

}
