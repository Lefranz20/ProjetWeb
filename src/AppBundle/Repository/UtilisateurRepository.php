<?php

namespace AppBundle\Repository;
use Doctrine\ORM\EntityRepository;


class UtilisateurRepository extends EntityRepository
{
    public function search($typeUser){
        $qb = $this->createQueryBuilder('u');
        $qb->where('u.typeUtilisateur = :t')
            ->leftJoin('u.localites','region')
            ->addSelect('region')
            ->setParameter('t',$typeUser);
        return $qb
            ->getQuery()
            ->getResult();

    }

}
