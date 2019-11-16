<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Serializer;
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

    $encoders = [new XmlEncoder(), new JsonEncoder()];
    $normalizers = [new ObjectNormalizer()];

    $serializer = new Serializer($normalizers, $encoders);

    // Récupère le répertoire (Relation) correspondant à l'entité Prenom
    $repo = $this->getDoctrine()->getRepository(Personne::class);

    // Récupère le tuple grâce à l'id de la requête
    $personne = $repo->find($id);

    $jsonContent = $serializer->serialize($personne, 'json');

    // Renvoie les attributs au format JSON
    return new Response($jsonContent);
  }
}
