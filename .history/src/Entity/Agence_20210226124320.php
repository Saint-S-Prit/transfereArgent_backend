<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\AgenceRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=AgenceRepository::class)
 *  @ApiResource()
 */
class Agence
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * Groups({"caissier_read"})
     */
    private $nomComplet;

    /**
     * @ORM\Column(type="datetime")
     * Groups({"caissier_read"})
     */
    private $creatAt;

    /**
     * @ORM\Column(type="string", length=255)
     * Groups({"caissier_read"})
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     * Groups({"caissier_read"})
     */
    private $adresse;

    /**
     * @ORM\Column(type="float")
     * Groups({"caissier_read"})
     */
    private $lattitude;

    /**
     * @ORM\Column(type="float")
     * Groups({"caissier_read"})
     */
    private $lonitude;

    /**
     * @ORM\OneToMany(targetEntity=UserAgence::class, mappedBy="agence")
     * Groups({"caissier_read"})
     */
    private $userAgences;

    public function __construct()
    {
        $this->userAgences = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomComplet(): ?string
    {
        return $this->nomComplet;
    }

    public function setNomComplet(string $nomComplet): self
    {
        $this->nomComplet = $nomComplet;

        return $this;
    }

    public function getCreatAt(): ?\DateTimeInterface
    {
        return $this->creatAt;
    }

    public function setCreatAt(\DateTimeInterface $creatAt): self
    {
        $this->creatAt = $creatAt;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getLattitude(): ?float
    {
        return $this->lattitude;
    }

    public function setLattitude(float $lattitude): self
    {
        $this->lattitude = $lattitude;

        return $this;
    }

    public function getLonitude(): ?float
    {
        return $this->lonitude;
    }

    public function setLonitude(float $lonitude): self
    {
        $this->lonitude = $lonitude;

        return $this;
    }

    /**
     * @return Collection|UserAgence[]
     */
    public function getUserAgences(): Collection
    {
        return $this->userAgences;
    }

    public function addUserAgence(UserAgence $userAgence): self
    {
        if (!$this->userAgences->contains($userAgence)) {
            $this->userAgences[] = $userAgence;
            $userAgence->setAgence($this);
        }

        return $this;
    }

    public function removeUserAgence(UserAgence $userAgence): self
    {
        if ($this->userAgences->removeElement($userAgence)) {
            // set the owning side to null (unless already changed)
            if ($userAgence->getAgence() === $this) {
                $userAgence->setAgence(null);
            }
        }

        return $this;
    }
}
