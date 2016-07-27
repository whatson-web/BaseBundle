<?php
namespace APP\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use WH\CmsBundle\Model\Template as WHCmsTemplate;


/**
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="APP\CmsBundle\Entity\TemplateRepository")
 */
class Template extends WHCmsTemplate
{




}
