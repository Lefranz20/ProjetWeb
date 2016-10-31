<?php

namespace AppBundle\Repository;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityRepository;

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

}
