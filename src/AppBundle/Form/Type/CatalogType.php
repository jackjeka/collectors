<?php
namespace AppBundle\Form\Type;


use AppBundle\Entity\Catalog;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CatalogType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text')
            ->add('description', 'textarea')
            ->add('category', 'entity', [
                'class' => 'AppBundle\Entity\Category',
                ]
            )
            ->add('startDate', 'date', [
                'input'  => 'datetime',
                'widget' => 'choice',
                ]
            )
            ->add('createdAt', 'hidden', [
                    'mapped' => false,
                ]
            )
            ->add('items', 'bootstrap_collection', [
                'type'=> new ItemType(),
                'cascade_validation' => true,
                'inherit_data' => true,
                'allow_add' => true,
                'allow_delete'=> true,
                'prototype_name' => 'items',
                'options' => [
                    'attr' => [
                        'style' => 'inline',
                    ]
                ]
            ]
        );
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Catalog',
            ''
        ]);
    }

    public function getName()
    {
        return 'Catalog';
    }
}