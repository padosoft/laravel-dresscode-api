<?php

namespace Padosoft\LaravelDressCodeApi\Service;

use Exception;
use Padosoft\LaravelDressCodeApi\dto\SendProductPricesAndSizesDto;
use Padosoft\LaravelDressCodeApi\ViewModel\ProductJsonViewModel;

class RenderJsonProductService
{
    public ProductJsonViewModel $view;

    public function __construct(ProductJsonViewModel $view)
    {
        $this->view = $view;
    }

    /**
     * @throws Exception
     * return string
     *
     */
    public function execute(SendProductPricesAndSizesDto $product): string
    {
        try {
            return $this->view->render($product);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

}