<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Jméno',
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Příjmení',
            ])
            ->add('phone', TextType::class, [
                'label' => 'Telefonní číslo',
                'required' => false,
            ])
            ->add('email', EmailType::class, [
                'label' => 'E-mail',
            ])
            ->add('note', TextareaType::class, [
                'label' => 'Dlouhá poznámka',
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
