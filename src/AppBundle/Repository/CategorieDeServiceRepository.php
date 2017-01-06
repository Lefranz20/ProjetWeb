<?php

namespace AppBundle\Repository;

/**
 * CategorieDeServiceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategorieDeServiceRepository extends \Doctrine\ORM\EntityRepository
{
    public function findPrestataireByServices($service) // cherche les prestataires proposant le service passé en parametre
    {
        $qb = $this->createQueryBuilder('s')
            ->where('s.nom = :nom')
            ->leftJoin('s.prestataire','p')
            ->addSelect('p')
            ->setParameter('nom',Trim($service));
        return $qb
            ->getQuery()
            ->getResult();

    }
    function findByprestataire($prestataire){

        $qb = $this->createQueryBuilder('c');
           $qb ->innerJoin('c.prestataire', 'p','WITH','p.pretataireSlug =:pSlug')
                ->addSelect('p')
                ->setParameter('pSlug', $prestataire);
          return $qb
                ->getQuery()
                ->getResult();

    }

}
