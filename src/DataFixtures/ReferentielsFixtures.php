<?php

namespace App\DataFixtures;

use App\Entity\Profil;
use App\Entity\Referentiels;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ReferentielsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
   
  $referentiels=[
      ["presentation"=>"dev",
      "programme"=>"developpement web & mobile",
      "critereDevaluation"=>"competences acquises" ,
      "critereDadmission"=>"par niveau" 
      ] 
      ,

      ["presentation"=>"ref",
      "programme"=>"developpement web & mobile",
      "critereDevaluation"=>"competences acquises" ,
      "critereDadmission"=>"par niveau" 
      ] 
  ] ; 
  foreach ($referentiels as $ref) {
    $referentiels=new Referentiels();
    foreach ($ref as $key => $value) {
    $referentiels->setPresentation($ref["presentation"]);
    $referentiels->setProgramme($ref["programme"]);
    $referentiels->setCritereDevaluation($ref["critereDevaluation"]);
    $referentiels->setCritereDadmission($ref["critereDadmission"]);
    
    }
    $manager->persist($referentiels);
}

$manager->flush();

    }
}
