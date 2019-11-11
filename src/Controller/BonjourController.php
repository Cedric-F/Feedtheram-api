<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class BonjourController extends AbstractController
{
    /**
     * @Route("/info/{nom}", name="bonjour")
     */
    public function index($nom = '')
    {
    	$noms = ['Elisabeth', 'Maria', 'Jack', 'John', 'Fred', 'Clara', 'Brad'];

    	if ($nom == '') {
    		$reponse = 'Bonjour, inconnu.e. Tu seras ' . $noms[array_rand($noms)] . ' .';
    	} elseif ($nom == 'feedtheram') {
    		$reponse = 'Vous êtes bien tombé.e.';
    	} else {
    		$reponse = 'Bonjour ' . $nom . '.';
    	}

    	return new JsonResponse($reponse);
    }
}
