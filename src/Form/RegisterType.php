<?php

namespace App\Form;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\FileUploadType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Adresse email',
                'attr' => [
                    'placeholder' => "exemple@domaine.com"
                ]
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de passe doivent être identiques.',
                'required' => true,
                'first_options' => [ 'label' => 'Mot de passe' ],
                'second_options' => [ 'label' => 'Confirmez le mot de passe' ]
            ])
            ->add('firstame', TextType::class, [
                'label' => 'Prénom',
                'attr' => [
                    'placeholder' => "Entrez le prénom"
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => "Entrez le nom"
                ]
            ])
            ->add('job', TextType::class, [
                'label' => 'Poste ou emploi',
                'attr' => [
                    'placeholder' => "Directeur Commercial"
                ]
            ])
            ->add('society', TextType::class, [
                'label' => 'Société',
                'attr' => [
                    'placeholder' => "Linkow"
                ]
            ])
            ->add('phone', TextType::class, [
                'label' => 'Numéro de téléphone',
                'attr' => [
                    'placeholder' => "+227 90 XX XX XX"
                ]
            ])
            ->add('illustration', FileUploadType::class, [
                'label' => 'Photo',
                'attr' => [
                    'placeholder' => "Photo"
                ]
            ])
            ->add('face_link', TextType::class, [
                'label' => 'Facebook',
                'attr' => [
                    'placeholder' => "https://facebook.com/",
                    'required' => false,
                ]
            ])
            ->add('insta_link', TextType::class, [
                'label' => 'Instagram',
                'attr' => [
                    'placeholder' => "https://instagram.com/",
                    'required' => false,
                ]
            ])
            ->add('linked_link', TextType::class, [
                'label' => 'LinkedIn',
                'attr' => [
                    'placeholder' => "https://linkedin.com/",
                    'required' => false,
                ]
            ])
            ->add('twitter_link', TextType::class, [
                'label' => 'Twitter',
                'attr' => [
                    'placeholder' => "https://twitter.com/",
                    'required' => false,
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Enregistrer'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
