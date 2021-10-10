<?php /** @noinspection PhpMissingFieldTypeInspection */

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProjectRepository;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
#[ApiResource]
class Project
{
    /** @var int The unique id of the project. */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    /** @var string The name of the project. */
    #[ORM\Column(type: 'string', length: 120)]
    #[Assert\NotBlank]
    #[Assert\Length(max: 120, maxMessage: 'Project name can be up to {{ limit }} characters long')]
    private $name;

    #[ORM\Column(type: 'date_immutable', nullable: true)]
    #[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
    private ?DateTimeImmutable $starts;

    #[ORM\Column(type: 'date_immutable', nullable: true)]
    #[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
    private $ends;


    public function getId(): ?int
    {
        return $this->id;
    }


    public function getName(): ?string
    {
        return $this->name;
    }


    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }


    public function getStarts(): ?DateTimeImmutable
    {
        return $this->starts;
    }


    public function setStarts(?DateTimeImmutable $starts): self
    {
        $this->starts = $starts;

        return $this;
    }


    public function getEnds(): ?DateTimeImmutable
    {
        return $this->ends;
    }


    public function setEnds(?DateTimeImmutable $ends): self
    {
        $this->ends = $ends;

        return $this;
    }
}
