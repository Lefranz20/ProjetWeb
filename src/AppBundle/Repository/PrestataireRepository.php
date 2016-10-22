<?php

namespace AppBundle\Repository;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityRepository;

class PrestataireRepository extends EntityRepository
{
    public function findLastPrestataires($qty = 4){
//        $chaine = 'SELECT u.inscription, p.nom, p.web, p.email, p.telephone, i.type_image
//                   FROM AppBundle:Utilisateur u, AppBundle:Prestataire p, AppBundle:Image i WHERE u.id = p.utilisateur_id
//                   and p.id = i.prestataires_id ORDER BY u.inscription DESC LIMIT 0,4;';
//        $manager= $this->getEntityManager();
//        $query= $manager->createQuery($chaine);
//        $resultat = $query->getResult();
//        return $resultat;
        $qb = $this->createQueryBuilder('p');
        $qb->orderBy('p.id', 'DESC');
        $qb->setMaxResults($qty);
        $query = $qb->getQuery();
        $res = $query->getResult();
      return $res;
    }
}
