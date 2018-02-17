<?php
/**
 * Created by PhpStorm.
 * User: dalius
 * Date: 18.2.13
 * Time: 16.57
 */

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;



class CustomerFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, [
                'label'=>'Vardas'
            ])
            ->add('lastname', TextType::class, [
                'label'=>'Pavardė'
            ])
            ->add('phone', TextType::class, [
                'label'=>'Telefonas'
            ])
            ->add('email', EmailType::class, [
                'label' => 'El. paštas (registracijos vardas)',
                'attr'  => [
                    'class' => 'form-group'
                ]
            ])
            ->add('city', TextType::class, [
                'label'=>'Miestas'
            ])
            ->add('address', TextType::class, [
                'label'=>'Adresas'
            ])
            ->add('password', PasswordType::class, [
                'label'=>'Slaptažodis'
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Registruotis',
                'attr'  => [
                    'class' => 'btn btn-success'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Customer',
        ));
    }
}
