<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Hautelook\AliceBundle\Alice\DataFixtureLoader;
use Nelmio\Alice\Fixtures;
class AppFixtures extends DataFixtureLoader
{
    public function load(ObjectManager $om)
    {
        Fixtures::load(__DIR__.'/fixtures.yml', $om, array('providers' => array($this)));
    }
    public function categoryName()
    {
        $names = array(
            'Brandname products',
            'Architectural',
            'Art',
            'Books, magazines, and paper',
            'Coins, currency, stamps',
            'Film and television',
            'Music',
            'Sports',
            'Nature',
            'Technology',
        );
        return $names[array_rand($names)];
    }
    public function tagName()
    {
        $names = array(
            '10 for 1 dollar',
            'freebie',
            'to trash',
            'monocle-style',
            'gift',
        );
        return $names[array_rand($names)];
    }
    protected function getFixtures()
    {
        return  array(
            __DIR__ . '/fixtures.yml',
        );
    }
}