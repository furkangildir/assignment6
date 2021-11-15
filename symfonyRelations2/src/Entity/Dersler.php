<?php

namespace App\Entity;

use App\Repository\DerslerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DerslerRepository::class)
 */
class Dersler
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
    private $dersAdi;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dersKodu;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dersAciklamasi;

    /**
     * @ORM\ManyToOne(targetEntity=Akademisyenler::class, inversedBy="derslers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $akademisyenId;

    /**
     * @ORM\ManyToOne(targetEntity=Ogrenciler::class, inversedBy="derslers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ogrenciId;

   
  

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDersAdi(): ?string
    {
        return $this->dersAdi;
    }

    public function setDersAdi(string $dersAdi): self
    {
        $this->dersAdi = $dersAdi;

        return $this;
    }

    public function getDersKodu(): ?string
    {
        return $this->dersKodu;
    }

    public function setDersKodu(string $dersKodu): self
    {
        $this->dersKodu = $dersKodu;

        return $this;
    }

    public function getDersAciklamasi(): ?string
    {
        return $this->dersAciklamasi;
    }

    public function setDersAciklamasi(string $dersAciklamasi): self
    {
        $this->dersAciklamasi = $dersAciklamasi;

        return $this;
    }

    public function getAkademisyenId(): ?Akademisyenler
    {
        return $this->akademisyenId;
    }

    public function setAkademisyenId(?Akademisyenler $akademisyenId): self
    {
        $this->akademisyenId = $akademisyenId;

        return $this;
    }

    public function getOgrenciId(): ?Ogrenciler
    {
        return $this->ogrenciId;
    }

    public function setOgrenciId(?Ogrenciler $ogrenciId): self
    {
        $this->ogrenciId = $ogrenciId;

        return $this;
    }

   

    
}
