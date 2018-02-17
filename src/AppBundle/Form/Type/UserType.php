<?php
/**
 * Created by PhpStorm.
 * User: dalius
 * Date: 18.2.15
 * Time: 09.42
 */

namespace AppBundle\Form\Type;

use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'label'=>'El. paštas (ir prisijungimo vardas)'
            ])
            ->add('firstName', TextType::class, [
                'label'=>'Vardas'
            ])
            ->add('lastName', TextType::class, [
                'label'=>'Pavardė'
            ])
            ->add('phone', TextType::class, [
                'label'=>'Telefonas'
            ])
            ->add('city', TextType::class, [
                'label'=>'Miestas'
            ])
            ->add('address', TextType::class, [
                'label'=>'Adresas'
            ])
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options'  => array('label' => 'Slaptažodis'),
                'second_options' => array('label' => 'Pakartokite slaptažodį'),
            ))
            ->add('submit', SubmitType::class, [
                'label' => 'Registruotis',
                'attr'  => [
                    'class' => 'btn btn-success'
                ]
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,
        ));
    }
}