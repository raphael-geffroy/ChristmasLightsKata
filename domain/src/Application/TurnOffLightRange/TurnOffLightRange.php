<?php


namespace Domain\Application\TurnOffLightRange;


use Domain\Port\LightGridProvider;

class TurnOffLightRange
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
        TurnOffLightRangeRequest $request
    ){
        $lightGrid = $this->lightGridProvider->findById($request->getLightGridId());
        $lightGrid->turnOffRange($request->getLightRange());
        $this->lightGridProvider->save($lightGrid);
    }
}