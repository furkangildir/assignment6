<?php

namespace App\Entity;

use App\Repository\OgrencilerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OgrencilerRepository::class)
 */
class Ogrenciler
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
    private $ad;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $soyad;

    /**
     * @ORM\Column(type="integer")
     */
    private $ogrenciNo;

    /**
     * @ORM\OneToMany(targetEntity=Dersler::class, mappedBy="ogrenciId", orphanRemoval=true)
     */
    private $derslers;

    public function __construct()
    {
        $this->derslers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAd(): ?string
    {
        return $this->ad;
    }

    public function setAd(string $ad): self
    {
        $this->ad = $ad;

        return $this;
    }

    public function getSoyad(): ?string
    {
        return $this->soyad;
    }

    public function setSoyad(string $soyad): self
    {
        $this->soyad = $soyad;

        return $this;
    }

    public function getOgrenciNo(): ?int
    {
        return $this->ogrenciNo;
    }

    public function setOgrenciNo(int $ogrenciNo): self
    {
        $this->ogrenciNo = $ogrenciNo;

        return $this;
    }

    /**
     * @return Collection|Dersler[]
     */
    public function getDerslers(): Collection
    {
        return $this->derslers;
    }

    public function addDersler(Dersler $dersler): self
    {
        if (!$this->derslers->contains($dersler)) {
            $this->derslers[] = $dersler;
            $dersler->setOgrenciId($this);
        }

        return $this;
    }

    public function removeDersler(Dersler $dersler): self
    {
        if ($this->derslers->removeElement($dersler)) {
            // set the owning side to null (unless already changed)
            if ($dersler->getOgrenciId() === $this) {
                $dersler->setOgrenciId(null);
            }
        }

        return $this;
    }
}
