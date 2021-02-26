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


        $profils = ['admin_systeme', 'caissier', 'admin_agence', 'user_agence'];

        for ($i = 0; $i < count($profils); $i++) {
            $profil = new Profil();
            $profil
                ->setLibelle($profils[$i]);
            $manager->persist($profil);








            if ($profil->getLibelle() == "admin_systeme") {

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
            }

            if ($profil->getLibelle() == "caissier") {

                $caissier = new Caissier();
                $hash = $this->encoder->encodePassword($caissier, 'password');
                $caissier
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
                $manager->persist($caissier);
            }

            if ($profil->getLibelle() == "admin_agence") {

                $admin_agence = new AdminAgence();
                $hash = $this->encoder->encodePassword($admin_agence, 'password');
                $admin_agence
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
                $manager->persist($admin_agence);
            }



            if ($profil->getLibelle() == "user_agence") {

                $user_agence = new UserAgence();
                $hash = $this->encoder->encodePassword($user_agence, 'password');
                $user_agence
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
                $manager->persist($user_agence);



                $agence = new Agence();
                $agence
                    ->setAdresse($faker->city)
                    ->setLattitude($faker->latitude)
                    ->setLonitude($faker->longitude)
                    ->setNomComplet($faker->firstName());
                $manager->persist($agence);

                $compte = new Compte();
                $compte
                    ->setNumeroCompte($faker->numberBetween(23, 8757456))
                    ->setSolde($faker->numberBetween(500000))
                    ->setAgence($agence)
                    ->setCaissier($caissier);
                $manager->persist($compte);
            }
        }
        $manager->flush();
    }
}
