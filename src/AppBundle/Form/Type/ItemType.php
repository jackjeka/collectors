<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
class CreateCatalogType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', [
                'label' => 'catalog.catalog_name'
            ])
            ->add('description', 'textarea', [
                'label' => 'catalog.catalog_description'
            ])
            ->add('createdAt', 'hidden')
            ->add('items', 'collection', [
                'type' => new CreateItemType(),
                'label' => 'catalog.items_list',
                'allow_add' => true
            ]);
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Santa\CoolSchoolBundle\Entity\School',
        ]);
    }

    public function getName()
    {
        return 'Catalog';
    }
}