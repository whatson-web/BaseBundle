<?php

namespace APP\BlogBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use WH\BlogBundle\Model\Post as WHPost;

/**
 * Class Post
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="APP\BlogBundle\Entity\PostRepository")
 */
class Post extends WHPost
{



}
