<?php

namespace Padosoft\LaravelDressCodeApi;

use Padosoft\DressCodeApi\DressCodeClient as DressCodeClientApi;

class DressCodeClient
{
use DressCodeKeyTrait;
    public function test(): string
    {

        return  'test';
    }

    public function uploadProducts(array $products): string
    {
        $username = config('dresscode-api-settings.username');
        $password = config('dresscode-api-settings.password');
        $hub_key = config('dresscode-api-settings.hub_key');
        $subscription_key = config('dresscode-api-settings.subscription_key');
        $this->initKey($username, $password, $hub_key, $subscription_key);
        $data = '[
  {
    "id": "Default-20240_ADOBE",
    "product": {
      "brandModelCode": "PERNI10",
      "brandColorCode": "06A2",
      "sku": "PERNI1006A2",
      "seasonId": "Primavera Estate 2021",
      "brandId": "GIA COUTURE",
      "colorId": "Nero",
      "genreId": "Donna",
      "typeId": "Abbigliamento",
      "categoryId": "Maglieria",
      "subcategoryId": "T-shirt",
      "sizeTypeId": "Abbigliamento donna",
      "collectionTypeId": "Main",
      "hasWashingtonFlag": false,
      "productPreSaleEnd": "2021-06-15T17:00:31.09",
      "productDeleted": "2021-06-17T17:00:31.09",
      "composition": [
        {
          "material": "CO",
          "percentage": 80
        },
        {
          "material": "WO",
          "percentage": 20
        }
      ],
      "weight": 2
    },
    "prices": [
      {
        "price": 200
      },
      {
        "priceListId": "RETAIL",
        "priceNoVat": 163.93,
        "priceWholesale": 83.30,
        "price": 200
      },
      {
        "priceListId": "INTRAMIRROR",
        "price": 200
      }
    ],
    "sizes": [
      {
        "sizeId": "S",
        "stocks": [
          {
            "stock": 0
          }
        ]
      },
      {
        "sizeId": "M",
        "gtin": "962489511981",
        "stocks": [
          {
            "stock": 2
          },
          {
            "storeId": "Magazzino 1",
            "stock": 1
          }
        ]
      },
      {
        "sizeId": "L",
        "stocks": [
          {
            "stock": 1
          }
        ],
        "prices": [
          {
            "priceNoVat": 163.93,
            "priceWholesale": 83.30,
            "price": 200
          }
        ]
      }
    ],
    "languages": [
      {
        "languageId": "it",
        "name": "Piumino raso",
        "description": "Piumino Herno in raso con zip e bottoni sui polsi.",
        "composition": "100% polyester\n",
        "madeIn": "Italy\n",
        "sizeAndFit": "fit true to size",
        "notes": "Tessuto: 100% polyester\nMade in: Italy\nSize&Fit: fit true to size",
        "customData": null
      },
      {
        "languageId": "en",
        "name": "Satin down jacket",
        "description": "Herno satin down jacket with a zip and buttons on cuffs.",
        "composition": "100% polyester\n",
        "madeIn": "Italy\n",
        "sizeAndFit": "True to size fit",
        "notes": "Material: 100% polyester\nMade in: Italy\nSize & Fit: True to size fit",
        "customData": null
      }
    ],
    "photos": [
      {
        "position": 1,
        "url": "https://example.com/ac8246bc-996d-4224-a764-e7a76cb88d6c.jpg"
      },
      {
        "position": 2,
        "url": "https://example.com/551a54e2-3e0c-45f7-99c2-996d61f88be3.jpg"
      },
      {
        "position": 3,
        "url": "https://example.com/f5db8cce-9579-44fe-9d6f-9b5de1804ab1.jpg"
      },
      {
        "position": 4,
        "url": "https://example.com/ca851455-182d-4dfc-b832-6d237406aed4.jpg"
      },
      {
        "position": 1,
        "tag": "MP",
        "url": "https://example.com/c0597ad5-dc7a-45a1-883f-436092562c8a.jpg"
      },
      {
        "position": 2,
        "tag": "MP",
        "url": "https://example.com/5ef77dfc-2dd9-4dcc-a04e-6979ca2d13de.jpg"
      },
      {
        "position": 3,
        "tag": "MP",
        "url": "https://example.com/d4fbf19d-f02b-4877-aee9-c1c0bfb6e0df.jpg"
      },
      {
        "position": 4,
        "tag": "MP",
        "url": "https://example.com/SS21---GIA COUTURE---PERNI1006A2_4_M1.JPG"
      },
      {
        "position": 5,
        "tag": "MP",
        "url": "https://example.com/SS21---GIA COUTURE---PERNI1006A2_5_M1.JPG"
      },
      {
        "position": 6,
        "tag": "MP",
        "url": "https://example.com/SS21---GIA COUTURE---PERNI1006A2_6_M1.JPG"
      },
      {
        "position": 7,
        "tag": "MP",
        "url": "https://example.com/SS21---GIA COUTURE---PERNI1006A2_7_M1.JPG"
      }
    ]
  }
]';

        $response = DressCodeClientApi::create($this->dressCodeKey)->postUpload('products', $data);

    }

}