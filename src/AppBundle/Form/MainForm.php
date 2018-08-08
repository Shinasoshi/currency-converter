<?php

namespace AppBundle\Form;

use AppBundle\Model\Main;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MainForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('rubValue', MoneyType::class, [
                'label' => 'RUB:',
                'required' => false,
                'currency' => false
            ])
            ->add('zlotyValue', MoneyType::class, [
                'label' => 'Złoty:',
                'required' => false,
                'currency' => false,
                'attr' => [
                    'readOnly' => true
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Main::class
        ));
    }

    public function getBlockPrefix()
    {
        return 'appbundle_main';
    }
}