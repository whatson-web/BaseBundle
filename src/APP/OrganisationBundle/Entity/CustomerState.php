<?php

namespace APP\OrganisationBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use WH\OrganisationBundle\Model\CustomerState as WHCustomerState;

/**
 * @ORM\Table()
 * @ORM\Entity
 */
class CustomerState extends WHCustomerState
{

}
