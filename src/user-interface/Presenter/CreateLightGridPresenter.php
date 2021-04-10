<?php
namespace UserInterface\Presenter;

use Domain\Application\CreateLightGrid\CreateLightGridPresenterInterface;
use Domain\Application\CreateLightGrid\CreateLightGridResponse;

class CreateLightGridPresenter implements CreateLightGridPresenterInterface
{
    function present(CreateLightGridResponse $response)
    {
        echo("{$response->getLightGrid()->getId()}\r\n");
    }
}