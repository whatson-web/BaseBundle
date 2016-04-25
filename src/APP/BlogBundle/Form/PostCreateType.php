<?php

namespace APP\BlogBundle\Form;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class PostCreateType
 * @package APP\BlogBundle\Form
 */
class PostCreateType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('name', 'text', array('label' => 'Nom : '))
            ->add('editer', 'submit', array('label' => 'Créer et editer', 'attr' => array('class' => 'btn btn-primary')))
            ->add('new', 'submit', array('label' => 'Créer ', 'attr' => array('class' => 'btn btn-success')));

    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'APP\BlogBundle\Entity\Post'
            )
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'app_blogbundle_post_create';
    }

}
