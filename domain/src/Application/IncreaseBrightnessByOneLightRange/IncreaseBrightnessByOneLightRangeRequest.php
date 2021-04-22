<?php


namespace Domain\Application\IncreaseBrightnessByOneLightRange;


use Domain\Entity\LightGrid;
use Domain\Entity\CoordinatePair;
use Ramsey\Uuid\UuidInterface;

class IncreaseBrightnessByOneLightRangeRequest
{
    private UuidInterface $lightGridId;
    private CoordinatePair $lightRange;

    /**
     * IncreaseBrightnessByTwoLightRangeRequest constructor.
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