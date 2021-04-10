<?php


namespace Domain\Test\Stub;


use Domain\Application\GetLightGrid\GetLightGridPresenterInterface;
use Domain\Application\GetLightGrid\GetLightGridResponse;
use Domain\Entity\LightGrid;

class GetLightGridPresenter implements GetLightGridPresenterInterface
{
    private LightGrid $lightGrid;

    function present(GetLightGridResponse $response)
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