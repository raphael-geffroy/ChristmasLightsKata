<?php


namespace UserInterface\Presenter;


use Domain\Application\GetLightGrid\GetLightGridPresenterInterface;
use Domain\Application\GetLightGrid\GetLightGridResponse;
use UserInterface\ViewModel\GetLightGridViewModel;

class GetLightGridPresenter implements GetLightGridPresenterInterface
{

    function present(GetLightGridResponse $response)
    {
        $viewModel = new GetLightGridViewModel($response->getLightGrid());
        ob_start();
        include __DIR__.'/../Templates/LightGridTemplate.php';
        echo(ob_get_clean());
    }
}