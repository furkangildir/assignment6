<?php

namespace App\Entity;

use App\Repository\AkademisyenlerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AkademisyenlerRepository::class)
 */
class Akademisyenler
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
     * @ORM\Column(type="string", length=255)
     */
    private $uzmanlik;

    /**
     * @ORM\OneToMany(targetEntity=Dersler::class, mappedBy="akademisyenId", orphanRemoval=true)
     */
    private $OgrenciId;

    /**
     * @ORM\OneToMany(targetEntity=Dersler::class, mappedBy="akademisyenId", orphanRemoval=true)
     */
    private $derslers;

    public function __construct()
    {
        $this->OgrenciId = new ArrayCollection();
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

    public function getUzmanlik(): ?string
    {
        return $this->uzmanlik;
    }

    public function setUzmanlik(string $uzmanlik): self
    {
        $this->uzmanlik = $uzmanlik;

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
            $dersler->setAkademisyenId($this);
        }

        return $this;
    }

    public function removeDersler(Dersler $dersler): self
    {
        if ($this->derslers->removeElement($dersler)) {
            // set the owning side to null (unless already changed)
            if ($dersler->getAkademisyenId() === $this) {
                $dersler->setAkademisyenId(null);
            }
        }

        return $this;
    }

   
}
