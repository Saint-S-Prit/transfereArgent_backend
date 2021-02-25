<?php

namespace App\Entity;

use App\Repository\UserAgenceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserAgenceRepository::class)
 */
class UserAgence extends User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}
