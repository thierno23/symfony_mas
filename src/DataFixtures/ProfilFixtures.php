<?php

namespace App\DataFixtures;

use App\Entity\Profil;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProfilFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
  
        $les_profiles=["ADMIN","FORMATEUR","CM","APPRENANT"];

        foreach ($les_profiles as $leProfile) {
            $profil=new Profil();
            $profil->setLibelle($leProfile);
            $profil->setCode(0);
            $manager->persist($profil);

            if ($leProfile=="ADMIN") {
                $this->setReference("admin",$profil);

            }else if ($leProfile=="FORMATEUR") {
                $this->setReference("formateur",$profil);
            }
            else if ($leProfile=="CM") {
                $this->setReference("cm",$profil);
            }
            else if ($leProfile=="APPRENANT") {
                $this->setReference("apprenant",$profil);
            }
        }
        
        $manager->flush();
        
    }
}
