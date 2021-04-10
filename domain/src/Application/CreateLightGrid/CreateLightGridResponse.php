<?php


namespace Domain\Application\CreateLightGrid;


use Domain\Entity\LightGrid;

class CreateLightGridResponse
{
    private LightGrid $lightGrid;

    /**
     * CreateLightGridResponse constructor.
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