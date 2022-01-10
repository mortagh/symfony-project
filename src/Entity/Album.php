<?php

namespace App\Entity;

use App\Repository\AlbumRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AlbumRepository::class)
 * @ORM\HasLifecycleCallbacks()
 * 
 */
class Album
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
    private $nom;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=Artiste::class, inversedBy="album")
     * @ORM\JoinColumn(nullable=false)
     */
    private $artiste;

    /**
     * @ORM\OneToMany(targetEntity=Musique::class, mappedBy="album")
     */
    private $musique;

    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue(): void
    {
        $this->date = new \DateTimeImmutable();
    }
    
    public function __construct()
    {
        $this->musique = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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


    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getArtiste(): ?Artiste
    {
        return $this->artiste;
    }

    public function setArtiste(?Artiste $artiste): self
    {
        $this->artiste = $artiste;

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
            $musique->setAlbum($this);
        }

        return $this;
    }

    public function removeMusique(Musique $musique): self
    {
        if ($this->musique->removeElement($musique)) {
            // set the owning side to null (unless already changed)
            if ($musique->getAlbum() === $this) {
                $musique->setAlbum(null);
            }
        }

        return $this;
    }
    public function __toString(){
        return $this->nom;
    }
}
