<?php


namespace Domain\Application\ToggleLightRange;


use Domain\Port\LightGridProvider;

class ToggleLightRange
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
        ToggleLightRangeRequest $request
    )
    {
        $lightGrid = $this->lightGridProvider->findById($request->getLightGridId());
        $lightGrid->toggleRange($request->getLightRange());
        $this->lightGridProvider->save($lightGrid);
    }
}