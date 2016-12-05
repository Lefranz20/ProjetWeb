<?php

namespace AppBundle\Repository;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityRepository;
use AppBundle\Repository\UtilisateurRepository;

class PrestataireRepository extends EntityRepository
{
    public function findLastPrestataires($qty = 4){
        $qb = $this->createQueryBuilder('p');
        $qb->orderBy('p.dateInscription', 'DESC');
        $qb->setMaxResults($qty);
        return $qb
            ->getQuery()
            ->getResult();
    }

    public function FindByService($prestataire = null){
        $qb = $this->createQueryBuilder('p');

        if($prestataire === null){
            $qb  ->leftJoin('p.utilisateur','u')
                ->addSelect('u');
            return $qb
                ->getQuery()
                ->getResult();
        }
        if($prestataire){
            $qb ->where('p.nomEntreprise = :nom')
                ->leftJoin('p.categorieService','categ')
                ->addSelect('categ')
                ->setParameter('nom',Trim($prestataire));
            return $qb
                ->getQuery()
                ->getArrayResult();

        }

    }

}
