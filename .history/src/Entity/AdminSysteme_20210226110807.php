<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\AdminSystemeRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=AdminSystemeRepository::class)
 *  @ApiResource()
 */
class AdminSysteme extends User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;



    public function __construct()
    {
        $this->caissiers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
