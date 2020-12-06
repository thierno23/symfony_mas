<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CompetencesRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass=CompetencesRepository::class)
 * @ApiResource(
 * routePrefix="/admin",
 * denormalizationContext={"groups"={"postCompetences"}},
 * attributes={"security"="is_granted('ROLE_ADMIN')","security_message"="L'acces n'est autorisé"}
 * )
 */
class Competences
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"postCompetences","postgroupesCompetences"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"postCompetences","postgroupesCompetences"})
     */
    private $libelle;

    /**
     * @ORM\ManyToMany(targetEntity=GroupesDeCompetences::class, inversedBy="competences",cascade={"persist"})
     * @Groups({"postCompetences"})
     */
    private $grpscompetences;

    /**
     * @ORM\OneToMany(targetEntity=Niveau::class, mappedBy="competences",cascade={"persist"})
     * @Groups({"postCompetences","postgroupesCompetences"})
     */
    private $niveaux;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $complet;

    public function __construct()
    {
        $this->grpscompetences = new ArrayCollection();
        $this->niveaux = new ArrayCollection();
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
     * @return Collection|GroupesDeCompetences[]
     */
    public function getGrpscompetences(): Collection
    {
        return $this->grpscompetences;
    }

    public function addGrpscompetence(GroupesDeCompetences $grpscompetence): self
    {
        if (!$this->grpscompetences->contains($grpscompetence)) {
            $this->grpscompetences[] = $grpscompetence;
        }

        return $this;
    }

    public function removeGrpscompetence(GroupesDeCompetences $grpscompetence): self
    {
        $this->grpscompetences->removeElement($grpscompetence);

        return $this;
    }

    /**
     * @return Collection|Niveau[]
     */
    public function getNiveaux(): Collection
    {
        return $this->niveaux;
    }

    public function addNiveau(Niveau $niveau): self
    {
        if (!$this->niveaux->contains($niveau)) {
            $this->niveaux[] = $niveau;
            $niveau->setCompetences($this);
        }

        return $this;
    }

    public function removeNiveau(Niveau $niveau): self
    {
        if ($this->niveaux->removeElement($niveau)) {
            // set the owning side to null (unless already changed)
            if ($niveau->getCompetences() === $this) {
                $niveau->setCompetences(null);
            }
        }

        return $this;
    }

    public function getComplet(): ?bool
    {
        return $this->complet;
    }

    public function setComplet(?bool $complet): self
    {
        $this->complet = $complet;

        return $this;
    }
}
