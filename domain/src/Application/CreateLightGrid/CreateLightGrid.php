<?php


namespace Domain\Application\CreateLightGrid;


use Domain\Entity\Coordinate;
use Domain\Entity\LightGrid;
use Domain\Port\LightGridProvider;
use Domain\Test\Stub\InMemoryLightGridProvider;

class CreateLightGrid
{
    private LightGridProvider $lightGridProvider;

    /**
     * CreateLightGrid constructor.
     * @param LightGridProvider $lightGridProvider
     */
    public function __construct(LightGridProvider $lightGridProvider)
    {
        $this->lightGridProvider = $lightGridProvider;
    }


    public function execute(CreateLightGridRequest $request, CreateLightGridPresenterInterface $presenter){
        $lightGrid = new LightGrid($request->getMaxCoordinate());
        $this->lightGridProvider->save($lightGrid);
        $response = new CreateLightGridResponse($lightGrid);
        $presenter->present($response);
    }
}