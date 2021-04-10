<?php


namespace Domain\Application\ToggleLightRange;


use Domain\Entity\CoordinatePair;
use Domain\Entity\LightGrid;
use Ramsey\Uuid\UuidInterface;

class ToggleLightRangeRequest
{
    private UuidInterface $lightGridId;
    private CoordinatePair $lightRange;

    /**
     * ToggleLightRangeRequest constructor.
     * @param UuidInterface $lightGridId
     * @param CoordinatePair $lightRange
     */
    public function __construct(UuidInterface $lightGridId, CoordinatePair $lightRange)
    {
        $this->lightGridId = $lightGridId;
        $this->lightRange = $lightRange;
    }


    public function getLightRange(): CoordinatePair
    {
        return $this->lightRange;
    }

    public function getLightGridId(): UuidInterface
    {
        return $this->lightGridId;
    }
}