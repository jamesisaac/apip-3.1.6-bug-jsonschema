<?php

namespace App\Dto;

use ApiPlatform\Action\NotFoundAction;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use App\Entity\Greeting;
use Symfony\Component\Serializer\Annotation as Serializer;

#[ApiResource(
    operations: [
        new Get(controller: NotFoundAction::class, read: false, status: 404),
    ],
)]
class GreetingOverviewDto
{
    public function __construct(
        #[Serializer\Groups([
            'GreetingOverview',
        ])]
        public Greeting $greeting,

        #[Serializer\Groups([
            'GreetingOverview',
        ])]
        public int $viewCount
    ) {
    }
}
