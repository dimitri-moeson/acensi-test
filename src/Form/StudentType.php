<?php

namespace App\Form {

    use App\Entity\Student;
    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
    use Symfony\Component\Form\Extension\Core\Type\IntegerType;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\FormBuilderInterface;
    use Symfony\Component\OptionsResolver\OptionsResolver;

    /**
     * Class StudentType
     * @package App\Form
     */
    class StudentType extends AbstractType
    {
        /**
         * @param FormBuilderInterface $builder
         * @param array $options
         */
        public function buildForm(FormBuilderInterface $builder, array $options): void
        {
            $builder
                ->add('FirstName', TextType::class, [
                    'label' => 'F.Name',
                    'attr' => [
                        'placeholder' => 'F.Name',
                    ],
                    'row_attr' => [
                        'class' => 'form-floating',
                    ],
                ])
                ->add('LastName', TextType::class, [
                    'label' => 'L.Name',
                    'attr' => [
                        'placeholder' => 'L.Name',
                    ],
                    'row_attr' => [
                        'class' => 'form-floating',
                    ],
                ])
                ->add('NumEtud', IntegerType::class)
                ->add('Department', ChoiceType::class, [
                    'placeholder' => 'Choose an option',
                ])

            ;
        }

        /**
         * @param OptionsResolver $resolver
         */
        public function configureOptions(OptionsResolver $resolver): void
        {
            $resolver->setDefaults([
                'data_class' => Student::class,
            ]);
        }
    }
}
