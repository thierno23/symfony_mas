<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Admin;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminFixtures extends Fixture implements DependentFixtureInterface 
{
    public function load(ObjectManager $manager)
    {
    

$faker= Factory::create();

        $password="admin";
        $admin=new Admin();
        $password = $this->encoder->encodePassword($admin, $password);
        $admin->setPrenom($faker->lastname);
        $admin->setNom($faker->name);
        $admin->setPassword($password);
        $admin->setUsername($faker->username);
        $admin->setTelephone($faker->phoneNumber);
        $admin->setAdresse($faker->address);

        $admin->setProfil($this->getReference("admin"));
        $manager->persist($admin);
        $manager->flush();
    }
    
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function getDependencies () {
        return array(ProfilFixtures::class);
    }
}

