<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Apprenant;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ApprenantFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
    

$faker= Factory::create();

        $password="apprenant";
        $admin=new Apprenant();
        $password = $this->encoder->encodePassword($admin, $password);
        $admin->setPrenom($faker->lastname);
        $admin->setNom($faker->name);
        $admin->setPassword($password);
        $admin->setUsername($faker->username);
        $admin->setTelephone($faker->phoneNumber);
        $admin->setAdresse($faker->address);
        $admin->setProfil($this->getReference("apprenant"));


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