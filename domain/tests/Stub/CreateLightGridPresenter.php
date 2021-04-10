<?php


namespace Domain\Test\Stub;


use Domain\Application\CreateLightGrid\CreateLightGridPresenterInterface;
use Domain\Application\CreateLightGrid\CreateLightGridResponse;
use Domain\Entity\LightGrid;

class CreateLightGridPresenter implements CreateLightGridPresenterInterface
{

    private LightGrid $lightGrid;

    function present(CreateLightGridResponse $response)
    {
        $this->lightGrid = $response->getLightGrid();
    }

    /**
     * @return LightGrid
     */
    public function getLightGrid(): LightGrid
    {
        return $this->lightGrid;
    }

}