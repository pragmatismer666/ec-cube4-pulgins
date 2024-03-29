<?php

namespace Plugin\ProductReserve4\Form\Type\Admin;

use Plugin\ProductReserve4\Entity\Config;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Eccube\Form\Type\Master\OrderStatusType;
use Eccube\Form\Type\Master\PaymentType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Eccube\Entity\Master\OrderStatus;
use Symfony\Component\Validator\Constraints as Assert;
use Eccube\Form\Type\ToggleSwitchType;


class ConfigType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('order_status', OrderStatusType::class, [
            'expanded' => false,
            'multiple' => false,
            'placeholder' => '選択してください。'
        ])->add('payments', PaymentType::class, [
            'expanded' => true,
            'multiple' => true,
            'required' => false,
            'constraints' => [
                new Assert\NotBlank(),
            ],
        ])
        ->add("plugin_priority", ToggleSwitchType::class, [
            'required'  =>  false
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver); //the autogenerated stub
    }
}
