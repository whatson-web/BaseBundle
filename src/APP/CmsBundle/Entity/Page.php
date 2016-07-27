<?php

namespace APP\CmsBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use WH\CmsBundle\Model\Page as WHPage;
use APP\CmsBundle\Entity\Seo;
use APP\CmsBundle\Entity\Template;
use APP\CmsBundle\Entity\File;
use APP\CmsBundle\Entity\Menu;

/**
 * @Gedmo\Tree(type="nested")
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="APP\CmsBundle\Entity\PageRepository")
 */
class Page extends WHPage
{

}
