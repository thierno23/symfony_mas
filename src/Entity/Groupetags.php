<?php

namespace App\Entity;

use App\Repository\GroupetagsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=GroupetagsRepository::class)
 * @ApiResource(
 * routePrefix="/admin",
 * attributes={"security"="is_granted('ROLE_ADMIN')","security_message"="L'acces n'est autorisé"})
 */
class Groupetags
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Tags::class, inversedBy="groupetags")
     */
    private $libelle;

    public function __construct()
    {
        $this->libelle = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Tags[]
     */
    public function getLibelle(): Collection
    {
        return $this->libelle;
    }

    public function addLibelle(Tags $libelle): self
    {
        if (!$this->libelle->contains($libelle)) {
            $this->libelle[] = $libelle;
        }

        return $this;
    }

    public function removeLibelle(Tags $libelle): self
    {
        $this->libelle->removeElement($libelle);

        return $this;
    }
}
