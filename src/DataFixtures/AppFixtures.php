<?php

namespace App\DataFixtures;

use App\Entity\Role;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{

    private $encoder;
    
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager)
    {
        $Supadmin = new Role();
        $Supadmin->setlibelle("Supadmin");
        $manager->persist($Supadmin);

        $admin = new Role();
        $admin->setlibelle("admin");
        $manager->persist($admin);

        $caissier = new Role();
        $caissier->setlibelle("caissier");
        $manager->persist($caissier);

       

        $this->addReference('Supadmin',$Supadmin);
        $this->addReference('admin',$admin);
        $this->addReference('caissier',$caissier);

        $Supadmin=$this->getReference('Supadmin');
        $admin=$this->getReference('admin');
        $caissier=$this->getReference('caissier');

            $user = new User();
            $user->setrole($Supadmin)
                 ->setusername("Adminsystem")
                 ->setroles(["Supadmin","admin","caissier"])
                 ->setPassword($this->encoder->encodePassword($user, "role1234"))
                 ->setIsactif("true")
                 ->setnomcomplet("Abdou Fall");

                 $manager->persist($user);
                 $manager->flush();
    }
}
