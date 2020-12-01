<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\GroupetagsRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=GroupetagsRepository::class)
 * @ApiResource(
 *  routePrefix="/admin",
 *  collectionOperations={
 *      "get_grptags"={
 *         "method"="GET",
 *         "path"="/groupetags",
 *          "normalization_context" = {"groups" = {"Grpstags:read"}}
 *      },
 *      "add_Grptag"={
 *          "method"="post", 
 *          "path"="/groupetags",
 *          "name" ="add_groupe_tags"
 *      }
 *  }
 * )
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
     * @ORM\Column(type="string", length=255)
     * @Groups({"Grpstags:read"})
     */
    private $libelle;

    /**
     * @ORM\ManyToMany(targetEntity=Tags::class, inversedBy="groupetags")
     * @Groups({"Grpstags:read"})
     */
    private $tag;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __construct()
    {
        $this->tag = new ArrayCollection();
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
     * @return Collection|Tags[]
     */
    public function getTag(): Collection
    {
        return $this->tag;
    }

    public function addTag(Tags $tag): self
    {
        if (!$this->tag->contains($tag)) {
            $this->tag[] = $tag;
        }

        return $this;
    }

    public function removeTag(Tags $tag): self
    {
        $this->tag->removeElement($tag);

        return $this;
    }

    
}
