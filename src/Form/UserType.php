<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, array('attr' => array('class' => 'border-b border-blue-darker w-full px-4 py-2 mb-2', 'placeholder' => 'Email'),'label' => false))
            ->add('password', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options' =>  array('attr' => array('class' => 'border-b border-blue-darker w-full px-4 py-2 mb-2', 'placeholder' => 'Password'),'label' => false),
                'second_options' =>  array('attr' => array('class' => 'border-b border-blue-darker w-full px-4 py-2 mb-2', 'placeholder' => 'Repeat Password'),'label' => false),
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,
        ));
    }
}
