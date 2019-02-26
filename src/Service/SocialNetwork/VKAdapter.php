<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 13/02/2019
 * Time: 23:00
 */

namespace Service\SocialNetwork;


use VK\Client\VKApiClient;

class VKAdapter implements INetworks
{
    private $vk;

    public function __construct(VKApiClient $vk)
    {
        $this->vk = $vk;
    }


    public function getUsers()
    {
        $id = 531347989;
        $accessToken = "4ea86eb97339e218d852ff4a89b883c9977c3651b43f5b880e02cfccce06ae1a33e1001bc3f1ebd52a54a";

        $response = $this->vk->users()->get($accessToken, array(
            'user_ids' => array(1, $id),
            'fields' => array('first_name', 'last_name'),
        ));

        return $response;
    }
}