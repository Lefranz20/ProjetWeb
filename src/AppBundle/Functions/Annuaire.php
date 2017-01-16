<?php

namespace AppBundle\Functions;


use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Csrf\TokenStorage\TokenStorageInterface;

class  Annuaire {

    /**
     * @var TokenStorage
     */
    private $token;

    function __construct(TokenStorage $t){
        $this->token = $t;
    }
    public function RetrieveSlug ($typeUser)
    {
        if (null === $token = $this->token->getToken()) {
            return;
        }

        if (!is_object($user = $token->getUser())) {
            // e.g. anonymous authentication
            return;
        }
        if($user->getUtilisateurs()->getTypeUtilisateur()=== $typeUser)
        {
            return $user->getUtilisateurs()->getPrestataire()->getPretataireSlug();
        }
        if($user->getUtilisateurs()->getTypeUtilisateur()=== $typeUser)
        {
            return $user->getUtilisateurs()->getInternautes()->getInternauteSlug();
        }

    }

} 