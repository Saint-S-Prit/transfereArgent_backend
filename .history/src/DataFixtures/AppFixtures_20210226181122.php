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
        }
        $manager->flush();
    }
}
