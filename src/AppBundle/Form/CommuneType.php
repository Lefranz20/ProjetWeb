<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class CommuneType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder ->add('nom');
    }

    public function getBlockPrefix()
    {
        return 'appbundle_commune';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver ->setDefaults(array('data_class' => 'AppBundle\Entity\Commune'));
    }

} 