<?php


namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /*
        $builder->add('nom',null,array('label'=>'form.nom','translation_domain'=>'FOSUserBundle'));
        $builder->add('prenom',null,array('label'=>'form.prenom','translation_domain'=>'FOSUserBundle'));
        $builder->add('numeroClient',null,array('label'=>'form.numeroClient','translation_domain'=>'FOSUserBundle'));
        */
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }
}