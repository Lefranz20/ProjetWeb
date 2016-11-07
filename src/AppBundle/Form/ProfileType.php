<?php


namespace AppBundle\Form;
use AppBundle\Form\UtilisateurType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;


class ProfileType extends AbstractType
{
    public function buildUserForm(FormBuilderInterface $builder, array $options)
    {

       $builder ->add('username_canonical');

    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\ProfileFormType';
    }

    public function getName()
    {
        return 'app_user_profile';
    }
}