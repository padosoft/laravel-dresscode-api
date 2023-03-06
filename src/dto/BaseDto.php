<?php

namespace Padosoft\LaravelDressCodeApi\dto;

use Padosoft\LaravelDressCodeApi\dto\traits\DtoValidationTraits;
use Padosoft\LaravelDressCodeApi\interfaces\DtoValidationInterface;

class BaseDto implements DtoValidationInterface
{
    use DtoValidationTraits;

    /**
     * @throws \Exception
     */
    public function __construct()
    {
        $this->validate();
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        // TODO: Implement toArray() method.
    }

    /**
     * @return array
     */
    public function validationRoles(): array
    {
        // TODO: Implement validationRoles() method.
    }

    /**
     * @return array
     */
    public function validationMessages(): array
    {
        // TODO: Implement validationMessages() method.
    }

    /**
     * @return array
     */
    public function validationAttributes(): array
    {
        // TODO: Implement validationAttributes() method.
    }

    public static function getRightCol($model, $name, $syncName){
        if (isset($syncName[$name])) {
            $col = $syncName[$name];
            return $model->$col??null;
        }
        return $model->$name??null;
    }
}