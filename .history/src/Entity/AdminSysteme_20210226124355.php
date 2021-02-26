<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\AdminSystemeRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=AdminSystemeRepository::class)
 *  @ApiResource(
 * normalizationContext={"groups"={"admin_systeme_read"}},
 * )
 */
class AdminSysteme extends User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * Groups({"admin_systeme_read",{"caissier_read"}})
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
