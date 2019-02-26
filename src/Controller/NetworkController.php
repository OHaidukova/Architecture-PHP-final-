<?php

declare(strict_types = 1);

namespace Controller;

use Framework\Render;
use Service\SocialNetwork\VKAdapter;
use Symfony\Component\HttpFoundation\Response;
use VK\Client\VKApiClient;

class NetworkController
{
    use Render;

    /**
     * Главная страница
     *
     * @return Response
     */
    public function indexAction(): Response
    {

        $vk = new VKAdapter(new VKApiClient());
        $response = $vk->getUsers();

        return $this->render('network/testVK.html.php', ['response' => $response[1]]);
    }


}