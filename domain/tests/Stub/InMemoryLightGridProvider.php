<?php


namespace Domain\Test\Stub;


use Domain\Entity\LightGrid;
use Domain\Port\LightGridProvider;
use Ramsey\Uuid\UuidInterface;

class InMemoryLightGridProvider implements LightGridProvider
{
    /** @var LightGrid[]  */
    private array $lightGrids;
    /**
     * InMemoryLightGridProvider constructor.
     */
    public function __construct()
    {
        $this->lightGrids= array();
    }

    function save(LightGrid $lightGrid)
    {
        $this->lightGrids[$lightGrid->getId()->toString()] = $lightGrid;
    }

    function findById(UuidInterface $id): ?LightGrid
    {
        return $this->lightGrids[$id->toString()];
    }

    function findAll(): array
    {
        return $this->lightGrids;
    }
}