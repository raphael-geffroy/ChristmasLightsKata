<?php


namespace Domain\Application\IncreaseBrightnessByOneLightRange;

use Domain\Port\LightGridProvider;

class IncreaseBrightnessByOneLightRange
{
    private LightGridProvider $lightGridProvider;

    /**
     * IncreaseBrightnessByTwoLightRange constructor.
     * @param LightGridProvider $lightGridProvider
     */
    public function __construct(LightGridProvider $lightGridProvider)
    {
        $this->lightGridProvider = $lightGridProvider;
    }

    public function execute(
        IncreaseBrightnessByOneLightRangeRequest $request
    ){
        $lightGrid = $this->lightGridProvider->findById($request->getLightGridId());
        $lightGrid->increaseBrightnessByOneRange($request->getLightRange());
        $this->lightGridProvider->save($lightGrid);
    }
}