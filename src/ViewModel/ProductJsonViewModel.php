<?php

namespace Padosoft\LaravelDressCodeApi\ViewModel;

use Exception;
use Illuminate\View\Factory;
use Padosoft\LaravelDressCodeApi\dto\SendProductCompleteDto;

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
    public function render(array $data, string $type): string
    {
        try {
            switch ($type){
                case 'products':
                    return $this->view->make('dresscode-api-settings::productJson', ['data' => $data])->render();
                case 'prices':
                    return $this->view->make('dresscode-api-settings::productPricesJson', ['data' => $data])->render();
                case 'sizes':
                    return $this->view->make('dresscode-api-settings::productSizesJson', ['data' => $data])->render();
                case 'languages':
            }
            return $this->view->make('dresscode-api-settings::productJson', ['data' => $data])->render();
        } catch (\Throwable $e) {
            throw new Exception($e->getMessage());
        }
    }

}