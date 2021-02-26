<?php

namespace App\Entity;

use App\Repository\AdminSystemeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

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
