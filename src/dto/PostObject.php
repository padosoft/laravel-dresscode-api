<?php

namespace Padosoft\Laravel\DressCodeApi\dto;

use Padosoft\LaravelAmazonSellingPartnerApi\dto\AutoDtoBase;

class PostObject extends AutoDtoBase
{
    public PostObjectData $data;
    public PostObjectOption $options;

    public static function create(array $data): PostObject
    {
        return new self($data);
    }

    public function getStructureRules(): array
    {
        return [
            "data" => $this->isObj(PostObjectData::class),
            "options" => $this->isObj(PostObjectOption::class),
        ];
    }
}