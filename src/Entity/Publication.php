<?php

namespace App\Entity;

use App\Repository\PublicationRepository;
use Doctrine\ORM\Mapping as ORM;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Annotations as OA;
use App\Entity\Category;
use App\Entity\Apprentice;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\Ignore;

/**
 * @ORM\Entity(repositoryClass=PublicationRepository::class)
 */
class Publication
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @OA\Property(type="integer")
     * @Groups({"publications", "incidences", "feedbacks"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @OA\Property(type="string", maxLength=255)
     * @Groups({"publications", "incidences", "feedbacks"})
     */
    private $title;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class)
     * @ORM\JoinColumn(nullable=false)
     * @OA\Property(ref=@Model(type=Category::class))
     * @Groups({"publications", "incidences", "feedbacks"})
     */
    private $category;

    /**
     * @ORM\Column(type="text")
     * @OA\Property(type="string")
     * @Groups({"publications", "incidences", "feedbacks"})
     */
    private $description;

    /**
     * @ORM\Column(type="array", nullable=true)
     * @OA\Property(type="array", @OA\Items(type="string"))
     * @Groups({"publications", "incidences"})
     */
    private $tags = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     * @OA\Property(type="array", @OA\Items(type="string"))
     * @Groups({"publications", "incidences"})
     */
    private $video = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     * @OA\Property(type="array", @OA\Items(type="string"))
     * @Groups({"publications", "incidences"})
     */
    private $document = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     * @OA\Property(type="array", @OA\Items(type="string"))
     * @Groups({"publications", "incidences"})
     */
    private $images = [];

    /**
     * @ORM\ManyToOne(targetEntity=Apprentice::class, inversedBy="publications")
     * @ORM\JoinColumn(nullable=true)
     * @OA\Property(ref=@Model(type=Apprentice::class))
     * @Groups({"publications", "incidences", "feedbacks"})
     */
    private $apprentice;

    /**
     * @ORM\Column(type="datetime")
     * @OA\Property(type="datetime")
     * @Groups({"publications", "incidences"})
     */
    private $date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTags(): ?array
    {
        return $this->tags;
    }

    public function setTags(?array $tags): self
    {
        $this->tags = $tags;

        return $this;
    }

    public function getVideo(): ?array
    {
        return $this->video;
    }

    public function setVideo(?array $video): self
    {
        $this->video = $video;

        return $this;
    }

    public function getDocument(): ?array
    {
        return $this->document;
    }

    public function setDocument(?array $document): self
    {
        $this->document = $document;

        return $this;
    }

    public function getImages(): ?array
    {
        return $this->images;
    }

    public function setImages(?array $images): self
    {
        $this->images = $images;

        return $this;
    }

    public function getApprentice(): ?Apprentice
    {
        return $this->apprentice;
    }

    public function setApprentice(?Apprentice $apprentice): self
    {
        $this->apprentice = $apprentice;

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
}
