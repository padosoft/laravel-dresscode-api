<?php

namespace Padosoft\LaravelDressCodeApi\ViewModel;

use Exception;
use Illuminate\View\Factory;
use Padosoft\LaravelDressCodeApi\dto\ProductContainerDataDto;

class ProductJsonViewModel
{
    protected $view;

    public function __construct(Factory $view)
    {
        $this->view = $view;
    }

    /**
     * @throws Exception
     *                   return string
     */
    public function render(ProductContainerDataDto $data): string
    {
        try {
            return $this->view->make('dresscode-api-settings::productJson', ['data' => $data])->render();
        } catch (\Throwable $e) {
            throw new Exception($e->getMessage());
        }
    }

}