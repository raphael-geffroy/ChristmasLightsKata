<?php


namespace Domain\Application\GetLightGrid;


use Domain\Port\LightGridProvider;

class GetLightGrid
{
private LightGridProvider $lightGridProvider;

    /**
     * GetLightGrid constructor.
     * @param LightGridProvider $lightGridProvider
     */
    public function __construct(LightGridProvider $lightGridProvider)
    {
        $this->lightGridProvider = $lightGridProvider;
    }

    public function execute(GetLightGridRequest $request, GetLightGridPresenterInterface $presenter)
    {
        $lightGrid = $this->lightGridProvider->findById($request->getId());
        $response = new GetLightGridResponse($lightGrid);
        $presenter->present($response);
    }


}