<?php

namespace AppBundle\Form;

use Doctrine\DBAL\Types\BooleanType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class InternauteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

     $builder
         ->add('nom',TextType::class,array('label_attr'=> array('class'=>'form-label'),'attr'=>array('class'=>'form-control')))
         ->add('prenom',TextType::class,array('label_attr' =>array('class'=>'form-label'),'attr' => array('class' => 'form-control')))
         ->add('inscriptionNewsletter',ChoiceType::class,array('label_attr'=>array('class'=>'form-label'),'attr'=>array('class'=>'form-control')))
         ->add('avatar_file',FileType::class,array('label_attr'=>array('class'=>'form-label'),'attr'=>array('class'=>'form-control')));

    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Internaute'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_internaute';
    }


}
