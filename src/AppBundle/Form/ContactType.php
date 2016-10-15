<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => [
                    'placeholder' => 'Votre nom',
                    'required' => true,
                    'autocomplete' => 'off',
                ],
                'label' => 'Votre nom',
                'constraints' => [
                    new NotBlank(["message" => "Le champ nom est obligatoire"]),
                ]
            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'placeholder' => 'Votre email',
                    'required' => true,
                    'autocomplete' => false,
                ],
                'label' => 'Votre email',
                'constraints' => [
                    new NotBlank(["message" => "Le champ email est obligatoire"]),
                    new Email(["message" => "Votre adresse email ne semble pas valide"]),
                ]
            ])
            ->add('message', TextareaType::class, [
                'attr' => [
                    'placeholder' => 'Votre message',
                    'required' => true,
                    'rows' => '5',
                ],
                'label' => 'Votre message',
                'constraints' => [
                    new NotBlank(["message" => "Le champ message est obligatoire"]),
                ]
            ])
        ;
    }

    public function setDefaultOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'error_bubbling' => true
        ]);
    }

    public function getName()
    {
        return 'contact_form';
    }
}