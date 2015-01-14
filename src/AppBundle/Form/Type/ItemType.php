<?php
namespace AppBundle\Form\Type;

use AppBundle\Entity\Item;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
class ItemType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('name', 'text')
            ->add('description', 'textarea')
            ->add('createdAt', 'hidden')
            ->add('catalog', 'entity', [
                'class' => 'AppBundle\Entity\Catalog',
            ])
            ->add('acquisitionDate', 'date', [
                    'input'  => 'datetime',
                    'widget' => 'choice',
                ]
            )
            ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Item',
        ]);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'Item';
    }
}