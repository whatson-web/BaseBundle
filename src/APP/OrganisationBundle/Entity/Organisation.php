<?php

namespace APP\OrganisationBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use WH\OrganisationBundle\Model\Organisation as WHOrganisation;

/**
 * Organisation
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="WH\OrganisationBundle\Model\OrganisationRepository")
 */
class Organisation extends WHOrganisation
{




}
