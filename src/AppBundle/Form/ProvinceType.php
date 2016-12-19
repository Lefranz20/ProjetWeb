<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ProvinceType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder ->add('provinceNom');
    }

    public function getBlockPrefix()
    {
        return 'appbundle_province';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver ->setDefaults(array('data_class' => 'AppBundle\Entity\Province'));
    }

} 