<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Personne;

class PersonneFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
    	$noms = ["Elisabeth", "Maria", "Jack", "John", "Fred", "Clara", "Brad"];

        for ($i = 1; $i <= 100; $i++) {
    		$nom = $noms[array_rand($noms)];
        	$character = new Personne($i, $nom);
        	$manager->persist($character);
        }

        $manager->flush();
    }
}
