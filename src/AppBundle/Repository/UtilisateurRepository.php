<?php

namespace AppBundle\Repository;
use Doctrine\ORM\EntityRepository;


class UtilisateurRepository extends EntityRepository
{
    public function FindUserByLocalite( $userType, $localite )
    {
        $qb = $this->createQueryBuilder('u');
        $qb->where('u.typeUtilisateur = :typeUser')
            ->innerJoin('u.localite','l','WITH','l.localiteNom = :localite')
            ->leftJoin('u.prestataire','p')
            ->addSelect('p')
            ->addSelect('l')
            ->setParameters(array('typeUser'=>Trim($userType),'localite' =>Trim($localite)));
            //->setParameter();
        return $qb
            ->getQuery()
            ->getResult();
           // ->getArrayResult();



    }
}
