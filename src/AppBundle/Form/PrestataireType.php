<?php
/**
 * Created by PhpStorm.
 * User: Francois
 * Date: 07-11-16
 * Time: 14:04
 */

namespace AppBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;


class PrestataireType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nomEntreprise',TextType::class,array('label_attr'=> array('class'=>'form-label'),'attr'=>array('class'=>'form-control')))
                ->add('description',TextareaType::class,array('label_attr' =>array('class'=>'form-label'),'attr' => array('class' => 'form-control')))
                ->add('web',null,array('label_attr'=>array('class'=>'form-label'),'attr'=>array('class'=>'form-control')))
                ->add('emailDeContact',EmailType::class,array('label_attr'=>array('class'=>'form-label'),'attr'=>array('class'=>'form-control')))
                ->add('telephone',null,array('label_attr'=>array('class'=>'form-label'),'attr'=>array('class'=>'form-control')))
                ->add('numeroTva',null,array('label_attr'=>array('class'=>'form-label'),'attr'=>array('class'=>'form-control')))
                ->add('logo_file',FileType::class,array('label_attr'=>array('class'=>'form-label'),'attr'=>array('class'=>'form-control')));

    }

    public function getBlockPrefix()
    {
        return 'appbundle_prestataire';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array('data_class'=> 'AppBundle\Entity\Prestataire'));
    }

} 