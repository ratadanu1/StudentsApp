<?php

namespace App\Form;

use App\Entity\Specialitate;
use App\Entity\Student;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Range;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Type;

class StudentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nume', TextType::class, [
                'label' => 'Username',
                'attr' => [
                    'placeholder' => 'Scrie numele',
                    'class' => 'my_class',
                    'id' => 'name',
                ],
                'constraints' => [
                    new Length(
                    min: 5,
                    max: 30,
                    ),
                    new NotBlank()
                ],                    
                'required' => true,
            ])
            ->add('media', NumberType::class, [
                'label' => 'Media',
                'constraints' => [
                    new Range([
                        'min' => 0,
                        'max' => 10,
                        'minMessage' => 'Valoarea trebuie să fie cel puțin {{ limit }}.',
                        'maxMessage' => 'Valoarea trebuie să fie cel mult {{ limit }}.',
                    ]),
                    new Regex([
                        'pattern' => '/^\d+(\.\d{1,2})?$/',
                        'message' => 'Formatul valorii este invalid. Vă rugăm să utilizați maximum două cifre după virgulă.',
                    ]),
                ],
            ])
            ->add('birtDate')
            ->add('grupa')
            ->add('specialitate', EntityType::class, [
                'class' => Specialitate::class,
                'choice_label' => 'nume',

                'label' => 'Specialitate',
                'placeholder' => 'choose speciality',
                'constraints' => (new Type(Specialitate::class))
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Save',
                'attr' => [
                    'class' => 'btn btn-primary',
                ],

            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Student::class,
        ]);
    }
}
