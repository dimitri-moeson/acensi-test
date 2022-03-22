<?php

namespace App\Form {

    use App\Entity\Student;
    use Symfony\Component\Form\AbstractType;
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
                ->add('FirstName')
                ->add('LastName')
                ->add('NumEtud')
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
