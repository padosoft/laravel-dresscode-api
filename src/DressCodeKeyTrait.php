<?php

namespace Padosoft\LaravelDressCodeApi;

use Padosoft\DressCodeApi\DressCodeKey;

trait DressCodeKeyTrait
{
    public DressCodeKey $dressCodeKey;

    public function initKey(string $username, string $password, string $hub_key, string $subscription_key)
    {
        $this->dressCodeKey = DressCodeKey::create($username, $password, $hub_key, $subscription_key);
        return $this;
    }
}
