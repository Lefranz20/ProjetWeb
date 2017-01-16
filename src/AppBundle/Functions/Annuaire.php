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
    public function RetrieveSlug ()
    {
        if (null === $token = $this->token->getToken()) {
            return;
        }

        if (!is_object($user = $token->getUser())) {
            // e.g. anonymous authentication
            return;
        }

        return $user->getUtilisateurs()->getPrestataire()->getPretataireSlug();
    }

} 