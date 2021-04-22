<?php


namespace Domain\Application\IncreaseBrightnessByTwoLightRange;


use Domain\Port\LightGridProvider;

class IncreaseBrightnessByTwoLightRange
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
        IncreaseBrightnessByTwoLightRangeRequest $request
    )
    {
        $lightGrid = $this->lightGridProvider->findById($request->getLightGridId());
        $lightGrid->increaseBrightnessByTwoRange($request->getLightRange());
        $this->lightGridProvider->save($lightGrid);
    }
}