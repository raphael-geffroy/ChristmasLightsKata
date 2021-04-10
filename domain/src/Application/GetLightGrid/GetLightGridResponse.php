<?php


namespace Domain\Application\GetLightGrid;


use Domain\Entity\LightGrid;

class GetLightGridResponse
{
    private LightGrid $lightGrid;

    /**
     * GetLightGridResponse constructor.
     * @param LightGrid $lightGrid
     */
    public function __construct(LightGrid $lightGrid)
    {
        $this->lightGrid = $lightGrid;
    }

    /**
     * @return LightGrid
     */
    public function getLightGrid(): LightGrid
    {
        return $this->lightGrid;
    }


}