<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class RegistrationFormType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options): void
  {
    $builder
      ->add('firstName', TextType::class, [
        'required' => true,
      ])
      ->add('lastName', TextType::class, [
        'required' => true,
      ])
      ->add('email', EmailType::class, [
        'required' => true,
      ])
      ->add('username', TextType::class, [
        'required' => true,
      ])
      ->add('plainPassword', PasswordType::class, [
        'mapped'      => false,
        'required'    => true,
        'constraints' => [
          new NotBlank([
            'message' => 'Parola este obligatorie.',
          ]),
          new Length([
            'min'        => 6,
            'minMessage' => 'Parola trebuie să aibă cel puțin {{ limit }} caractere.',
            'max'        => 20, // Maximul permis de Symfony pentru parole
          ]),
          new Regex([
            'pattern' => '/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$/',
            'message' => 'Parola trebuie să conțină cel puțin 6 caractere, dintre care cel puțin o literă, un număr și un caracter special.',
          ]),
        ],
      ]);
  }


  public function configureOptions(OptionsResolver $resolver): void
  {
    $resolver->setDefaults([
      'data_class' => Users::class,
    ]);
  }
}
