<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonneRepository")
 */
class Personne
{
  /**
   * @ORM\Id()
   * @ORM\GeneratedValue()
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $nom;

  /**
   * @ORM\Column(type="integer")
   */
  private $age;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $type;

  /*
   * Constructeur de l'entité Personne.
   * La valeur de ses attributs dépend de la parité de l'id reçu.
   */

  public function __construct($id, $nom) {
    $this->nom = $nom;
    if ($id % 2 == 0) {
        $this->age = random_int(1, 100);
        $this->type = 'Normal.e';
    } else {
        $this->age = random_int(1, 1000);
        $this->type = 'Candidat.e';
    }
  }

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getNom(): ?string
  {
    return $this->nom;
  }

  public function setNom(string $nom): self
  {
    $this->nom = $nom;

    return $this;
  }

  public function getAge(): ?int
  {
    return $this->age;
  }

  public function setAge(int $age): self
  {
    $this->age = $age;

    return $this;
  }

  public function getType(): ?string
  {
    return $this->type;
  }

  public function setType(string $type): self
  {
    $this->type = $type;

    return $this;
  }
}
