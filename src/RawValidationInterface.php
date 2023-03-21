<?php

namespace Padosoft\LaravelDressCodeApi;

use Illuminate\Database\Eloquent\Model;

interface RawValidationInterface
{

    public function getValidate(): array;
    public function getValidateMessage(): array;

    public function getDataFields(Model $model): array;

}
