<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Personne;

class PersonneController extends AbstractController
{
    /**
     * @Route("/Character/{id}", name="personne")
     */
    public function index($id = 1)
    {
    	$repo = $this->getDoctrine()->getRepository(Personne::class);

    	$personne = $repo->find($id);

    	return new Response(json_encode([
                    "nom" => $personne->getNom(),
                    "age" => $personne->getAge(),
                    "type" => $personne->getType()
                ]));
    }
}
