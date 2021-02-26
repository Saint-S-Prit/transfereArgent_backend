<?php

namespace App\DataFixtures;

use App\Entity\AdminAgence;
use Faker\Factory;
use App\Entity\Profil;
use App\Entity\AdminSysteme;
use App\Entity\Caissier;
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


        $profils = ['admin_systeme', 'caissier', 'admin_agence', 'user_agence'];

        for ($i = 0; $i < count($profils); $i++) {
            $profil = new Profil();
            $profil
                ->setLibelle($profils[$i]);
            $manager->persist($profil);
        }
        $manager->flush();

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
            ->setProfil($profil->getId(1))
            ->setTelephone($faker->phoneNumber);
        $manager->persist($adminSysteme);
        $manager->flush();


        for ($i = 0; $i < 4; $i++) {
            # code...
        }
        $manager->flush();

        $adminagence = new AdminAgence();
        $hash = $this->encoder->encodePassword($adminagence, 'password');
        $adminagence
            ->setPrenom($faker->firstName())
            ->setNom($faker->lastName)
            ->setAdresse($faker->city)
            ->setEmail($faker->email)
            ->setCin($faker->creditCardNumber)
            ->setDateNaiss('22/07/1993')
            ->setPassword($hash)
            ->setProfil($profil->getId(3))
            ->setTelephone($faker->phoneNumber);
        $manager->persist($adminagence);
        $manager->flush();
    }
}
