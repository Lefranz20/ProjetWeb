<?php
namespace AppBundle\DataFixtures\ORM;

use Hautelook\AliceBundle\Doctrine\DataFixtures\AbstractLoader;


class AppFixtures extends AbstractLoader
{
    /**
     * {@inheritDoc}
     */
    public  function getFixtures()
    {
        return  array(
            __DIR__ . '/CodePostal.yml',
            __DIR__ . '/Localite.yml',
            __DIR__ . '/Commune.yml',/*
           __DIR__ . '/Utilisateur.yml',
            __DIR__ . '/Prestataire.yml',
            __DIR__ . '/Internaute.yml',
            __DIR__ . '/Bloc.yml',
            __DIR__ . '/Commentaire.yml',
            __DIR__ . '/Abus.yml',
            __DIR__ . '/CategorieDeService.yml',
            __DIR__ . '/Stage.yml',
            __DIR__ . '/Position.yml',
            __DIR__ . '/Promotion.yml',
            __DIR__ . '/Image.yml',
            __DIR__ . '/Newsletter.yml',*/

        );
    }
}
