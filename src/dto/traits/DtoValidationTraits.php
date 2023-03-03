<?php

namespace Padosoft\LaravelDressCodeApi\dto\traits;

use Illuminate\Support\Facades\Validator;

trait DtoValidationTraits
{
    public function validate(): bool
    {
        $validator = Validator::make($this->toArray(), $this->validationRoles(), $this->validationMessages(), $this->validationAttributes());
        if ($validator->fails()) {
            //restituisce un eccezione con la lista degli errori
            throw new \Exception($validator->errors()->first());
        }
        return true;
    }
}