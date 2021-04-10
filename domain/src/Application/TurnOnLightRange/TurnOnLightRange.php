<?php


namespace Domain\Application\TurnOnLightRange;

use Domain\Port\LightGridProvider;

class TurnOnLightRange
{
    private LightGridProvider $lightGridProvider;

    /**
     * ToggleLightRange constructor.
     * @param LightGridProvider $lightGridProvider
     */
    public function __construct(LightGridProvider $lightGridProvider)
    {
        $this->lightGridProvider = $lightGridProvider;
    }

    public function execute(
        TurnOnLightRangeRequest $request
    ){
        $lightGrid = $this->lightGridProvider->findById($request->getLightGridId());
        $lightGrid->turnOnRange($request->getLightRange());
        $this->lightGridProvider->save($lightGrid);
    }
}