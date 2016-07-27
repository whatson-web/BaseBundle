<?php

namespace APP\BlogBundle\Controller\Backend;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use APP\BlogBundle\Entity\Post;
use APP\BlogBundle\Form\PostCreateType;
use APP\BlogBundle\Form\PostUpdateType;
use WH\BlogBundle\Controller\Backend\PostController as WHPostController;

/**
 * @Route("/admin/blog/post")
 */
class PostController extends WHPostController
{
    
    

}
