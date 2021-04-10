<?php


namespace Domain\Port;


use Domain\Entity\LightGrid;
use Ramsey\Uuid\UuidInterface;

interface LightGridProvider
{
    function save(LightGrid $lightGrid);
    function findById(UuidInterface $id): ?LightGrid;
}