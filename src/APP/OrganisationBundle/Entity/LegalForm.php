<?php

namespace APP\OrganisationBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use WH\OrganisationBundle\Model\LegalForm as WHLegalForm;

/**
 * @ORM\Table()
 * @ORM\Entity
 */
class LegalForm extends WHLegalForm
{

}
