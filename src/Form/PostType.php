<?php

namespace App\Form;

use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, array('attr' => array('class' => 'border border-grey-light w-full px-2 py-2 mb-2 rounded', 'placeholder' => 'Title'),'label' => false))
            ->add('body', null, array('attr' => array('class' => 'w-full border border-grey-light px-2 py-2 h-48 mb-2 rounded'),'label' => false))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
