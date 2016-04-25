<?php

namespace APP\BlogBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use WH\CmsBundle\Model\Content;

/**
 * Class Post
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="APP\BlogBundle\Entity\PostRepository")
 */
class Post extends Content
{

    /**
     * @ORM\OneToOne(targetEntity="APP\CmsBundle\Entity\File", cascade={"persist", "remove"})
     */
    private $thumb;

    /**
     * Set thumb
     *
     * @param \APP\CmsBundle\Entity\File $thumb
     * @return Post
     */
    public function setThumb(\APP\CmsBundle\Entity\File $thumb = null)
    {
        $this->thumb = $thumb;

        return $this;
    }

    /**
     * Get thumb
     *
     * @return \APP\CmsBundle\Entity\File
     */
    public function getThumb()
    {
        return $this->thumb;
    }

}
