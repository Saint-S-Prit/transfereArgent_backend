<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TransactionRepository;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=TransactionRepository::class)
 *  @ApiResource()
 */
class Transaction
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $codeTransaction;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDepot;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateRetrait;

    /**
     * @ORM\Column(type="integer")
     */
    private $montant;

    /**
     * @ORM\Column(type="integer")
     */
    private $frais;

    /**
     * @ORM\ManyToOne(targetEntity=UserAgence::class, inversedBy="transactions")
     */
    private $userAgence;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeTransaction(): ?string
    {
        return $this->codeTransaction;
    }

    public function setCodeTransaction(string $codeTransaction): self
    {
        $this->codeTransaction = $codeTransaction;

        return $this;
    }

    public function getDateDepot(): ?\DateTimeInterface
    {
        return $this->dateDepot;
    }

    public function setDateDepot(\DateTimeInterface $dateDepot): self
    {
        $this->dateDepot = $dateDepot;

        return $this;
    }

    public function getDateRetrait(): ?\DateTimeInterface
    {
        return $this->dateRetrait;
    }

    public function setDateRetrait(\DateTimeInterface $dateRetrait): self
    {
        $this->dateRetrait = $dateRetrait;

        return $this;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getFrais(): ?int
    {
        return $this->frais;
    }

    public function setFrais(int $frais): self
    {
        $this->frais = $frais;

        return $this;
    }

    public function getUserAgence(): ?UserAgence
    {
        return $this->userAgence;
    }

    public function setUserAgence(?UserAgence $userAgence): self
    {
        $this->userAgence = $userAgence;

        return $this;
    }
}
