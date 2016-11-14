<?php


namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class LocaliteType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder,array $options)
    {
     // $builder ->add('nom',TextType::class,array('label_attr'=>array('class'=>'label'),'attr'=>array('class'=>'form-control')));
    $builder->add('nom',TextType::class);
    }

    public function getBlockPrefix()
    {
        return 'appbundle_Localite';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array('data_class'=> 'AppBundle\Entity\Localite'));
    }

} 