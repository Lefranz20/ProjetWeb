<?php
namespace AppBundle\DataFixtures\Data;

use Hautelook\AliceBundle\Doctrine\DataFixtures\AbstractLoader;


class AppFixtures extends AbstractLoader
{
    /**
     * {@inheritDoc}
     */
    public  function getFixtures()
    {
        return  array(
            __DIR__ . '/Commune.yml',
            __DIR__ . '/CodePostal.yml',
        );
    }
}
