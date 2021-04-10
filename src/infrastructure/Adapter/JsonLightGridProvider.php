<?php

namespace Infrastructure\Adapter;

use Domain\Entity\LightGrid;
use Domain\Port\LightGridProvider;
use Ramsey\Uuid\UuidInterface;

class JsonLightGridProvider implements LightGridProvider
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
        file_put_contents("database/{$lightGrid->getId()}.json", serialize($lightGrid));
        //$this->lightGrids[$lightGrid->getId()->toString()] = $lightGrid;
    }

    function findById(UuidInterface $id): ?LightGrid
    {
        return unserialize(file_get_contents("database/{$id}.json"));
        //return $this->lightGrids[$id->toString()];
    }

}