<?php

namespace App\Entity;

use App\Repository\MusiqueRepository;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;


/**
 * @ORM\Entity(repositoryClass=MusiqueRepository::class)
 * @ORM\Entity
 * @Vich\Uploadable
 * @ORM\HasLifecycleCallbacks()
 */
class Musique
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
     * @ORM\ManyToOne(targetEntity=Artiste::class, inversedBy="musique")
     * @ORM\JoinColumn(nullable=false)
     */
    private $artiste;

    /**
     * @ORM\ManyToOne(targetEntity=Album::class, inversedBy="musique")
     * @ORM\JoinColumn(nullable=true)
     */
    private $album;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fileM;
    
      /**
     * @Vich\UploadableField(mapping="music_file", fileNameProperty="fileM")
     * @var File
     */
    private $audioFile;


    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue(): void
    {
        $this->date = new \DateTimeImmutable();
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

    public function getAlbum(): ?Album
    {
        return $this->album;
    }

    public function setAlbum(?Album $album): self
    {
        $this->album = $album;

        return $this;
    }
    public function __toString(){
        return $this->nom;
    }


    public function getFileM(): ?string
    {
        return $this->fileM;
    }

    public function setFileM(string $fileM): self
    {
        $this->fileM = $fileM;

        return $this;
    }
    public function setAudioFile(?File $audioFile = null): void
    {
    $this->audioFile = $audioFile;
    if (null !== $audioFile) {
        // It is required that at least one field changes if you are using doctrine
        // otherwise the event listeners won't be called and the file is lost
        $this->updatedAt = new \DateTimeImmutable();
    }
    }

    public function getAudioFile(): ?File
    {
    return $this->audioFile;
    }
}
