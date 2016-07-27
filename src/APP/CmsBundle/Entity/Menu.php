<?php
namespace APP\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use WH\CmsBundle\Model\Menu as WHCmsMenu;
use APP\UserBundle\Entity\User;


/**
 * @ORM\Table()
 * @ORM\Entity
 */
class Menu extends WHCmsMenu
{



}
