<?php

namespace Padosoft\LaravelDressCodeApi;

use Padosoft\DressCodeApi\DressCodeClient as DressCodeClientApi;

class DressCodeClient
{
use DressCodeKeyTrait;
    public function uploadProducts(string $products)
    {
        $username = config('dresscode-api-settings.username');
        $password = config('dresscode-api-settings.password');
        $hub_key = config('dresscode-api-settings.hub_key');
        $subscription_key = config('dresscode-api-settings.subscription_key');
        $this->initKey($username, $password, $hub_key, $subscription_key);
        $response = DressCodeClientApi::create($this->dressCodeKey)->postUpload($this->dressCodeKey->hub_key, $products);
        return $response;
    }

}