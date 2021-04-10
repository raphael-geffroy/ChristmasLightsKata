<?php


namespace Domain\Entity;


class CoordinatePair
{
    private Coordinate $min;
    private Coordinate $max;

    public function __construct(Coordinate $min, Coordinate $max)
    {
        $this->min = $min;
        $this->max = $max;
    }

    public function getMinX()
    {
        return $this->min->getX();
    }
    public function getMinY()
    {
        return $this->min->getY();
    }
    public function getMaxX()
    {
        return $this->max->getX();
    }
    public function getMaxY()
    {
        return $this->max->getY();
    }
}