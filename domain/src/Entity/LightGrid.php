<?php

namespace Domain\Entity;

use phpDocumentor\Reflection\Types\Array_;
use Ramsey\Uuid\Rfc4122\UuidV4;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class LightGrid
{
    /** @var Light[][] */
    private array $lights;
    private Coordinate $maxCoordinate;
    private UuidInterface $id;

    public function __construct(Coordinate $maxCoordinates)
    {
        $this->maxCoordinate = $maxCoordinates;
        $this->lights = array();
        $this->id = Uuid::uuid4();
        for ($x = 0; $x <= $maxCoordinates->getX(); $x++) {
            for ($y = 0; $y <= $maxCoordinates->getY(); $y++) {
                $this->lights[$x][$y] = new Light();
            }
        }
    }

    public function getId(): UuidInterface
    {
        return $this->id;
    }


    public function turnOnRange(CoordinatePair $lightRange)
    {
        for ($x = $lightRange->getMinX(); $x <= $lightRange->getMaxX(); $x++) {
            for ($y = $lightRange->getMinY(); $y <= $lightRange->getMaxY(); $y++) {
                $this->lights[$x][$y]->setIsOn(true);
            }
        }
    }

    public function getRange(CoordinatePair $lightRange): array
    {
        /** @var $lights Light[] */
        $lights = array();
        for ($x = $lightRange->getMinX(); $x <= $lightRange->getMaxX(); $x++) {
            for ($y = $lightRange->getMinY(); $y <= $lightRange->getMaxY(); $y++) {
                $lights[] = $this->lights[$x][$y];
            }
        }
        return $lights;
    }

    public function turnOffRange(CoordinatePair $lightRange)
    {
        for ($x = $lightRange->getMinX(); $x <= $lightRange->getMaxX(); $x++) {
            for ($y = $lightRange->getMinY(); $y <= $lightRange->getMaxY(); $y++) {
                $this->lights[$x][$y]->setIsOn(false);
            }
        }
    }

    public function toggleRange(CoordinatePair $lightRange)
    {
        for ($x = $lightRange->getMinX(); $x <= $lightRange->getMaxX(); $x++) {
            for ($y = $lightRange->getMinY(); $y <= $lightRange->getMaxY(); $y++) {
                $this->lights[$x][$y]->setIsOn(!$this->lights[$x][$y]->isOn());
            }
        }
    }

    public function getMaxCoordinate(): Coordinate
    {
        return $this->maxCoordinate;
    }

    /**
     * @return Light[][]
     */
    public function getLights(): array
    {
        return $this->lights;
    }



}