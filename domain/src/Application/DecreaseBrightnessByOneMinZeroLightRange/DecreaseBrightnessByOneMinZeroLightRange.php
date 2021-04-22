<?php


namespace Domain\Application\DecreaseBrightnessByOneMinZeroLightRange;


use Domain\Port\LightGridProvider;

class DecreaseBrightnessByOneMinZeroLightRange
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
        DecreaseBrightnessByOneMinZeroLightRangeRequest $request
    ){
        $lightGrid = $this->lightGridProvider->findById($request->getLightGridId());
        $lightGrid->decreaseBrightnessByOneMinZeroRange($request->getLightRange());
        $this->lightGridProvider->save($lightGrid);
    }
}