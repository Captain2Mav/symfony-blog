<?php

namespace App\DataFixtures;

use App\Entity\User;
use DateTimeImmutable;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class SuperAdminFixtures extends Fixture
{

    private ?UserPasswordHasherInterface $passwordHasher = null;

    public function __construct(
        UserPasswordHasherInterface $passwordHasher
    ) {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
   
    {
         $superAdmin = $this->createSuperAdmin();
       
        $manager->persist($superAdmin);
        $manager->flush();
    }


    /**
     * Cette fonction permet de créer le super administrateur 
     *
     * @return User
     */
    private function createSuperAdmin(): User {
        $superAdmin = new User();

        $superAdmin->setFirstName("Jean");
        $superAdmin->setLastName("Dupont");
        $superAdmin->setEmail("medecine-du-monde@gmail.com");
        $superAdmin->setRoles(['ROLE_SUPER_ADMIN', 'ROLE_ADMIN', 'ROLE_USER']);
        $superAdmin->setIsVerified(true);

        $passwordHashed = $this->passwordHasher->hashPassword($superAdmin, "azerty1234A*");
        $superAdmin->setPassword($passwordHashed);

        $superAdmin->setCreatedAt(new DateTimeImmutable());
        $superAdmin->setUpdatedAt(new DateTimeImmutable());
        $superAdmin->setVerifiedAt(new DateTimeImmutable());

        return $superAdmin;
    }
}
