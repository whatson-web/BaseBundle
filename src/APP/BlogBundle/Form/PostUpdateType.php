<?php

namespace APP\BlogBundle\Form;

use APP\BlogBundle\Entity\Post;
use APP\CmsBundle\Entity\PageRepository;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use WH\CmsBundle\Form\FileType;

/**
 * Class PostUpdateType
 * @package APP\BlogBundle\Form
 */
class PostUpdateType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add(
                'name',
                'text',
                array(
                    'label' => 'Nom : ',
                )
            )
            ->add(
                'title',
                'text', array(
                    'label'    => 'Titre : ',
                    'required' => false,
                )
            )
            ->add(
                'resume',
                'textarea',
                array(
                    'label'    => 'Résumé : ',
                    'required' => false,
                )
            )
            ->add(
                'body',
                'textarea',
                array(
                    'label'    => 'Contenu',
                    'required' => false,
                    'attr'     => array(
                        'class'      => 'tinymce',
                        'data-theme' => 'advanced',
                    )
                )
            )
            ->add(
                'status',
                'choice',
                array(
                    'label'   => 'Etat de la page : ',
                    'choices' => Post::getStatusChoices(),
                )
            )
            ->add(
                'thumb',
                new FileType(),
                array(
                    'label'    => 'Miniature',
                    'required' => false,
                )
            )
            ->add(
                'slugReplace',
                'text',
                array(
                    'label'    => 'Réécriture du slug : ',
                    'required' => false,
                )
            )
            ->add(
                'Page', 'entity', array(
                    'required'      => false,
                    'label'         => 'Page parente',
                    'class'         => 'APPCmsBundle:Page',
                    'empty_value'   => 'Pas de page parente',
                    'property'      => 'name',
                    'multiple'      => false,
                    'expanded'      => false,
                    'query_builder' => function (PageRepository $er) {

                        return $er->getChildrenQueryBuilder(null, null, 'root', 'asc', false);
                    }
                )
            )
            ->add(
                'save_and_stay',
                'submit',
                array(
                    'label' => 'Enregistrer',
                    'attr'  => array(
                        'class' => 'btn btn-success',
                    )
                )
            )
            ->add(
                'save_and_back',
                'submit',
                array(
                    'label' => 'Enregistrer et quitter ',
                    'attr'  => array(
                        'class' => 'btn btn-primary',
                    )
                )
            );
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
        return 'app_blogbundle_post_update';
    }

}
