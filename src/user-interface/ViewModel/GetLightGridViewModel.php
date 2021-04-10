<?php


namespace UserInterface\ViewModel;


use Domain\Entity\LightGrid;

class GetLightGridViewModel
{
private LightGrid $lightGrid;

    /**
     * GetLightGridViewModel constructor.
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