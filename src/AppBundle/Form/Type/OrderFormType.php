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
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;


class OrderFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('user', HiddenType::class)
            ->add('item', TextType::class, [
                'label' => 'Prekė'
            ])
            ->add('qnt', IntegerType::class, [
                'label' => 'Kiekis'
            ])
            ->add('price', MoneyType::class, [
                'label' => 'Kaina'
            ])
            ->add('sum', MoneyType::class, [
                'label' => 'Suma'
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Patvirtinti',
                'attr' => [
                    'class' => 'btn btn-success'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Order',
        ));
    }
}
