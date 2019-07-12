<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail("umaril20@hotmail.fr");
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            '123'
        ));
        $manager->persist($user);

        $user = new User();
        $user->setEmail("umaril2@hotmail.fr");
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            '123'
        ));
        $roles[] = 'ROLE_ADMIN';
        $user->setRoles($roles);
        $manager->persist($user);


        $manager->flush();
    }
}
