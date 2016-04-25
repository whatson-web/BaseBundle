<?php

namespace APP\UserBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use WH\UserBundle\Model\User as WHUser;


/**
 * User
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="APP\UserBundle\Entity\UserRepository")
 * @ORM\HasLifecycleCallbacks()
 * @UniqueEntity("email")
 */
class User extends WHUser
{




}
