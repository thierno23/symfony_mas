<?php

namespace App\Entity;

use App\Repository\ReferentielsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;


/**
 * @ORM\Entity(repositoryClass=ReferentielsRepository::class)
 * @ApiResource(
 * routePrefix="/admin",
 * attributes={"security"="is_granted('ROLE_ADMIN')","security_message"="L'acces n'est autorisé"}
 * )
 */
class Referentiels
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $presentation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $programme;

    

    /**
     * @ORM\ManyToMany(targetEntity=GroupesDeCompetences::class, inversedBy="referentiels")
     */
    private $grpCompetences;

    /**
     * @ORM\ManyToMany(targetEntity=Brief::class, inversedBy="referentiels")
     */
    private $brief;

    /**
     * @ORM\OneToMany(targetEntity=Promo::class, mappedBy="referentiels")
     */
    private $promo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $critereDevaluation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $critereDadmission;

    public function __construct()
    {
        $this->grpCompetences = new ArrayCollection();
        $this->brief = new ArrayCollection();
        $this->promo = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getPresentation(): ?string
    {
        return $this->presentation;
    }

    public function setPresentation(string $presentation): self
    {
        $this->presentation = $presentation;

        return $this;
    }

    public function getProgramme(): ?string
    {
        return $this->programme;
    }

    public function setProgramme(string $programme): self
    {
        $this->programme = $programme;

        return $this;
    }

    

    /**
     * @return Collection|GroupesDeCompetences[]
     */
    public function getGrpCompetences(): Collection
    {
        return $this->grpCompetences;
    }

    public function addGrpCompetence(GroupesDeCompetences $grpCompetence): self
    {
        if (!$this->grpCompetences->contains($grpCompetence)) {
            $this->grpCompetences[] = $grpCompetence;
        }

        return $this;
    }

    public function removeGrpCompetence(GroupesDeCompetences $grpCompetence): self
    {
        $this->grpCompetences->removeElement($grpCompetence);

        return $this;
    }

    /**
     * @return Collection|Brief[]
     */
    public function getBrief(): Collection
    {
        return $this->brief;
    }

    public function addBrief(Brief $brief): self
    {
        if (!$this->brief->contains($brief)) {
            $this->brief[] = $brief;
        }

        return $this;
    }

    public function removeBrief(Brief $brief): self
    {
        $this->brief->removeElement($brief);

        return $this;
    }

    /**
     * @return Collection|Promo[]
     */
    public function getPromo(): Collection
    {
        return $this->promo;
    }

    public function addPromo(Promo $promo): self
    {
        if (!$this->promo->contains($promo)) {
            $this->promo[] = $promo;
            $promo->setReferentiels($this);
        }

        return $this;
    }

    public function removePromo(Promo $promo): self
    {
        if ($this->promo->removeElement($promo)) {
            // set the owning side to null (unless already changed)
            if ($promo->getReferentiels() === $this) {
                $promo->setReferentiels(null);
            }
        }

        return $this;
    }

    public function getCritereDevaluation(): ?string
    {
        return $this->critereDevaluation;
    }

    public function setCritereDevaluation(string $critereDevaluation): self
    {
        $this->critereDevaluation = $critereDevaluation;

        return $this;
    }

    public function getCritereDadmission(): ?string
    {
        return $this->critereDadmission;
    }

    public function setCritereDadmission(string $critereDadmission): self
    {
        $this->critereDadmission = $critereDadmission;

        return $this;
    }
}
