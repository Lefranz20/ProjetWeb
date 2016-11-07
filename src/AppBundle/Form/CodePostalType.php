<?php


namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\OptionsResolver\OptionsResolver;


class CodePostalType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder,array $options)
    {
      $builder ->add('cp');
              // ->add('utilisateurs',CodePostalType::class,array('entry_type'=>UtilisateurType::class,'allow_add'=>true));
    }

    public function getBlockPrefix()
    {
        return 'appbundle_codePostal';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array('data_class'=> 'AppBundle\Entity\CodePostal'));
    }

} 