<?php


namespace Domain\Application\CreateLightGrid;


use Domain\Entity\Coordinate;

class CreateLightGridRequest
{
    private Coordinate $maxCoordinate;

    /**
     * CreateLightGridRequest constructor.
     * @param Coordinate $maxCoordinate
     */
    public function __construct(Coordinate $maxCoordinate)
    {
        $this->maxCoordinate = $maxCoordinate;
    }

    /**
     * @return Coordinate
     */
    public function getMaxCoordinate(): Coordinate
    {
        return $this->maxCoordinate;
    }


}