<?php

namespace App\Entity;

use App\Repository\ArtisteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArtisteRepository::class)
 */
class Artiste
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $info;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=Album::class, mappedBy="artiste")
     */
    private $album;

    /**
     * @ORM\OneToMany(targetEntity=Musique::class, mappedBy="artiste")
     */
    private $musique;

    public function __construct()
    {
        $this->album = new ArrayCollection();
        $this->musique = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInfo(): ?string
    {
        return $this->info;
    }

    public function setInfo(string $info): self
    {
        $this->info = $info;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|Album[]
     */
    public function getAlbum(): Collection
    {
        return $this->album;
    }

    public function addAlbum(Album $album): self
    {
        if (!$this->album->contains($album)) {
            $this->album[] = $album;
            $album->setArtiste($this);
        }

        return $this;
    }

    public function removeAlbum(Album $album): self
    {
        if ($this->album->removeElement($album)) {
            // set the owning side to null (unless already changed)
            if ($album->getArtiste() === $this) {
                $album->setArtiste(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Musique[]
     */
    public function getMusique(): Collection
    {
        return $this->musique;
    }

    public function addMusique(Musique $musique): self
    {
        if (!$this->musique->contains($musique)) {
            $this->musique[] = $musique;
            $musique->setArtiste($this);
        }

        return $this;
    }

    public function removeMusique(Musique $musique): self
    {
        if ($this->musique->removeElement($musique)) {
            // set the owning side to null (unless already changed)
            if ($musique->getArtiste() === $this) {
                $musique->setArtiste(null);
            }
        }

        return $this;
    }
}
