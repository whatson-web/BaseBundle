<?php
// src/WH/UserBundle/DataFixtures/ORM/LoadUser.php

namespace APP\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use APP\UserBundle\Entity\User;

class LoadUser implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // Les noms d'utilisateurs à créer
        $listNames = array('jerome@whatson-web.com');

        foreach ($listNames as $name) {
            // On crée l'utilisateur
            $user = new User;

            // Le nom d'utilisateur et le mot de passe sont identiques
            $user->setEmail($name);
            $user->setPlainPassword('admin');
            $user->setEnabled(true);

            // On définit uniquement le role ROLE_USER qui est le role de base
            $user->setRoles(array('ROLE_SUPER_ADMIN'));

            // On le persiste
            $manager->persist($user);
        }

        // On déclenche l'enregistrement
        $manager->flush();
    }
}