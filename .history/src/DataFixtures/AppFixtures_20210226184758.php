<?php

namespace App\DataFixtures;

use App\Entity\AdminAgence;
use Faker\Factory;
use App\Entity\Profil;
use App\Entity\AdminSysteme;
use App\Entity\Agence;
use App\Entity\Caissier;
use App\Entity\Compte;
use App\Entity\UserAgence;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;
    public function  __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager)
    {

        $faker = Factory::create('fr_FR');



        $profil = new Profil();
        $profil
            ->setLibelle('admin_systeme');
        $manager->persist($profil);


        $adminSysteme = new AdminSysteme();
        $hash = $this->encoder->encodePassword($adminSysteme, 'password');
        $adminSysteme
            ->setPrenom($faker->firstName())
            ->setNom($faker->lastName)
            ->setAdresse($faker->city)
            ->setEmail($faker->email)
            ->setCin($faker->creditCardNumber)
            ->setDateNaiss('16/07/1993')
            ->setPassword($hash)
            ->setProfil($profil)
            ->setStatus(true)
            ->setTelephone($faker->phoneNumber);
        $manager->persist($adminSysteme);
        $manager->flush();
    }
}
