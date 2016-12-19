<?php

namespace AppBundle\Form;

use Proxies\__CG__\AppBundle\Entity\Localite;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\LocaleType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;


class UtilisateurType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('nom',TextType::class,array('label_attr'=>array('class'=>'label'),'attr'=>array('class'=>'form-control')))
                ->add('rueNumero',TextType::class,array('label_attr'=>array('class'=>'label'),'attr'=>array('class'=>'form-control')))
                ->add('rue',TextType::class,array('label_attr'=>array('class'=>'label'),'attr'=>array('class'=>'form-control')))
                ->add('typeUtilisateur',ChoiceType::class,array(
                   'attr'=>array('class'=>'selectpicker'),
                   'choices'=>array(
                       'internaute' => 'internaute',
                       'prestataire' => 'prestataire'
                   )
               ))
                ->add('codePostal',EntityType::class,array(
                                    'class'=>'AppBundle\Entity\CodePostal',
                                    'placeholder'=>'--- liste des codes postaux ---',
                                    'property_path'=>'codePostal',
                                    'multiple'=>false,
                                    'attr'=>array('class'=>'selectpicker','data-live-search'=>true)
                                    )
                                )
                ->add('localite',EntityType::class,array(
                                    'class'=>'AppBundle\Entity\Localite',
                                    'placeholder'=>'--- liste Localités ---',
                                    'property_path'=>'localite',
                                    'multiple'=>false,
                                    'attr'=>array('class'=>'selectpicker','data-live-search'=>true)
                                    )
                                )
                ->add('province',EntityType::class,array(
                                    'class'=> 'AppBundle\Entity\Province',
                                    'placeholder'=>'--- Liste des provinces ---',
                                    'property_path'=>'province',
                                    'multiple'=>false,
                                    'attr'=>array('class'=>'selectpicker','data-live-search'=>true)
                                    )
                                );
    }
    
    /**
     * {@inheritdoc}
     */



    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Utilisateur'
        ));
    }


    /**
     * {@inheritdoc}
     */


    public function getBlockPrefix()
    {
        return 'appbundle_utilisateur';
    }


}
