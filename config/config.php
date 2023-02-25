<?php


use Bramatom\SellingPartnerAmazon\AmazonMarketplaceId;
use Carbon\Carbon;

return [
    'marketplace_id' => env('AMSP_MARKETPLACE_ID', AmazonMarketplaceId::EUROPE_ITALY),
    'access_key' => env('AMSP_ACCESS_KEY',null),
    'secret_key' => env('AMSP_SECRET_KEY',null),
    'seller_id' => env('AMSP_SELLER_ID',null),
];
