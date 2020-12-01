<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TagsRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass=TagsRepository::class)
 * @ApiResource(
 * routePrefix="/admin",
 * attributes={"security"="is_granted('ROLE_ADMIN')","security_message"="L'acces n'est autorisé"})
 */
class Tags
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"Grpstags:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"Grpstags:read"})
     */
    private $libelle;

    /**
     * @ORM\ManyToMany(targetEntity=Groupetags::class, mappedBy="tag")
     */
    private $groupetags;

    public function __construct()
    {
        $this->groupetags = new ArrayCollection();
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }
    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }
    /**
     * @return Collection|Groupetags[]
     */
    public function getGroupetags(): Collection
    {
        return $this->groupetags;
    }

    public function addGroupetag(Groupetags $groupetag): self
    {
        if (!$this->groupetags->contains($groupetag)) {
            $this->groupetags[] = $groupetag;
            $groupetag->addTag($this);
        }

        return $this;
    }

    public function removeGroupetag(Groupetags $groupetag): self
    {
        if ($this->groupetags->removeElement($groupetag)) {
            $groupetag->removeTag($this);
        }

        return $this;
    }

    
}
