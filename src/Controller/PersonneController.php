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
  public function index($id = 1) // En cas d'absence d'id, il prend la valeur 1
  {

    // Récupère le répertoire (Relation) de l'éntité Prenom
    $repo = $this->getDoctrine()->getRepository(Personne::class);

    // Récupère le tuple grâce à l'id de la requête
    $personne = $repo->find($id);

    // Renvoie les attributs au format JSON
    return new Response(json_encode([
                  "nom" => $personne->getNom(),
                  "age" => $personne->getAge(),
                  "type" => $personne->getType()
              ]));
  }
}
