<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Post;
use App\Dto\GreetingOverviewDto;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This is a dummy entity. Remove it!
 */
#[ApiResource(
    normalizationContext: ['groups' => ['Simple']],
    operations: [
        new Get(
            // Custom Provider here which presents the Greeting as a GreetingOverview
            output: GreetingOverviewDto::class,
            normalizationContext: ['groups' => ['Advanced']],
        ),
        new Post(),
    ]
)]
#[ORM\Entity]
class Greeting
{
    /**
     * The entity ID
     */
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    #[Serializer\Groups([
        'Simple',
        'Advanced',
    ])]
    private ?int $id = null;

    /**
     * A nice person
     */
    #[ORM\Column]
    #[Assert\NotBlank]
    #[Serializer\Groups([
        'Simple',
        'Advanced',
    ])]
    public string $name = '';

    public function getId(): ?int
    {
        return $this->id;
    }
}
