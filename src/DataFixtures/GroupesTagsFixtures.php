<?php

namespace App\DataFixtures;

use App\Entity\Profil;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GroupesTagsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
  
        
        $manager->flush();
        
    }
}
