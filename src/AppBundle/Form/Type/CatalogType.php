<?php
namespace AppBundle\Form\Type;

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
            ->add('createdAt', 'hidden')
            ->add('items', 'collection', [
                'type' => new ItemType(),
                'allow_add' => true,
                'allow_delete'=> true,
                'mapped' => false,
                'label' => 'catalog.items_list',
                'by_reference' => false,
                'prototype_name' => 'items',
            ]);
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Catalog',
        ]);
    }

    public function getName()
    {
        return 'Catalog';
    }
}